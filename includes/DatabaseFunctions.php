<?php

function query($pdo, $sql, $parameters = []) {
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function totalquestions($pdo) {
    $query = query($pdo, 'SELECT COUNT(*) FROM question');
    $row = $query->fetch();
    return $row[0];
}

function allquestions($pdo) {
	$questions = query($pdo, 'SELECT question.id, question, authorname, authoremail, categoryname FROM question
	INNER JOIN author ON authorid = author.id
	INNER JOIN category ON categoryid = category.id');
	return $questions->fetchAll();
}

function getquestion($pdo, $id) {
	$parameters = [':id' => $id];
	$query = query($pdo, 'SELECT * FROM question WHERE id = :id', $parameters);
	return $query->fetch();
}

function updatequestion($pdo, $questionid, $question) {
    $query = 'UPDATE question SET question = :question WHERE id = :id';
    $parameters = [':question' => $question, ':id' => $questionid];
    query($pdo, $query, $parameters);
}

function deletequestion($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM question WHERE :id = id', $parameters);
}

function insertquestion($pdo, $question, $authorid, $categoryid) {
    $query = 'INSERT INTO question SET question = :question, questiondate = CURDATE(), authorid = :authorid, categoryid = :categoryid';
    $parameters = [':question' => $question, ':authorid' => $authorid, ':categoryid' => $categoryid];
    query($pdo, $query, $parameters);
}


function totalCategories($pdo) {
    $query = query($pdo, 'SELECT COUNT(*) FROM category');
    $row = $query->fetch();
    return $row[0];
}

function allCategories($pdo) {
	$categories = query($pdo, 'SELECT * FROM category');
	return $categories->fetchAll();
}

function getCategory($pdo, $categoryid) {
	$parameters = [':categoryid' => $categoryid];
	$query = query($pdo, 'SELECT * FROM category WHERE id = :categoryid', $parameters);
	return $query->fetch();
}

function updateCategory($pdo, $categoryid, $categoryname) {
    $query = 'UPDATE category SET categoryname = :categoryname WHERE id = :id';
    $parameters = [':categoryname' => $categoryname, ':id' => $categoryid];
    query($pdo, $query, $parameters);
}


function totalAuthors($pdo) {
    $query = query($pdo, 'SELECT COUNT(*) FROM author');
    $row = $query->fetch();
    return $row[0];
}

function allAuthors($pdo) {
    $authors = query($pdo, 'SELECT * FROM author');
    return $authors->fetchAll();
}

function getAuthor($pdo, $id) {
	$parameters = [':id' => $id];
	$query = query($pdo, 'SELECT * FROM author WHERE id = :id', $parameters);
	return $query->fetch();
}

function updateAuthor($pdo, $id, $authorname, $authoremail) {
	$query = 'UPDATE author SET authorname = :authorname, authoremail = :authoremail WHERE id = :id';
	$parameters = [':authorname' => $authorname, ':id' => $id, ':authoremail' => $authoremail];
	query($pdo, $query, $parameters);
}

function deleteAuthor($pdo, $id) {
	$parameters = [':id' => $id];
	query($pdo, 'DELETE FROM author WHERE id = :id', $parameters);
}

function insertAuthor($pdo, $id, $authorname, $authoremail) {
	$query = 'INSERT INTO author (id, authorname, authoremail)
	VALUES (:id, :authorname, :authoremail)';
	$parameters = [':id' => $id, ':authorname' => $authorname, ':authoremail' => $authoremail];
	query($pdo, $query, $parameters);
}   

function imagedata($pdo) {
	$images = query($pdo, 'SELECT * FROM images');
	return $images->fetchAll();
}