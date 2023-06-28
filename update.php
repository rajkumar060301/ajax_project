<?php
include "connection.php";

$id = $_POST["updateid"];
$name = $_POST["name"];
$email = $_POST["email"];
$date = $_POST["date"];
$number = $_POST["number"];
$jobtype = $_POST["jobtype"];
$password = $_POST["password"];

$query = "UPDATE `ajaxtable` SET `name`='$name',`email`='$email',`date`='$date',`number`='$number',`jobtype`='$jobtype',`password`='$password' WHERE id = {$id}";

mysqli_query($conn,$query);
echo "Data Updated SuccessFully";


?>