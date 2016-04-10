<?php

use yii\db\Schema;
use yii\db\Migration;

class m160410_174614_populate_authors_and_books_with_test_data extends Migration
{
    public function safeUp()
    {
        $this->batchInsert('authors', ['firstname', 'lastname'], [
            ['Marlene', 'Malin'],
            ['Alfredo', 'Olander'],
            ['Gwen', 'Henze'],
            ['Evelina','Darby'],
            ['Vern','Brodbeck'],
            ['Deloise','Kimberling'],
            ['Isaura','Applewhite'],
            ['Shauna','Auer'],
            ['Hubert','Ickes'],
            ['Dolly', 'Tingley'],
            ['Sherryl', 'Littrell'],
            ['Troy', 'Niemeyer'],
            ['Mara', 'Aliff'],
            ['Otis', 'Carns'],
            ['Odell','Walquist'],
            ['Cliff','Lennox'],
            ['Nery', 'Ohlinger'],
            ['Margert','Hankins'],
            ['Tamatha','Edmonson'],
            ['Tonia', 'Gustin'],
        ]);
        $this->batchInsert('books', ['name', 'preview', 'date', 'author_id'], [
            ['Rebels And Blacksmiths', '/assets/books_preview/1.jpg', '1584-05-16', 1],
            ['Humans And Spies', '/assets/books_preview/2.jpg', '1606-11-21', 2],
            ['Fortune Of Next Year', '/assets/books_preview/3.jpg', '1641-02-05', 3],
            ['Bow Without Sin', '/assets/books_preview/4.jpg', '1727-05-02', 4],
            ['Awakening The Sea', '/assets/books_preview/5.jpg', '1753-09-21', 5],
            ['Breaking The World', '/assets/books_preview/6.jpg', '1754-09-09', 6],
            ['Fish And Bandits', '/assets/books_preview/7.jpg', '1791-03-08', 7],
            ['Intention Of Perfection', '/assets/books_preview/8.jpg', '1810-03-20', 8],
            ['Sword Of Darkness', '/assets/books_preview/9.jpg', '1822-08-06', 9],
            ['Hunting The Graveyard', '/assets/books_preview/10.jpg', '1824-02-14', 10],
            ['Songs Of Time', '/assets/books_preview/11.jpg', '1839-11-20', 11],
            ['Criminal Of Earth', '/assets/books_preview/12.jpg', '1849-12-14', 12],
            ['Opponent Of The South', '/assets/books_preview/13.jpg', '1856-08-25', 13],
            ['Companions Of The Sea', '/assets/books_preview/14.jpg', '1860-09-26', 14],
            ['Wives Of The Lost Ones', '/assets/books_preview/15.jpg', '1904-09-26', 15],
            ['Aliens And Giants', '/assets/books_preview/16.jpg', '1933-04-19', 16],
            ['Turtles And Guardians', '/assets/books_preview/17.jpg', '1947-04-21', 17],
            ['Birth Of The Mountain', '/assets/books_preview/18.jpg', '1956-07-28', 18],
            ['Certainty Of Dusk', '/assets/books_preview/19.jpg', '1991-07-31', 19],
            ['Escaping The Champions', '/assets/books_preview/20.jpg', '2010-04-08', 20],
        ]);
    }

    public function down()
    {
        echo "m160410_174614_populate_authors_and_books_with_test_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
