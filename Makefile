GETUID=id | sed -r 's/uid=([0-9]+).*/\1/'
GETGID=id | sed -r 's/.*gid=([0-9]+).*/\1/'
UID=$(shell $(GETUID))
GID=$(shell $(GETGID))
NAME=yii2-testcase
DBNAME=yii2testcase
DBPASS=iuvFXg2P

all: run
build:
	#install vendor components
	docker run --name="$(NAME)-mysql" -d -e MYSQL_ROOT_PASSWORD=$(DBPASS) mysql:5.7
	until ( \
		echo "create database if not exists $(DBNAME);" \
		| docker exec -i $(NAME)-mysql mysql --password=$(DBPASS) \
	); \
	do sleep 6; \
	done;
	#install dependencies and run container
	docker run --rm -v $(CURDIR)/app:/app --entrypoint=/bin/bash vasiakorobkin/dev-yii2:latest -c "composer self-update && composer clear-cache && composer install"
	docker run --name="$(NAME)-php" --rm -v $(CURDIR)/app:/app --link $(NAME)-mysql:dbhost --entrypoint=/usr/local/bin/php vasiakorobkin/dev-yii2:latest yii migrate/up --interactive=0
	docker run --name="$(NAME)-php" -d -v $(CURDIR)/app:/app --link $(NAME)-mysql:dbhost -p 80:80 --entrypoint=/usr/local/bin/php vasiakorobkin/dev-yii2:latest yii serve
run:
	docker start $(NAME)-mysql
	docker start $(NAME)-php
term:
	docker exec --user=$(UID):$(GID) -it $(NAME)-php /bin/bash
mysql:
	docker exec -it $(NAME)-mysql mysql --password=$(DBPASS) --database=$(DBNAME)
chown:
	-docker run --rm -v $(CURDIR)/app:/app --entrypoint=/bin/bash vasiakorobkin/dev-yii2:latest -c "chown -R $(UID):$(GID) /app"
stop: chown
	-docker stop $(NAME)-mysql
	-docker stop $(NAME)-php
clean: stop
	-docker rm $(NAME)-mysql
	-docker rm $(NAME)-php
