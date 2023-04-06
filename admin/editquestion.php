<?php 
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';
    try {
        if (isset($_POST['question'])) {
            updatequestion($pdo, $_POST['questionid'], $_POST['question']);
            header('location: questions.php'); 
        }    else {
            $question = getquestion($pdo, $_GET['id']);
            $title = 'Edit question';
            ob_start();
            include '../templates/admin_editquestion.html.php';
            $output = ob_get_clean();
}
    } catch (PDOException $e) {
        $title = 'An error has occured';
        $output = 'Database error: ' . $e->getMessage() . ' in '
        . $e->getFile() . ':' . $e->getLine();
        }
    
include '../templates/admin_layout.html.php'
?>