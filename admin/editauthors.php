<?php 
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';
    try {
        if (isset($_POST['authorname'])) {
            updateAuthor($pdo, $_POST['id'], $_POST['authorname'], $_POST['authoremail']);
            header('location: authors.php'); 
        }    else {
            $author = getAuthor($pdo, $_GET['id']);
            $title = 'Edit author';
            ob_start();
            include '../templates/admin_editauthor.html.php';
            $output = ob_get_clean();
}
    } catch (PDOException $e) {
        $title = 'An error has occured';
        $output = 'Database error: ' . $e->getMessage() . ' in '
        . $e->getFile() . ':' . $e->getLine();
        }
    
include '../templates/admin_layout.html.php'
?>