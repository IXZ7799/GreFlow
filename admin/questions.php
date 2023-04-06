<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    $questions = allquestions($pdo);
    $title = 'Questions';
    $totalquestions = totalquestions($pdo);
    
    ob_start();

    include '../templates/admin_questions.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = 'An error has occured';
    $output = 'Database error: ' . $e->getMessage() . '
    in ' . $e->getFile() . ':' . $e->getLine();
}
include '../templates/admin_layout.html.php';
?>