<html>
<head>
<style>
a{text-decoration:none; color:white}
a:hover{text-decoration:none; color:white}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


<script>

$(document).ready(function () {
    $('#example').DataTable();
	
});
</script>

</head>
<body>
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Number</th>
            <th>Jobtype</th>
            <th>Password</th>
            <th>Delete Data</th>
            <th>Update Data</th>
        </tr>
    </thead>
    <tbody>

<?php
include "connection.php";
$query = "select * from ajaxtable";
$result = mysqli_query($conn,$query);
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
				?>
			
	
        <tr>
            <td><?php echo $row["id"];?></td>
            <td><?php echo $row["name"];?></td>
            <td><?php echo $row["email"];?></td>
            <td><?php echo $row["date"];?></td>
            <td><?php echo $row["number"];?></td>
            <td><?php echo $row["jobtype"];?></td>
            <td><?php echo $row["password"];?></td>
            <td><button type="button" class="btn btn-danger" ><a href="form.php?id=<?php  echo $row["id"];?>&type=delete">Delete</a></button></td>
            <td><button type="button" class="btn btn-success"><a href="form.php?id=<?php  echo $row["id"];?>&type=update&update=updateid">Update</a></button></td>
			<?php
     echo   "</tr>";
			}
    echo "</tbody>";
 echo "</table>";
		}
		?>
</body>
</html>