<html>
   <body>
      <?php
         if(!empty($_GET)) {
            $conn = mysql_connect('localhost:3306', 'root', "");
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            $stu_id = $_GET['stu_id'];
            echo stu_id;
            $sql = "DELETE FROM stu WHERE num = $stu_id" ;
            mysql_select_db('student');
			$result = mysql_query($sql, $conn);
            if(! $result ) {
               die('Could not delete data: ' . mysql_error());
            }
            mysql_close($conn);
		 }
		 else{
			 echo "noo";
		 }
	?>
   </body>
</html>