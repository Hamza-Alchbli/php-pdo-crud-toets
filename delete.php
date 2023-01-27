<?php
// connecting to db 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php-pdo-crud-toets";
$id = $_GET["deleteid"];

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
    // run the delete statment using the $id that we got with $_GET
    $sql = "delete from DureAuto where id = $id";
    $pdo->exec($sql);
    echo $pdo->exec($sql);
    echo "<br>record is succesvol verwijderd";
    header('Refresh:3; url=read.php');

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

