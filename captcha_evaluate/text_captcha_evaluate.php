<?php session_start(); ?>
<?php include("../db_connection.php"); ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<head>
		<script src="../text_captcha/js/jquery-3.3.1.js"></script>
		<title>Text Captcha Evaluation</title>
		<link rel="stylesheet" href="..\text_captcha\bootstrap\css\bootstrap.min.css" type="text/css"/>
		<link href="../text_captcha/css/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	</head>
	<?php 
		if(!isset($_SESSION["username"])){
			$_SESSION["username"] = $_POST["username"];
			$username = $_SESSION["username"];
				
		$query = "INSERT INTO name_user(id,name,last_id) values(NULL,'$username',NULL)";
							$result = mysqli_query($connection, $query);
				$last_id = mysqli_insert_id($connection);
		$query = "update name_user set last_id=$last_id where id=1";
		$result = mysqli_query($connection, $query);
		}
	?>
	<div id="header">
		<h2>
			<b>
				<span class="glyphicon glyphicon-text-size"></span>&nbsp;Text Captcha Evaluation 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
				<span class="label label-success" id="l1">
				Welcome <?php
						$query = "select last_id from name_user where id=1";
						$result = mysqli_query($connection, $query);
						$response = mysqli_fetch_array($result);
						
						$query = "select name from name_user where id=$response[0]";
						$result = mysqli_query($connection, $query);
						$response = mysqli_fetch_array($result);
						echo ucfirst($response[0]);
						?>	!
				</span>
			</b>
		</h2>
	</div></br>
	<div id="abbr" class="col-xs-4 col-md-offset-4">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<b>Completely Automated Public Turing test to tell Computers and Humans Apart</b>
	</div></br></br>
	<img id="secondimg" class="center" src="..\text_captcha\backgrounds\hero2.jpg" height="100" width="475"/>
	<img id="robotimg" class="center" src="..\text_captcha\backgrounds\Capture.jpg" height="200" width="500"/></br>
	<?php  
		$cap_img = array();
		function randomnum($min, $max, $quantity) {
		$numbers = range($min, $max);
		shuffle($numbers);
		return array_slice($numbers, 0, $quantity);
		}

		$cap_img = randomnum(11,62,10);
		if(!isset($_SESSION["cap_img_value"])){
		for($i=0;$i<10;$i++){
			$query = "INSERT INTO captcha_evaluate_set(id,value) values(NULL, $cap_img[$i])";
			$result = mysqli_query($connection, $query);
		}
		$imagename = $cap_img[0];
		$_SESSION["cap_img_value"]=1;
			}else{
		++$_SESSION["cap_img_value"];
			$query = "SELECT value from captcha_evaluate_set where id={$_SESSION["cap_img_value"]}";
			$result = mysqli_query($connection, $query);
			$row = mysqli_fetch_array($result);
			$imagename = $row[0];
			echo $_SESSION["cap_img_value"];
		}
	
	 if(!isset($_SESSION['counter'])) {
			$_SESSION['counter'] = 9;
			}else if($_SESSION["counter"] <= 0){
					session_unset(); 
					session_destroy();
					header('Location: http://localhost/captcha/captcha_evaluate/visual_captcha_evaluate.php');
			}else{
				--$_SESSION["counter"];} 
	?>
	<body>
	<?php //retrieving answer from database
			
			if(htmlspecialchars(isset($_POST["input"])) && isset($_GET["id"]))
			{
				$id = mysqli_real_escape_string($connection, $_GET["id"]);
				$query  = "SELECT answer ";
				$query .= "from image_ans ";
				$query .= "WHERE id = {$id} ";
				$query .= "LIMIT 1";
				$result = mysqli_query($connection, $query);
				$row = mysqli_fetch_array($result);
			//echo $row["answer"];
			if(mysqli_affected_rows($connection) == 1)
				$input = str_replace(' ', '', $_POST["input"]);
			if(htmlspecialchars($input) == $row["answer"]){
				mysqli_free_result($result);
		?>
			
		<center>
			<strong>
				<div class="alert alert-success col-xs-auto alert-trim">
					<span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;Awesome! Validation Success!!
					<?php
						$query = "INSERT INTO text_report(id,response) values(NULL,\"Pass\")";
						$result = mysqli_query($connection, $query);
					?>
				</div>
			</strong>
		</center>
		
		<?php }else{ ?>
		
		<center>
			<strong>
				<div class="alert alert-danger col-xs-auto alert-trim">
					<span class="glyphicon glyphicon-remove"></span>&nbsp;Uh oh! Something is wrong. Try again!
					<?php
						$query = "INSERT INTO text_report(id,response) values(NULL,\"Fail\")";
						$result = mysqli_query($connection, $query);
					?>
				</div>
			</strong>
		</center>
		
		<?php } }  ?>
		
		</br></br>
		
		<script type="text/javascript">
		$(document).ready(function(){	//running the timer for 60 seconds
		var number = 60;
		var url = 'http://localhost/captcha/captcha_evaluate/text_captcha_evaluate.php';
					
		function countdown(){
			setTimeout(countdown, 1000);
			$('#box').html(number + " s");
			number--;
			if(number < 0){
				$.post( 
                "text_insert.php",
                { response: "Fail" },
                 );
				window.location = "http://localhost/captcha/captcha_evaluate/text_captcha_evaluate.php";
				number = 0;
				}
			}
			countdown();
			
			$('#refresh').click(function()
				{
					$.post( 
                    "text_insert.php",
                    { response: "Fail" },
                );
			  });
			});
		</script>
	<img id="capimg" class="center" src="..\text_captcha\images\<?php echo $imagename; ?>.jpg" height="100" width="300">
		<!--<img id="gifimg" src="backgrounds/hero.gif" height="100" width="115"/>--></br>
		<form method="post" action="text_captcha_evaluate.php?id=<?php {echo $imagename;}  ?>">
			<div class="col-xs-2 col-xs-offset-5">
				<input type="text" autofocus="autofocus" class="form-control" autocomplete="off" placeholder="Enter the characters shown above" name="input" required>
			</div><br/><br/><br/>
			<center>
				<div class="btn-group">
					<button class="btn btn-danger btn-md" type="submit">
						<span class="glyphicon glyphicon-upload"></span> Submit
					</button>&nbsp;
					<a type="button" id="refresh" class="btn btn-danger btn-md" href="http://localhost/captcha/captcha_evaluate/text_captcha_evaluate.php">
						<span class="glyphicon glyphicon-refresh"></span>&nbsp; Refresh (in <span id="box"></span>)
					</a>
				</div><br/><br/>
				<strong>
					<div class="alert alert-info col-xs-auto alert-trim">
						After <?php echo $_SESSION["counter"]; ?> attempt(s) you will be directed to evaluate visual captcha &nbsp;<span class="glyphicon glyphicon-time"></span>&nbsp; Hitting Refresh or Timeout will fail the current set!
					</div>
				</strong>
			</center>
		</form>
	</body>
	<?php mysqli_close($connection); ?>
