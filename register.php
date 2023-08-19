<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    </head>
<form action="/stage_blog/register.php" method="post">
    <label for="username">username:</label>
    <input type="text" id="username" name="username"><br><br>
    <label for="password">password:</label>
    <input type="password" id="password" name="password"><br><br>
    <label for="mail">email:</label>
    <input type="text" id="mail" name="mail"><br><br>
    <button type="submit" name="register">submit</button>
</form>
</html>


<?php
session_start();
error_reporting(0);
if (($_SESSION['login'] != "")){
    header('Location: index.php');
}
if(array_key_exists('register', $_POST)){
    include 'toDB.php';
        

    $username = $_REQUEST['username'];
    $password = password_hash($_REQUEST['password'],PASSWORD_BCRYPT);
    $email_adress = $_REQUEST['mail'];
    $uuid = uniqid();
    if (!filter_var($email_adress, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        exit($emailErr);
    }
    $select = QueryToDB("SELECT * FROM users WHERE username = '".$username."'");
    if(mysqli_num_rows($select)) {
        exit('This username is already used!');
    }else{
        $select = QueryToDB("SELECT * FROM users WHERE mail = '".$email_adress."'");
        if(mysqli_num_rows($select)) {
            exit('This email address is already used!');
        }else{
            QueryToDB("INSERT INTO users (UUID, username, password, mail) VALUES ('$uuid','$username', '$password','$email_adress')");
            session_start();
            $_SESSION['login'] = $uuid;
            header('Location: index.php');
        }
    }
}
?>