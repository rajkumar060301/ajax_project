<html>
<head>
<style>
.error{color:red}
</style>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<?php if(isset($_GET['id'])){
$id = $_GET['id'];
	$type = $_GET['type'];


include"connection.php";
$query = "select * from ajaxtable where id = {$id}";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_assoc($result);
	$name = $row["name"];
	$email= $row["email"];
	$date = $row["date"];
	$number = $row["number"];
	$jobtype = $row["jobtype"];
	$password = $row["password"];
	
}



?>
<script>

 	var id = "<?php echo $id;?>";
	var type = "<?php echo $type;?>";
	
</script>
<?php
}
?>
<script>

$(document).ready(function(){

$("#submit").click(function() {

		
		
		let name = $("#name").val();
		let email = $("#email").val();
		let date = $("#date").val();
		let number = $("#number").val();
		let jobtype = $("#jobtype").val();
		let password = $("#password").val();
		
		
		if(name == ""){
			$("#nameerr").html("Please enter Your Name");
			return false
		}else if(!name.match(/^[a-zA-Z]+$/)){
			$("#nameerr").html("Only Alphabets are allowed");
				return false
		}else{
			$("#nameerr").hide();
		}
		
		if(email == ""){
			$("#emailerr").html("Please Enter Email");
				return false;
		}else{
			$("#emailerr").hide();
		}
		
		
     
        var selectedDate = new Date($("#date").val());
        var currentDate = new Date();
        var minDate = new Date(currentDate.getFullYear() - 18, currentDate.getMonth(), currentDate.getDate());
		
			if(date == ""){
			$("#dateerr").html("Please Enter DOB");
				return false
		}
        
        else if (selectedDate > minDate) {
         $("#dateerr").html("You must be 18 years or older.");
		 	return false
        } else{
			$("#dateerr").hide();
		}
      
		if(number ==""){
			$("#numbererr").html("Please Enter Mobile Number");
				return false
		}
		else if (number.length != 10){
				$("#numbererr").html(" Mobile Number is not valid");
					return false
		}
		else{
			$("#numbererr").hide();
		}
		
		
		if(jobtype == "Select job type"){
			$("#joberr").html("Please Select Your Occupation")
			return false
		}
		else{
			$("#joberr").hide();
		}
		
		if(password == ""){
			$("#passworderr").html("Please Enter Password")
			return false
		} else if (!password.match(/[!@#$%^&*]+$/) ){
			$("#passworderr").html("Please enter Strong Password")
			return false
		}
		else{
			$("#passworderr").hide()
		}
		

	// Insert Data
$.ajax({
  method: "POST",
  url: "insert.php",
  data: {action:"insert", name:name, email:email,date:date, number:number, jobtype:jobtype , password:password }
})
 
	});	
	
// Select Data 
		
				$.ajax({
  method: "GET",
  url: "select.php",
  data: {action:"select"}
})
  .done( function( msg ) {

       $("#table-container").html(msg); 
	  
  });
				
			
			
//delete data
						
				if( type == "delete"){
					$.ajax({
					  method: "POST",
                      url: "delete.php",
                      data: {action:"delete",deleteid:id}
})
  .done(function( msg ) {
      alert(msg);
	  
	    if(msg != ""){
	  window.location.href = "form.php";
	  
  }
	
  });
					}
					
					
	// Update Data 	

	
$("#update").click(function(e){
		 e.preventDefault();
			let name = $("#name").val();
		let email = $("#email").val();
		let date = $("#date").val();
		let number = $("#number").val();
		let jobtype = $("#jobtype").val();
		let password = $("#password").val();
			if(name == ""){
			$("#nameerr").html("Please enter Your Name");
			return false
		}else if(!name.match(/^[a-zA-Z]+$/)){
			$("#nameerr").html("Only Alphabets are allowed");
				return false
		}else{
			$("#nameerr").hide();
		}
		
		
	
		if(email == ""){
			$("#emailerr").html("Please Enter Email");
				return false;
		}else{
			$("#emailerr").hide();
		}
		
		
     
        var selectedDate = new Date($("#date").val());
        var currentDate = new Date();
        var minDate = new Date(currentDate.getFullYear() - 18, currentDate.getMonth(), currentDate.getDate());
			if(date == ""){
			$("#dateerr").html("Please Enter DOB");
				return false
		}
        
        else if (selectedDate > minDate) {
         $("#dateerr").html("You must be 18 years or older.");
		 	return false
        } else{
			$("#dateerr").hide();
		}
      
		
		
		if(number ==""){
			$("#numbererr").html("Please Enter Mobile Number");
				return false
		}
		else if (number.length != 10){
				$("#numbererr").html(" Mobile Number is not valid");
					return false
		}
		else{
			$("#numbererr").hide();
		}
		
		
		if(jobtype == "Select job type"){
			$("#joberr").html("Please Select Your Occupation")
			return false
		}
		else{
			$("#joberr").hide();
		}
		
		if(password == ""){
			$("#passworderr").html("Please Enter Password")
			return false
		} else if (!password.match(/[!@#$%^&*]/) ){
			$("#passworderr").html("Please enter Strong Password")
			return false;
		}
		else{
			$("#passworderr").hide()
		}
		

		$.ajax({
					  method: "POST",
                      url: "update.php",
                      data: {action:"update",updateid:id, name:name, email:email,date:date, number:number, jobtype:jobtype , password:password}
					  })
                      .done(function(msgup){
                      alert(msgup);
	                  if(msgup != ""){
	                  window.location.href = "form.php";  
  }
  });
  

	
});
			
			
			
});






</script>


</head>
<body>
<?php 



if(!isset($_GET['update'])){
$id = ""; $name=""; $email=""; $date=""; $number=""; $jobtype=""; $password="";

}

?>

<div class="container">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	

	
	<form action="" method="post">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="name" id="name" class="form-control" placeholder="Full name" type="text" value="<?php if($name !=""){ echo $name; }?>">
    </div>
		<p id="nameerr" class="error"></p>
		
	
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" id="email" placeholder="Email address" type="email" value="<?php if($email !=""){ echo $email; }?>">
    </div> 
	<p id="emailerr" class="error"></p>
	
	    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="date" class="form-control" id="date"  type="date" value="<?php if($date !=""){ echo $date; }?>">
    </div> 
	<p id="dateerr" class="error"></p>
	
	
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		
    	<input name="phone" class="form-control" id="number" placeholder="Phone number" type="tel" value="<?php if($number !=""){ echo $number; }?>">
    </div> 
	<p id="numbererr" class="error"></p>
	
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		</div>
		<select class="form-control" name="jobtype" id="jobtype">
			<option value="Select job type">Select job type</option>
			<option <?php if($jobtype=="Designer"){echo "selected";}?>>Designer</option>
			<option <?php if($jobtype=="Manager"){echo "selected";}?>>Manager</option>
			<option <?php if($jobtype=="Accaunting"){echo "selected";}?>>Accaunting</option>
		</select>
	</div> 
	<p id="joberr" class="error"></p>
	
	
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" placeholder="Create password" id="password" type="password" name="password" value="<?php if($password !=""){ echo $password; }?>">
    </div> 
	<p id="passworderr" class="error"></p>
                    <?php if( $id !="" and $type == "update"){  ?>             
    <div class="form-group">
        <button type="submit" id="update" class="btn btn-primary btn-block"> Update</button>
    </div>   
<?php 
					}else{
?>						
            <div class="form-group">
        <button type="submit" id="submit" class="btn btn-primary btn-block"> Create Account  </button>
    </div>  
<?php 
					}
?>					
</form>


</article>
</div>
  
</div> <br>
 
	<div id="table-container"></div>
</body>
</html>