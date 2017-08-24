<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Edit student</title>
</head>
<body>
	<?php
		$conn = mysql_connect('localhost:3306', 'root', "");   
		if(! $conn ) {
			die('Could not connect: ' . mysql_error());
		}
		$stu_id = $_GET['stu_id'];
		$sql = ("SELECT num, name, branch, phone FROM stu WHERE num='$stu_id';");
		mysql_select_db('student');
		$result = mysql_query($sql, $conn);
		$row = mysql_fetch_array($result);
		$num1 = $row['num'];
		$name1 = $row['name'];
		$branch1 = $row['branch'];
		$phone1 = $row['phone'];
		mysql_close();
	?>
	<center><h2><u>Edit Student Information</u></h2></center>
	<hr>
	<br><br>
	<form name="myForm" method="post" action="edit.php" onsubmit = "return validate()">
		<div class="form-group">
			<b><label for="inputdefault">Number:</label></b>
			<input type="number" class="form-control" name="number" value="<?=$num1?>" readonly/>
			<br /><br />
			<b><label for="inputdefault">Name:</label></b>
			<input type="text" class="form-control" name="name" value="<?=$name1?>" />
			<br /><br />	
			<b><label for="inputdefault">Branch:</label></b>	
			<select id="mySelect" class="form-control" name="branch">
				<option class="form-control">it</option>
				<option class="form-control">cse</option>	
				<option class="form-control">mech</option>
				<option class="form-control">ece</option>	
				<option class="form-control">eee</option>
			</select>
			<br /><br />
			<b><label for="inputdefault">Phone_number:</label></b>
			<input type="number" class="form-control" name="phone" value="<?=$phone1?>"/>
			<br /><br />
			<center><button class=" btn btn-success btn-md">Edit data</button><center>
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