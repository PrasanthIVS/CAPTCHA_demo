<?php require_once("../db_connection.php"); ?>
<?php include("header.php"); ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<div id="header">
		 <h2 style="font-size:1.6vw">
			<b>
				<span class="glyphicon glyphicon-text-size"></span>&nbsp;Text Captcha &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Completely Automated Public Turing test to tell Computers and Humans Apart
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a type="button" class="btn btn-success btn-lg fixed-top" href="http://localhost/captcha/captcha_evaluate/user.php">
				<span class="glyphicon glyphicon-list-alt"></span>&nbsp; Evaluate Captcha</a>
			</b>
		</h2>
	</div><br/></br></br></br></br>
	<img id="secondimg" class="center" src="backgrounds\hero2.jpg" height="100" width="475"/>
	<img id="robotimg" class="center" src="backgrounds\Capture.jpg" height="200" width="500"/></br>

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
			if(mysqli_affected_rows($connection) == 1)
				$input = str_replace(' ', '', $_POST["input"]);
			if(htmlspecialchars($input) == $row["answer"]){
				mysqli_free_result($result);
		?>
		<center>
			<strong>
				<div class="alert alert-success col-xs-auto alert-trim">
					<span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;Awesome! Validation Success!!
				</div>
			</strong>
		</center>
		
		<?php }else{ ?>
		
		<center>
			<strong>
				<div class="alert alert-danger col-xs-auto alert-trim">
					<span class="glyphicon glyphicon-remove"></span>&nbsp;Uh oh! Something is wrong. Try again or hit refresh!
				</div>
			</strong>
		</center>
		
		<?php } }  ?></br></br>
		
		<script type="text/javascript">
		$(document).ready(function(){	//running the timer for 60 seconds
			var number = 60;
			var url = 'index.php';
					
			function countdown(){
				setTimeout(countdown, 1000);
				$('#box').html(number + " s");
				number--;
				
				if(number < 0){ 
					window.location = "http://localhost/captcha/text_captcha/index.php";
					number = 0;
				}
			}
			countdown();
		});
		</script>

		<?php 
			$cap_img = array();
			for($i=11; $i<63; $i++){
				array_push($cap_img,"$i");
			}
			shuffle($cap_img);
			$imagename = $cap_img[0];
		?>
	
		<img id="capimg" class="center" src="images\<?php echo $imagename; ?>.jpg" height="100" width="300">
		<!--<img id="gifimg" src="backgrounds/hero.gif" height="100" width="115"/>--></br>
		<form method="post" action="index.php?id=<?php {echo $imagename;}  ?>">
			<div class="col-xs-2 col-xs-offset-5">
				<input type="text" autofocus="autofocus" class="form-control" autocomplete="off" placeholder="Enter the characters shown above" name="input" required>
			</div>
			<br/><br/><br/></br></br></br>
			<center>
				<div class="btn-group">
					<a type="button" class="btn btn-danger btn-md" href="http://localhost/captcha/collage_captcha/index.php">
						<span class="glyphicon glyphicon-triangle-left"></span> 
							<span class="glyphicon glyphicon-picture"></span>&nbsp; Object Collage Captcha
					</a>&nbsp;
					
					<button class="btn btn-danger btn-md" type="submit">
						<span class="glyphicon glyphicon-upload"></span> Submit
					</button>&nbsp;
					
					<!--<button type="button" class="btn btn-primary" onClick="window.location.reload()"><span class="glyphicon glyphicon-refresh"></span> Refresh (in <span id="box"></span>)</button>-->
					<a type="button" class="btn btn-danger btn-md" href="http://localhost/captcha/text_captcha/index.php">
						<span class="glyphicon glyphicon-refresh"></span>&nbsp; Refresh (in <span id="box"></span>)
					</a>
					
					<a type="button" class="btn btn-danger btn-md" href="http://localhost/captcha/visual_captcha/index.php">
						<span class="glyphicon glyphicon-eye-open"></span>&nbsp; Visual Captcha 
						<span class="glyphicon glyphicon-triangle-right"></span>
					</a>
				</div>
			</center>
		</form>
	</body>
	<?php mysqli_close($connection); ?>
