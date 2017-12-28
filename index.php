<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <link href="mybooks.css" rel="stylesheet" />
    <title>MyBooks - Home</title>
</head>
<body>
    <header>
        <h1>MyBooks</h1>
    </header>
    <?php
    $bdd = new PDO('mysql:host=localhost;dbname=mybooks;charset=utf8', 'mybooks_user', 'secret');
    $books = $bdd->query('select * from book order by book_id desc');
    foreach ($books as $book): ?>
    <article>
        <h2><?php echo $book['book_title'] ?></h2>
        <p><?php echo $book['book_summary'] ?></p>
    </article>
    <?php endforeach ?>
    <footer class="footer">
        <a href="#" >MyBooks</a> is a minimalistic CMS built as a showcase for modern PHP development.
    </footer>
</body>
</html>