<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    $authors = allAuthors($pdo);
    $title = 'Author List';
    $totalAuthors = totalAuthors($pdo);
    
    ob_start();

    include '../templates/admin_authors.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = 'An error has occured';
    $output = 'Database error: ' . $e->getMessage() . '
    in ' . $e->getFile() . ':' . $e->getLine();
}
include '../templates/admin_layout.html.php';
?>