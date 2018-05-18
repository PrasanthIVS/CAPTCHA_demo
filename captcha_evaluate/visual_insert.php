<?php include("../db_connection.php")?>
<?php
if( $_REQUEST["response"] ) 
	if($_REQUEST["response"] == "Pass"){
$query = "INSERT INTO visual_report(id,response) values(NULL,\"Pass\")";
					$result = mysqli_query($connection, $query);
  
}
else{
	$query = "INSERT INTO visual_report(id,response) values(NULL,\"Fail\")";
					$result = mysqli_query($connection, $query);
}

?>