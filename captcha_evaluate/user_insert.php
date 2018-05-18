<?php include("../db_connection.php")?>
<?php
if( $_REQUEST["response"] ) 
$query = "INSERT INTO name_user(id,name) values(NULL,\"Pass\")";
					$result = mysqli_query($connection, $query);
?>