<?php

namespace Mybooks\Domain;

class Author
{
    /**
     * author first name.
     *
     * @var string
     */
    public $auth_first_name;

    /**
     * author last name.
     *
     * @var string
     */
    public $auth_last_name;

    /**
     * Associated book.
     *
     * @var \MicroCMS\Domain\Book
     */
    private $book;

    public function getFirstName() {
        return $this->auth_first_name;
    }

    public function setFirstName($auth_first_name) {
        $this->auth_first_name = $auth_first_name;
        return $this;
    }

    public function getLastName() {
        return $this->auth_last_name;
    }

    public function setLastName($auth_last_name) {
        $this->auth_last_name = $auth_last_name;
        return $this;
    }
    
    public function setBook(Book $book) {
        $this->book = $book;
        return $this;
    }
}