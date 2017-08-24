<html>
<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	label{
			display:inline-block;
			width:100px;
			margin-bottom:10px;
	}
	
	input[type=text]:focus {
		border: 3px solid #555;
	}
</style>
 
 
<title>Add Employee</title>
</head>
<body>
	<center><h2><u>Student Information</u></h2></center>
	<hr>
	<br /><br />
	<form name="myForm" method="post" action="add_data.php" onsubmit = "return validate()">
		<div class="form-group">
			<b><label for="inputdefault">Number:</label></b>
			<input type="number" class="form-control" name="number" placeholder="Enter number"/>
			<br /><br />
			<b><label for="inputdefault">Name:</label></b>
			<input type="text" class="form-control" name="name" placeholder="Enter name"/>
			<br /><br />
			<b><label for="inputdefault">Branch:</label></b>
			<select id="mySelect" class="form-control" name="branch">
				<option>it</option>
			<option class="form-control">cse</option>
			<option class="form-control">mech</option>
			<option class="form-control">ece</option>
			<option class="form-control">eee</option>
			</select>
			<br /><br />
			<b><label for="inputdefault">Phone_number:</label></b>
			<input type="number" class="form-control" name="phone" placeholder="Enter phone number"/>
			<br /><br />
			<input type="submit" class="btn btn-success btn-md" value="Add data" />
		</div>
	</form>
	
	<script type="text/javascript">
		function validate(){
			var brnch = ["it", "cse", "ece", "eee", "mech"];
			var check = document.forms["myForm"]["phone"].value;
			var nm = document.forms["myForm"]["name"].value;
			var br = document.getElementById("mySelect").value;
			if(confirm("Are you sure to edit?") == true){
				
				if(nm == ""){
					alert( "Name field is null!!!");
					return false;
				}
				else if(br!="" && (brnch.indexOf(br)<0)){
					alert("Incorrect branch field.");
					return false;
				}
				else if((check.toString().length != 10)){
					alert("Phone number should be of 10 digits!!!");
					return false;
				}
				else{
					return true;
				}
			}
			else{
				return false;
			}
		}
	</script>
 
 
</body>
</html>