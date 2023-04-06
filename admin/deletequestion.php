<?php
    try {
        include '../includes/DatabaseConnection.php';
        include '../includes/DatabaseFunctions.php';

        deletequestion($pdo, $_POST['id']);
        header('location: questions.php'); 
    
    } catch (PDOException $e) {
        $title = 'An error has occured';
        $output = 'Database error: ' . $e->getMessage() . ' in '
        . $e->getFile() . ':' . $e->getLine();
    }
include '../templates/layout.html.php'
?>