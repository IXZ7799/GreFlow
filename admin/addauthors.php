<?php
if (isset($_POST['authorname'], $_POST['authoremail'])) {
    try {
        include '../includes/DatabaseConnection.php';
        include '../includes/DatabaseFunctions.php';
        insertAuthor($pdo, $_POST['id'], $_POST['authorname'], $_POST['authoremail']);
        header('location: authors.php'); 
    
    } catch (PDOException $e) {
        $title = 'An error has occured';
        $output = 'Database error: ' . $e->getMessage() . ' in '
        . $e->getFile() . ':' . $e->getLine();
        }
} else {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';
    $title = 'Add an author';


    ob_start();
    include '../templates/admin_addauthors.html.php';
    $output = ob_get_clean();
}
include '../templates/admin_layout.html.php'
?>