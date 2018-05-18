<?php include("../db_connection.php")?>
<?php
if( $_REQUEST["response"] ) 
{
	$query = "SELECT last_id from name_user where id=1";
					$result = mysqli_query($connection, $query);
					$row = mysqli_fetch_array($result);
								echo $row["last_id"];
}

?>