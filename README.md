Yii 2 Testcase
==============

`make build` will use docker to:
-  create db container and app database in it
-  install vendor dependencies using composer
-  create and configure app container, apply yii2 migrations and launch yii2 server at the port :80 of docker host

you could also:
-  `make term` to get bash prompt at app container
-  `make mysql` to get mysql prompt at db container
-  `make chown` to change ./app folders owner uid and gid to the ones of user executing command (because docker run under root file created by it belongs to root uid and gid)
-  `make stop` to **stop** db and app containers (also trigges `make chown`)
-  `make` or `make run` to **start** db and app containers
-  `make clean` to **remove** db and app containers
