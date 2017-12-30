<?php

namespace Mybooks\DAO;

use Mybooks\Domain\Book;

class DetailsDAO extends DAO 
{   
    /** 
     * Return details for a book.
     */
    public function findBookDetails($bookId) {      
        $sql = "select auth_first_name, auth_last_name, 
                    book_title, book_isbn, book_summary
                from book, author
                where book.auth_id = author.auth_id 
                and book_id = ? ";

        $result = $this->getDb()->fetchAssoc($sql, array($bookId));

        /** 
         * Convert query result to an array of book details
         */
        $bookDetails = array();
        $bookDetails['bookTitle'] = $result["book_title"];
        $bookDetails['bookIsbn'] = $result['book_isbn'];
        $bookDetails['bookSummary'] = $result['book_summary'];
        $bookDetails['bookAuthFirstName'] = $result['auth_first_name'];
        $bookDetails['bookAuthLastName'] = $result['auth_last_name'];

        $details = new Book();      
        $details->setId($bookId);
        $details->setTitle($bookDetails['bookTitle']);
        $details->setIsbn($bookDetails['bookIsbn']);
        $details->setSummary($bookDetails['bookSummary']);    
        $details->setFirstName($bookDetails['bookAuthFirstName']);
        $details->setLastName($bookDetails['bookAuthLastName']);

        return $details;
    }
   
    function buildDomainObject($row){
        
    }

}   