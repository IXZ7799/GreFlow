<?php
    try {
        include '../includes/DatabaseConnection.php';
        include '../includes/DatabaseFunctions.php';

        deleteAuthor($pdo, $_POST['authorid']);
        header('location: authors.php'); 
    
    } catch (PDOException $e) {
        $title = 'An error has occured';
        $output = 'Database error: ' . $e->getMessage() . ' in '
        . $e->getFile() . ':' . $e->getLine();
    }
include '../templates/layout.html.php'
?>