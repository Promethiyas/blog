<html>
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
    </head>
<?php
include 'toDB.php';
    session_start();
    error_reporting(0);
$result1 = QueryToDB("SELECT post.ID, post.UUID_Author, post.content, post.date, users.username FROM post JOIN users ON post.UUID_Author = users.UUID ORDER BY date DESC");
if ($_SESSION['login']!= ""){
    ?>
    <form action="session_destroyer.php" method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
    <form action="aboutme.php" method="post">
        <button type="submit" name="aboutme">About me</button>
    </form>
    <form action="contact.php" method="post">
        <button type="submit" name="contact">Contact</button>
    </form>
    <form action="Project.php" method="post">
        <button type="submit" name="project">Project</button>
    </form>
    <form action="post.php" method="post">
        <input type="text" name="message"></input>
        <input type="submit" value="post it">
    </form>
    <?php
}

if ($_SESSION['login'] == ""){?>
    <form action="login.php" method="post">
        <button type="submit" name="LOGIN">Login</button>
    </form>
    <form action="register.php" method="post">
        <button type="submit" name="REGISTER">Register</button>
    </form>
    <?php
}

while($row = $result1->fetch_assoc()){
    
    ?> 
            <div class="box">
                <?php $id = $row['ID'];?>
                <?php $uuid = $row['UUID_Author'];?>
                <?php $username1 = $row['username']?>
                <?php $date = $row['date']; ?>
                <?php $message1 = $row['content']; ?>
                <h><?php echo $username1 ?></h>
                <br />
                <h2><?php echo $message1 ?></h2>
               <br /> 

                <p>Published : <?php echo $date ?></p>
            </div>
        
            <?php }
    
?>