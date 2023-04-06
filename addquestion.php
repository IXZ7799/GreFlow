<?php
if (isset($_POST['question'])) {
    try {
        include 'includes/DatabaseConnection.php';
        include 'includes/DatabaseFunctions.php';
        insertquestion($pdo, $_POST['question'], $_POST['authors'], $_POST['categories']);
        header('location: questions.php'); 
    
    } catch (PDOException $e) {
        $title = 'An error has occured';
        $output = 'Database error: ' . $e->getMessage() . ' in '
        . $e->getFile() . ':' . $e->getLine();
        }
} else {
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunctions.php';
    $title = 'Ask a question';
    $authors = allAuthors($pdo);
    $categories = allCategories($pdo);

    ob_start();
    include 'templates/addquestion.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';
?>

