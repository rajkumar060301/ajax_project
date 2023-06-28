<?php
include "connection.php";
$id = $_POST["deleteid"];
$query = "delete from ajaxtable where id = {$id}";
mysqli_query($conn,$query);
echo "Data Deleted Successfully";


?>