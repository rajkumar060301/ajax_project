<?php
include "connection.php";
if($_POST["action"] == "insert"){
$name = $_POST["name"];
$email = $_POST["email"];
$date = $_POST["date"];
$number = $_POST["number"];
$jobtype = $_POST["jobtype"];
$password = $_POST["password"];




$query2 = "INSERT INTO `ajaxtable`( `name`, `email`, `date`, `number`, `jobtype`, `password`) VALUES ('$name','$email','$date','$number','$jobtype','$password')";	

mysqli_query($conn,$query2);

echo " Data Inserted Successfully";

}



?>