<?php include("../db_connection.php")?>
<?php
if( $_REQUEST["response"] ) 
{
	$query = "INSERT INTO text_report(id,response) values(NULL,\"Fail\")";
					$result = mysqli_query($connection, $query);
}

?>