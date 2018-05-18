<?php include("../db_connection.php")?>
<?php
if( $_REQUEST["response"]) 
{
	$query = "truncate captcha_evaluate_set";
					$result = mysqli_query($connection, $query);
}

?>