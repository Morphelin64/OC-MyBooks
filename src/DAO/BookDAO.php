<?php

namespace Mybooks\DAO;

use Doctrine\DBAL\Connection;
use Mybooks\Domain\Book;

class BookDAO
{
    /**
     * Database connection
     *
     * @var \Doctrine\DBAL\Connection
     */
    private $db;

    /**
     * Constructor
     *
     * @param \Doctrine\DBAL\Connection The database connection object
     */
    public function __construct(Connection $db) {
        $this->db = $db;
    }

    /**
     * Return a list of all books, sorted by date (most recent first).
     *
     * @return array A list of all books.
     */
    public function findAll() {
        $sql = "select * from book order by book_id desc";
        $result = $this->db->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $books = array();
        foreach ($result as $row) {
            $bookId = $row['book_id'];
            $books[$bookId] = $this->buildBook($row);
        }
        return $books;
    }

    /**
     * Creates an Article object based on a DB row.
     *
     * @param array $row The DB row containing Book data.
     * @return \MYBOOKS\Domain\book
     */
    private function buildBook(array $row) {
        $book = new Book();
        $book->setId($row['book_id']);
        $book->setTitle($row['book_title']);
        $book->setSummary($row['book_summary']);
        return $book;
    }
}