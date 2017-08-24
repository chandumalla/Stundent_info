<!DOCTYPE html>
<html>
	<head>
		<title>list</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<center><h2><u>Student Information</u></h2></center>
		<hr>
		<br><br>
		<input type="button" class=" btn btn-success btn-md" onClick="Javascript:window.location.href = 'add.php';" value="Add"</>
		<br /><br />
		<?php
			global $conn;
			$conn = mysql_connect('localhost:3306', 'root', "");   
			if(! $conn ) {
				die('Could not connect: ' . mysql_error());
			}
			mysql_select_db('student');
			$sql = ("SELECT num, name, branch, phone FROM stu;");
			$result = mysql_query($sql, $conn);
			$num_rows = mysql_num_rows($result);
			$i = 0;
			$count = 0;
			
			/* counts the length of records	*/
			while($i*5 < $num_rows){
				$count = $count+1;
				$i++;
			}
			$page1 = 0;
			$sql = ("SELECT num, name, branch, phone FROM stu LIMIT $page1, 5;");
			$result = mysql_query($sql, $conn);
			
			/*	Executes for every change in pagination number_format*/
			if(isset($_GET['pp']) == true){
				$page=$_GET['pp'];
				$page1 = (($page-1)*5);
				echo "<script type='text/javascript'>";
					for($i=1; $i<=$count; $i++){
						echo "if($('#pg" . $i . "').hasClass('active')){";
						echo "$('#pg" . $i . "').removeClass('active');";
						echo "}";
					}
					echo "$('#pg".$page."').addClass('active');";
				echo "</script>";
				$sql=("SELECT num, name, branch, phone FROM stu Limit $page1,5;");
			}
			$result = mysql_query($sql, $conn);
			if ($result) {
				echo "<div class='container' id='tb'><table class='table table-hover'><thead><tr><th><b><u>Number</u></b></th>
							<th><b><u>name</u></b></th>
							<th><b><u>Branch</u></b></th>
							<th><b><u>phone</u></b></th>
							<th><b><u>Edit</u></b></th>
							<th><b><u>Delete</u></b></th>
						</thead></tr>";
				while($row = mysql_fetch_assoc($result)) {
					$pid = "rem" . $row["num"];
					$edt = "edt" . $row["num"];
					echo "<tr><td>" . $row["num"]. "</td><td>" . $row["name"]. "</td><td>" . $row["branch"]. "</td><td>" . $row["phone"]. "</td><td><p><b><a href='' id='{$edt}' >edit</a></b></p></td><td><p><b><a href='' id='{$pid}' >remove</a></b></p></td></tr>";	
				}
				echo "</table></div>";
			}
			else {
					echo "0 results";
			}
			mysql_close();
		?>
		
		<!--	It is for pagination.Count of the pagination will calculated dynamically.	-->
		<center>
		<div class="container" >
			<ul class="pagination justify-content-center" id="page">
			</ul>
		</div>
		</center>
		<script>
			var count = " <?php echo $count ?> ";
			var i;
			for(i=1; i<=count; i++){
				var dd = "pg"+(i).toString();
				$('#page').append("<li><a href='index1.php?pp="+i+"' id='"+dd+"'  >"+(i)+"</a></li>");
			}
		</script>
		<script>
			$(document).ready(function(){
				
				/* It executes when both edit or remove option is clicked	*/
				$(document).delegate('#tb a', 'click', function(e){
					e.preventDefault();
					var get_id = e.target.id.slice(3, );
					if(e.target.id.slice(0, 3) == "rem"){				/*Using id of the tag, it checks whether it is edit or remove.	*/
						if(confirm("Are you sure to delete?") == true){
							window.location.href = ("delete.php?stu_id="+get_id);
						}
					}
					else{
						window.location.href = ("edithtml.php?stu_id="+get_id);
					}			
					window.location.reload();
				});
			});
		</script>
	</body>
</html>