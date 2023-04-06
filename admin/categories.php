<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    $categories = allCategories($pdo);
    $title = 'Category List';
    $totalCategories = totalCategories($pdo);
    
    ob_start();

    include '../templates/admin_categories.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = 'An error has occured';
    $output = 'Database error: ' . $e->getMessage() . '
    in ' . $e->getFile() . ':' . $e->getLine();
}
include '../templates/admin_layout.html.php';
?>