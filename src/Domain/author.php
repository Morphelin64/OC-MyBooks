<?php

namespace Mybooks\Domain;

class Author
{
    /**
     * author id.
     *
     * @var integer
     */
    private $auth_id;

    /**
     * author first name.
     *
     * @var string
     */
    private $auth_First_name;

    /**
     * author last name.
     *
     * @var string
     */
    private $auth_Last_name;

    /**
     * Associated book.
     *
     * @var \Mybooks\Domain\Book
     */
    private $book;

    public function getId() {
        return $this->auth_id;
    }

    public function setId($auth_id) {
        $this->auth_id = $auth_id;
        return $this;
    }

    public function getFirstName() {
        return $this->auth_First_name;
    }

    public function setFirstName($auth_First_name) {
        $this->auth_First_name = $auth_First_name;
        return $this;
    }

    public function getLastName() {
        return $this->auth_Last_name;
    }

    public function setLastName($auth_Last_name) {
        $this->auth_Last_name = $auth_Last_name;
        return $this;
    }

    public function getBook() {
        return $this->book;
    }

    public function setBook(Book $book) {
        $this->book = $book;
        return $this;
    }
}