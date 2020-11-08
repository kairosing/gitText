<?php
session_start();

$text = $_POST['text'];

$pdo = new PDO("mysql:host=localhost;dbname=get_fort;","root","123");

$sql = "SELECT * FROM my_table WHERE text=:text";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);
$task = $statement->fetch(PDO::FETCH_ASSOC);

if (!empty($task)){
    $message = "  Введеная запись уже присутствует в таблице.";
    $_SESSION['danger'] = $message;

    header("Location: task_10.php");
    exit;
}

$sql = "INSERT INTO my_table (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);


$message = "  Введеная запись уже присутствует в таблице.";
$_SESSION['success'] = $message;

header("Location: task_10.php");