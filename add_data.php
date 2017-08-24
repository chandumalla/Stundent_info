<html>
	<body>
		<?php
			$conn = mysql_connect('localhost:3306', root, "");
			if(! $conn ) {
				die('Could not connect: ' . mysql_error());
			}
			$num=$_POST['number'];
			$nm=$_POST['name'];
			$br=$_POST['branch'];
			$ph=$_POST['phone'];
			$sql = "INSERT IGNORE INTO stu "."(num, name, branch, phone) "."VALUES ( '$num', '$nm', '$br', '$ph' )";
			mysql_select_db('student');
			$retval = mysql_query( $sql, $conn );
			if(! $retval ) {
				die('Could not enter data: ' . mysql_error());
			}
			echo "Entered data successfully\n";
			mysql_close($conn);
		?>
		<script>
			window.location.href = 'index1.php';
		</script>
	</body>
</hmtl>
