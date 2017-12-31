<?php

namespace Mybooks\DAO;

use Doctrine\DBAL\Connection;
use Mybooks\Domain\Book;

abstract class DAO 
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
     * Grants access to the database connection object
     *
     * @return \Doctrine\DBAL\Connection The database connection object
     */
    protected function getDb() {
        return $this->db;
    }

    /**
     * Builds a domain object from a DB row.
     */
    protected function buildDomainObject(array $row){
        $book = new Book();      
        $book->setId($row['book_id']);
        $book->setTitle($row['book_title']);
        $book->setIsbn($row['book_isbn']);
        $book->setSummary($row['book_summary']);

        if (!(empty($row['auth_first_name']))) {   
            $book->setFirstName($row['auth_first_name']);
            $book->setLastName($row['auth_last_name']);
        }
        
        return $book;
    }
}