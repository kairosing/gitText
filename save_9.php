<?php

$text = $_POST['text'];

$pdo = new PDO("mysql:host=localhost;dbname=get_fort;","root","123");
$sql = "INSERT INTO my_table (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);

header("Location: task_9.php");