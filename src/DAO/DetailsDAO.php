<?php

namespace Mybooks\DAO;

use Mybooks\Domain\Book;

class DetailsDAO extends DAO 
{ 
    
    
    /** 
     * Return book details 
     */
    public function findBookDetails($bookId) {      
        $sql = "select auth_first_name, auth_last_name, 
                    book_title, book_isbn, book_summary, book_id   
                from book, author
                where book.auth_id = author.auth_id 
                and book_id = ? ";

        $row = $this->getDb()->fetchAssoc($sql, array($bookId));
        
        $bookDetails = new book();
        $bookDetails = $this->buildDomainObject($row);

        return $bookDetails;
        
    }

}   