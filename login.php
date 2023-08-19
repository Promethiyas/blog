<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <form action="/stage_blog/login.php" method="post">
        <label for="username">username:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" name="login" value="login">
    </form>
</html>


<?php
session_start();
if (($_SESSION['login'] != "")){
    header('Location: index.php');
}
if(array_key_exists('login', $_POST)){
    include 'toDB.php';
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $requested_password = "";
    $result = QueryToDB("SELECT * FROM users WHERE username = '$username'");
    while($row = $result->fetch_assoc()){
        $requested_password = $row['password'];
        $uuid = $row['UUID'];
    }
    
    if (password_verify($password, $requested_password)) {
        echo 'Password is valid!';
        session_start();
        $_SESSION['login'] = $uuid;
        header('Location: index.php');
    }else{
        echo 'Invalid password.';
    }
}
