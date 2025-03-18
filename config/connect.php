<?php 

$dsn = "mysql:host=localhost;dbname=ddl";
$username = "root";
$pass = "";

try 
{
    $con = new PDO($dsn, $username, $pass);

}
catch (PDOException $e)
{
    die("error " . $e->getMessage());
}


?>