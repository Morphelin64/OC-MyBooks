<?php

// Home page
$app->get('/', function () use ($app) {
    $books = $app['dao.book']->findAll();
    return $app['twig']->render('index.html.twig', 
                                array('books' => $books));
})->bind('home');

// book details with author
$app->get('/book/{id}', function ($id) use ($app) {
    $book = $app['dao.book']->find($id);
    $details = $app['dao.details']->findBookDetails($id);
    return $app['twig']->render('details.html.twig', array('details' => $details));
})->bind('book');