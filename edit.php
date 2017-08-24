<html>
   <body>
      <?php
         if(!empty($_POST)) {
            $conn = mysql_connect('localhost:3306', 'root', "");
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
			$num=$_POST['number'];
			$nm=$_POST['name'];
			$br=$_POST['branch'];
			$ph=$_POST['phone'];

            $sql = "UPDATE stu SET name='$nm', branch='$br', phone=$ph WHERE num=$num";
            mysql_select_db('student');
			$result = mysql_query($sql, $conn);
            if(! $result ) {
               die('Could not delete data: ' . mysql_error());
            }
            echo "<script type=\"text/javascript\">
				window.location.href = (\"index1.php\");
			</script>" ;
            mysql_close($conn);
		 }
		 else{
			 echo "noo";
		 }
		?>
	</body>
</html>