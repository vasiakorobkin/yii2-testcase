create table books (
    id int unsigned auto_increment primary key,
    name varchar(50) not null,
    date_create timestamp default CURRENT_TIMESTAMP,
    date_update timestamp on update CURRENT_TIMESTAMP,
    preview varchar(50) not null,
    `date` date,
    author_id int unsigned,
    foreign key (author_id)
        references authors(id)
        on delete cascade
) engine=InnoDB default charset=utf8;

insert into books (name, preview, date, author_id) values ('Rebels And Blacksmiths', '/assets/books_preview/1.jpg', '1584-05-16', 1);
insert into books (name, preview, date, author_id) values ('Humans And Spies', '/assets/books_preview/2.jpg', '1606-11-21', 2);
insert into books (name, preview, date, author_id) values ('Fortune Of Next Year', '/assets/books_preview/3.jpg', '1641-02-05', 3);
insert into books (name, preview, date, author_id) values ('Bow Without Sin', '/assets/books_preview/4.jpg', '1727-05-02', 4);
insert into books (name, preview, date, author_id) values ('Awakening The Sea', '/assets/books_preview/5.jpg', '1753-09-21', 5);
insert into books (name, preview, date, author_id) values ('Breaking The World', '/assets/books_preview/6.jpg', '1754-09-09', 6);
insert into books (name, preview, date, author_id) values ('Fish And Bandits', '/assets/books_preview/7.jpg', '1791-03-08', 7);
insert into books (name, preview, date, author_id) values ('Intention Of Perfection', '/assets/books_preview/8.jpg', '1810-03-20', 8);
insert into books (name, preview, date, author_id) values ('Sword Of Darkness', '/assets/books_preview/9.jpg', '1822-08-06', 9);
insert into books (name, preview, date, author_id) values ('Hunting The Graveyard', '/assets/books_preview/10.jpg', '1824-02-14', 10);
insert into books (name, preview, date, author_id) values ('Songs Of Time', '/assets/books_preview/11.jpg', '1839-11-20', 11);
insert into books (name, preview, date, author_id) values ('Criminal Of Earth', '/assets/books_preview/12.jpg', '1849-12-14', 12);
insert into books (name, preview, date, author_id) values ('Opponent Of The South', '/assets/books_preview/13.jpg', '1856-08-25', 13);
insert into books (name, preview, date, author_id) values ('Companions Of The Sea', '/assets/books_preview/14.jpg', '1860-09-26', 14);
insert into books (name, preview, date, author_id) values ('Wives Of The Lost Ones', '/assets/books_preview/15.jpg', '1904-09-26', 15);
insert into books (name, preview, date, author_id) values ('Aliens And Giants', '/assets/books_preview/16.jpg', '1933-04-19', 16);
insert into books (name, preview, date, author_id) values ('Turtles And Guardians', '/assets/books_preview/17.jpg', '1947-04-21', 17);
insert into books (name, preview, date, author_id) values ('Birth Of The Mountain', '/assets/books_preview/18.jpg', '1956-07-28', 18);
insert into books (name, preview, date, author_id) values ('Certainty Of Dusk', '/assets/books_preview/19.jpg', '1991-07-31', 19);
insert into books (name, preview, date, author_id) values ('Escaping The Champions', '/assets/books_preview/20.jpg', '2010-04-08', 20);
