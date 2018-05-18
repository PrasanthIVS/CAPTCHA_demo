<?php require_once("../db_connection.php"); ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<div id="header">
		<h2>
			<b>
				<span class="glyphicon glyphicon-th-large"></span>&nbsp;Object Collage Captcha 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a type="button" class="btn btn-success btn-lg fixed-top" href="http://localhost/captcha/captcha_evaluate/user.php">
				<span class="glyphicon glyphicon-list-alt"></span>&nbsp; Evaluate Captcha</a>
			</b>
		</h2>
	</div>
	<title>Object Collage Captcha Demo</title>
	<head>
		<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" type="text/css"/>
		<script src="js/jquery-3.3.1.js"></script>
		<link rel="stylesheet" href="styles.css" type="text/css"/>
	</head>

	<script type="text/javascript">
		$(document).ready(function(){	//running the timer for 60 seconds
			var number = 60;
			var url = 'index.php';
					
			function countdown(){
				setTimeout(countdown, 1000);
				$('#box').html(number + " s");
				number--;
				
				if(number < 0){
					window.location = "http://localhost/captcha/collage_captcha/index.php";
					number = 0;
				}
			}
			countdown();
		});
	</script>

	<?php $cap_img = array();
		for($i=1; $i<20; $i++){
			array_push($cap_img,"$i");
		}
		shuffle($cap_img); 
		$folder_name = $cap_img[0]; //generate a random number between 1 and 20 ?>
	
	<body><br/>
		<img id="secondimg" class="center" src="../text_captcha/backgrounds\hero2.jpg" height="110" width="475"/>
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
				//echo $row["answer"];
				
				if((htmlspecialchars($_POST["input1"] == $row["answer"][0]))&& htmlspecialchars(($_POST["input2"] == $row["answer"][1]))
					&& htmlspecialchars(($_POST["input3"] == $row["answer"][2]))){
					mysqli_free_result($result);
					$count = 1;
			?>
			<center>
				<strong>
					<div id="alert1" class="alert alert-success col-xs-auto alert-trim">
						<span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;Awesome! Validation Success!!
					</div>
				</strong>
			</center>
			<?php }else{ ?>
			<center>
				<strong>
					<div id="alert1" class="alert alert-danger col-xs-auto alert-trim">
						<span class="glyphicon glyphicon-remove"></span>&nbsp;Uh oh! Wrong input. Try again or hit Reload!
					</div>
				</strong>
			</center>
			<?php } }  ?>
			
			<form method="post" action="index.php?fn=<?php {echo $folder_name;}  ?>">
				<div id="fullborder">
					<div id="imglist" class="pointer">
						<center>
							<span class="grid-item">
								<img id="img1" class="img-check" src="images/<?php echo $folder_name; ?>/1.png" height="305" width="305">
							</span>&nbsp;
							<span class="grid-item">
								<img id="img2" class="img-check" src="images/<?php echo $folder_name; ?>/2.png" height="305" width="305">
							</span>&nbsp;
							<span class="grid-item">
								<img id="img3" class="img-check" src="images/<?php echo $folder_name; ?>/3.png" height="305" width="305">
							</span><br/>
						</center>
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
					<a type="button" class="btn btn-danger btn-md" href="http://localhost/captcha/text_captcha/index.php">
						<span class="glyphicon glyphicon-triangle-left"></span>&nbsp;Text Captcha
					</a>
					<button  class="btn btn-danger btn-md" type="submit">
						<span class="glyphicon glyphicon-upload"></span>&nbsp;Check
					</button>
					<a type="button" class="btn btn-danger btn-md" href="http://localhost/captcha/collage_captcha/index.php">
						<span class="glyphicon glyphicon-repeat"></span>&nbsp;Reload (in <span id="box"></span>)
					</a>
					<a type="button" class="btn btn-danger btn-md" href="http://localhost/captcha/visual_captcha/index.php">
						<span class="glyphicon glyphicon-eye-open"></span>&nbsp; Visual Captcha <span class="glyphicon glyphicon-triangle-right"></span>
					</a>
				</div>
			</div>
		</center>
	</body>
	<?php mysqli_close($connection); ?>