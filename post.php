<html>
    <head>
        <meta charset="UTF-8">
        <title>Post</title>
    </head>
<?php
include 'toDB.php';
    session_start();
    error_reporting(0);


?>

<?php

$ID_autor = $_SESSION['login'];
$message = $_POST['message'];
$today = date("Y-m-d");
$result = QueryToDB("INSERT INTO post (UUID_Author, content, date) VALUES (\"".$_SESSION['login']."\",\"".$message."\", \"".$today."\")");
header('Location: index.php');

