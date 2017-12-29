<?php

namespace Mybooks\DAO;

use Mybooks\Domain\Book;

class BookDAO extends DAO
{
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
            $books[$bookId] = $this->buildDomainObject($row);
        }
        return $books;
    }

    /**
     * Creates a book object based on a DB row.
     *
     * @param array $row The DB row containing Book data.
     * @return \MYBOOKS\Domain\book
     */
    private function buildDomainObject(array $row) {
        $book = new Book();
        $book->setId($row['book_id']);
        $book->setTitle($row['book_title']);
        $book->setSummary($row['book_summary']);
        return $book;
    }
}