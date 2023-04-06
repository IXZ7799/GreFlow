<?php 
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';
    try {
        if (isset($_POST['categoryname'])) {
            updateCategory($pdo, $_POST['categoryid'], $_POST['categoryname']);
            header('location: categories.php'); 
        }    else {
            $category = getCategory($pdo, $_GET['id']);
            $title = 'Edit category';
            ob_start();
            include '../templates/admin_editcategory.html.php';
            $output = ob_get_clean();
}
    } catch (PDOException $e) {
        $title = 'An error has occured';
        $output = 'Database error: ' . $e->getMessage() . ' in '
        . $e->getFile() . ':' . $e->getLine();
        }
    
include '../templates/admin_layout.html.php'
?>