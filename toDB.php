<?php

// How To Use:
// include 'common/ConnectionDB.php';
// $result = QueryToDB("SELECT * FROM user");
// while($row = $result->fetch_assoc()){
//     print_r($row);
// }

$mysqli = new mysqli("localhost", "root", "", "stage_blog");
function QueryToDB(string $query):mysqli_result|bool
{
    global $mysqli;
    $result = $mysqli->query($query);
    return $result;
}
?>