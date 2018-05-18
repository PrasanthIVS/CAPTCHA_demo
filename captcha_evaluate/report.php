<?php session_start(); ?>
<?php require_once("../db_connection.php"); ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<!--<meta http-equiv="refresh" content="5">-->
	<script src="../text_captcha/js/jquery-3.3.1.js"></script>
	<title>Report</title>
		<link rel="stylesheet" href="..\text_captcha\bootstrap\css\bootstrap.min.css" type="text/css"/>
		<link href="../text_captcha/css/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<div id="header">
      <h2><b><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Report &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
    </div>
</br></h2></b></br>
	<script type="text/javascript">
		
			$(window).on("load",function(e){
	$('#check').click(function()
					{
						$.post( 
                  "truncate_report.php",
                  { response: "text" },
                  
               );
			   
					});
					
			
			$('#start-over').click(function()
					{
						$.post( 
                  "truncate_report.php",
                  { response: "text" },
                  
               );
			   
			   
						
					});
			});
		</script>
	<body>
	<div class="container">
	<h4><b>Want to review the results of other users? Select a user to view</h4></b>
	<span class="dropdown">
		<button class="btn btn-primary dropdown-toggle" id="dropdown" type="button" data-toggle="dropdown">Select User
			<span class="caret"></span></button>
			<ul class="dropdown-menu">
			  <?php 
			  $query = "select last_id from name_user where id=1";
									$result = mysqli_query($connection, $query);
									$response1 = mysqli_fetch_array($result);
									$last_id = $response1[0];
									$query = "select name from name_user where id={$last_id}";
									$result = mysqli_query($connection, $query);
									$response2 = mysqli_fetch_array($result);
									$last_inserted_user_name = $response2[0];
									
									
				if(isset($_GET["sr"]) && isset($_GET["er"])){
				$query = "SELECT COUNT(id) FROM name_user";
									$result = mysqli_query($connection, $query);
									$response = mysqli_fetch_array($result);
									$user_count = $response[0];
				for($row=1; $row<=$user_count; $row++){ ?>
				<li>
					<a href="report.php?sr=<?php echo (($row-1)*10)+1; ?>&er=<?php echo $row*10; ?>">
									<?php 
									$query = "select name,id from name_user where id={$row}";
									$result = mysqli_query($connection, $query);
									$response = mysqli_fetch_array($result);
									if(($response[0] == $last_inserted_user_name) && ($response[1] == $last_id)){
									echo ucfirst($response[0]) . " (You)"; 
									}else{
									echo ucfirst($response[0]);
								}
								
									?>
					</a>
				</li>
				<?php }}else{
					$query = "SELECT COUNT(id) FROM name_user";
									$result = mysqli_query($connection, $query);
									$response = mysqli_fetch_array($result);
									$current_user_id = $response[0];
									//echo $current_user_id;
									$_GET["sr"] = (($current_user_id-1)*10)+1;
									$_GET["er"] = $current_user_id * 10;
									
									for($row=1; $row<=$current_user_id; $row++){ ?>
									<li><a href="report.php?sr=<?php echo (($row-1)*10)+1; ?>&er=<?php echo $row*10; ?>">
									<?php $query = "select name from name_user where id={$row}";
									$result = mysqli_query($connection, $query);
									$response = mysqli_fetch_array($result);
									echo ucfirst($response[0]);?></a></li>
				<?php }} ?>
		  </ul>
	</span>
		<table class="table table-striped" align="center" border="4px solid black">
		 <thead colspan="3"><h4><b>Hey <?php
		 $user_id = (($_GET["sr"]-1)/10)+1;
						$query = "select name from name_user where id={$user_id}";
						$result = mysqli_query($connection, $query);
						$response = mysqli_fetch_array($result);
						echo ucfirst($response[0]);
					?> ! Find your results below. The rows indicate the results for 10 attempts.</b></h4></thead>
			<thead><tr>
			<th><center><b><h3><span class="glyphicon glyphicon-text-size"></span>&nbsp;Text Captcha</h3></b></center></th>
			<th><center><b><h3><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Visual Captcha</h3></b></center></th>
			<th><center><b><h3><span class="glyphicon glyphicon-th-large"></span>&nbsp;Collage Captcha</h3></b></center></th>
			</tr></thead>
			<tbody>
     <?php 
		for($row=$_GET["sr"]; $row<=$_GET["er"]; $row++){?>
			<tr>
			
			<td><center><?php
						$query = "select response from text_report where id={$row}";
						$result = mysqli_query($connection, $query);
						$response = mysqli_fetch_array($result);
						echo $response[0];
					?>	</center></td>
			<td><center><?php
						$flag = ($row*2)-1;
						$query = "select response from visual_report where id={$flag}";
						$result = mysqli_query($connection, $query);
						$response = mysqli_fetch_array($result);
						echo $response[0];
					?>	</center></td>
			<td><center><?php
						$query = "select response from collage_report where id={$row}";
						$result = mysqli_query($connection, $query);
						$response = mysqli_fetch_array($result);
						echo $response[0];
					?>	</center></td>
					
			</tr>
		<?php }
		
	 
		$query = "SELECT COUNT(id) FROM text_report where id BETWEEN {$_GET["sr"]} AND {$_GET["er"]} AND response=\"pass\"";
						$result = mysqli_query($connection, $query);
						$response = mysqli_fetch_array($result);
						$text_pass_count = $response[0];
					$visual_sr = (($_GET["sr"])*2)-1;
					$visual_er = $_GET["er"] * 2;
		
		$query = "SELECT COUNT(id) FROM visual_report where id BETWEEN {$visual_sr} AND {$visual_er} AND response=\"pass\" AND id%2!=0";
						$result = mysqli_query($connection, $query);
						$response = mysqli_fetch_array($result);
						$visual_pass_count = $response[0];
		$query = "SELECT COUNT(id) FROM collage_report where id BETWEEN {$_GET["sr"]} AND {$_GET["er"]} AND response=\"pass\"";
						$result = mysqli_query($connection, $query);
						$response = mysqli_fetch_array($result);
						$collage_pass_count = $response[0];
						
	?>
			</tbody>
		</table>
	</div>
	<center>
	<?php $total_pass_count = $text_pass_count + $visual_pass_count + $collage_pass_count;
		  $pass_percent = (($total_pass_count*100)/30); 
	 if($pass_percent<34){
		$color="#870000";
	}else if($pass_percent>34 && $pass_percent<67){
		$color="orange";
	}else{
		$color="#5CB85C";
	}
	?>
	<h3>
		<b>
			<div class="label label-default">
				<font color="black">Success Rate:</font> <font color="<?php echo $color; ?>"><?php echo round($pass_percent,2); ?>%</font>
			</div>
		</b>
	</h3><br/>
	<a type="button" id="check" class="btn btn-success btn-lg" href="http://localhost/captcha/text_captcha/index.php">
	<span class="glyphicon glyphicon-home"></span>&nbsp; Home</a>
	<a type="button" id="start-over" class="btn btn-success btn-lg fixed-top" href="http://localhost/captcha/captcha_evaluate/user.php">
	<span class="glyphicon glyphicon-repeat"></span>&nbsp; Start over</a></b></h1></center>
	
	</body>
	