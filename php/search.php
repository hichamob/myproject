<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'domaine';

    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    /*$name = $_post['search'];*/

   if (mysqli_connect_errno())
     {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
/*
$result = mysqli_query($con, "SELECT * FROM search
   WHERE name LIKE '%{$name}%'");
*/
   if ($stmt = $con->prepare('SELECT * FROM search WHERE name = ?')) {

    $stmt->bind_param('s', $_POST['search']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {

        echo 'name exists, please choose another!';
    }
    else {
    
        echo 'name not exists , you can creat your domaine please chose what you want';
    } 
}
/*
while ($row = mysqli_fetch_array($result))
{
    if ($stmt = $con->prepare('SELECT * FROM search WHERE name = ?')) {

        $stmt->bind_param('s', $_POST['name']);
        $stmt->execute();
        $stmt->store_result();
    
        if ($stmt->num_rows > 0) {
    
            echo 'name exists, please choose another!';
        }
        else {

            echo 'name not exists , you can creat your domaine please chose what you want';
        } 
    }
}*/
   mysqli_close($con);
?>