<?php session_start(); ?>
<?php include("../db_connection.php"); ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Object Collage Captcha Evaluation</title>
		<head>
			<link rel="stylesheet" href="..\collage_captcha\bootstrap\css\bootstrap.min.css" type="text/css"/>
			<script src="../collage_captcha/js/jquery-3.3.1.js"></script>
			<link rel="stylesheet" href="../collage_captcha/styles.css" type="text/css"/>
		</head>
	<div id="header">
		<h2>
			<b>
				<span class="glyphicon glyphicon-th-large"></span>&nbsp;Object Collage Evaluation 
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
					?> !</span>
			</b>
		</h2>
	</div></br>
	<?php  
		$cap_img = array();
		/*$count = array();
		for($i=11; $i<62; $i++){
			array_push($cap_img,"$i");
		}
		shuffle($cap_img);*/
				
		function randomGen($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

$cap_img = randomGen(1,20,10);
if(!isset($_SESSION["cap_img_value"])){
for($i=0;$i<10;$i++){
	$j=$i+1;
$query = "update captcha_evaluate_set set value={$cap_img[$i]} where id={$j}";
						$result = mysqli_query($connection, $query);
}
	$folder_name = $cap_img[0];
	$_SESSION["cap_img_value"]=1;
}else{
	++$_SESSION["cap_img_value"];
	$query = "SELECT value from captcha_evaluate_set where id={$_SESSION["cap_img_value"]}";
						$result = mysqli_query($connection, $query);
						$row = mysqli_fetch_array($result);
						$folder_name = $row["value"];
						}
		 if(!isset($_SESSION['counter'])) {
					$_SESSION['counter'] = 9;
					}else if($_SESSION["counter"] <= 0){
						session_unset(); 
						session_destroy();
						header('Location: http://localhost/captcha/captcha_evaluate/report.php');
					}else{
						--$_SESSION["counter"];} ?>
						
	<script type="text/javascript">
		$(document).ready(function(){	//running the timer for 60 seconds
			var number = 60;
			var url = 'http://localhost/captcha/captcha_evaluate/collage_captcha_evaluate.php';
					
			function countdown(){
				setTimeout(countdown, 1000);
				$('#box').html(number + " s");
				number--;
				
				if(number < 0){
					$.post( 
                  "collage_insert.php",
                  { response: "No" },
                  
					);
					window.location = "http://localhost/captcha/captcha_evaluate/collage_captcha_evaluate.php";
					number = 0;
				}
			}
			countdown();
			$('#refresh').click(function()
					{
						$.post( 
                  "collage_insert.php",
                  { response: "Fail" },
                  
					);
			  });
		});
	</script>


	<body>
		<div id="abbr" class="col-xs-4 col-md-offset-4">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b>Completely Automated Public Turing test to tell Computers and Humans Apart</b>
		</div></br>
		<img id="robotimg" class="center" src="../text_captcha/backgrounds\Capture.jpg" height="200" width="500"/></br>
		<center>
			<span id="resultmsg"></span>
		</center>
			<?php
				if(isset($_POST["input1"]) && isset($_GET["fn"]))
				{
				$id = mysqli_real_escape_string($connection, $_GET["fn"]);
				$query  = "SELECT answer ";
				$query .= "from collage_ans ";
				$query .= "WHERE folder_name = {$id} ";
				$query .= "LIMIT 1";
				$result = mysqli_query($connection, $query);
				if(mysqli_affected_rows($connection) == 1)
				$row = mysqli_fetch_array($result);
				if((htmlspecialchars($_POST["input1"] == $row["answer"][0]))&& htmlspecialchars(($_POST["input2"] == $row["answer"][1]))
					&& htmlspecialchars(($_POST["input3"] == $row["answer"][2]))){
					mysqli_free_result($result);
					$count = 1;
			?>
			<center>
				<strong>
					<div id="alert1" class="alert alert-success col-xs-auto alert-trim">
						<span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;Awesome! Validation Success!!
						<?php
						$query = "INSERT INTO collage_report(id,response) values(NULL,\"Pass\")";
						$result = mysqli_query($connection, $query);
						?>
					</div>
				</strong>
			</center>
			<?php }else{ ?>
			<center>
				<strong>
					<div id="alert1" class="alert alert-danger col-xs-auto alert-trim">
						<span class="glyphicon glyphicon-remove"></span>&nbsp;Uh oh! Wrong input. Try again!
						<?php
						$query = "INSERT INTO collage_report(id,response) values(NULL,\"Fail\")";
						$result = mysqli_query($connection, $query);
					?>
					</div>
				</strong>
			</center>
			<?php } }  ?>
			
			<form method="post" action="collage_captcha_evaluate.php?fn=<?php {echo $folder_name;}  ?>">
				<div id="fullborder">
					<div id="imglist" class="pointer">
						<center>
							<span class="grid-item">
								<img id="img1" class="img-check" src="../collage_captcha/images/<?php echo $folder_name; ?>/1.png" height="305" width="305">
							</span>&nbsp;
							<span class="grid-item">
								<img id="img2" class="img-check" src="../collage_captcha/images/<?php echo $folder_name; ?>/2.png" height="305" width="305">
							</span>&nbsp;
							<span class="grid-item">
								<img id="img3" class="img-check" src="../collage_captcha/images/<?php echo $folder_name; ?>/3.png" height="305" width="305">
							</span><br/>
						
							<div class="container-fluid">
								<div class="form-group row"><br/>
									<div class="col-xs-2 col-xs-push-3">
										<input class="form-control" maxlength="1" autofocus="autofocus" id="ex1" autocomplete="off" type="text" placeholder="Provide your input" name="input1" required>
									</div>
									<div class="col-xs-2 col-xs-push-3">
										<input class="form-control" maxlength="1" autofocus="autofocus" id="ex2" autocomplete="off" type="text" placeholder="Provide your input" name="input2" required>
									</div>
									<div class="col-xs-2 col-xs-push-3">
										<input class="form-control" maxlength="1" autofocus="autofocus" id="ex3" autocomplete="off" type="text" placeholder="Provide your input" name="input3" required>
									</div>
								</div>
							</div>
						</center>
					</div>
				</form>
				
			<?php
				
				$query  = "SELECT question ";
				$query .= "from collage_ans ";
				$query .= "WHERE folder_name = {$folder_name} ";
				$query .= "LIMIT 1";
				$result = mysqli_query($connection, $query);
				if(mysqli_affected_rows($connection) == 1)
				$row = mysqli_fetch_array($result);
			?>

		<center>
			<h2>
				<strong>
					<div id="alert2" class="label label-info col-sm-auto">
								<span class="glyphicon glyphicon-check"></span>&nbsp;
								<?php $pos = strpos($row["question"],"many"); 
								$pos1 = strpos($row["question"],"are");
								$pos2 = strpos($row["question"],"?");
								$before_many = substr($row["question"],0,$pos+4);
								$highlight_text = substr($row["question"],$pos+4,$pos1-9); 
								$after_are = substr($row["question"],$pos1,$pos2+1);
								?>
								<?php echo $before_many;?>
								<font color="red"> <?php echo $highlight_text; ?></font>
								<?php echo $after_are;?>
								
								
								
							</div>
				</strong>
			</h2>
			<div class="btn-group">
				<button class="btn btn-danger btn-md" type="submit">
					<span class="glyphicon glyphicon-upload"></span>&nbsp;Check
				</button>
				<a type="button" id="refresh" class="btn btn-danger btn-md" href="http://localhost/captcha/captcha_evaluate/collage_captcha_evaluate.php">
					<span class="glyphicon glyphicon-repeat"></span>&nbsp;Reload (in <span id="box"></span>)
				</a>
			</div><br/><br/>
			<strong>
				<div class="alert alert-info col-xs-auto alert-trim">
					After <?php echo $_SESSION["counter"]; ?> attempt(s) you can view your report &nbsp;<span class="glyphicon glyphicon-time"></span>&nbsp; Hitting Reload or Timeout will fail the current set!
				</div>
			</strong>
		</center>
	</body>
	<?php mysqli_close($connection); ?>
