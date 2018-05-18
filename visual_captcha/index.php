<?php require_once("../db_connection.php"); ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<div id="header">
		 <h2 style="font-size:1.6vw">
			<b>
				<span class="glyphicon glyphicon-eye-open"></span>&nbsp;Visual Captcha 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a type="button" class="btn btn-success btn-lg fixed-top" href="http://localhost/captcha/captcha_evaluate/user.php">
				<span class="glyphicon glyphicon-list-alt"></span>&nbsp; Evaluate Captcha</a>
			</b>
		</h2>
	</div>
	<title>Visual Captcha Demo</title>
		<head>
			<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" type="text/css"/>
			<script src="js/jquery-3.3.1.js"></script>
			<link rel="stylesheet" href="styles.css" type="text/css"/>
		</head>
	<?php 
		
		$cap_img = array();
		for($i=1; $i<16; $i++){
			array_push($cap_img,"$i");
		}
		shuffle($cap_img); 
		$folder_name = $cap_img[0]; //generate a random number between 1 and 15
		$my_array = array("1","2","3","4","5","6","7","8","9");
		shuffle($my_array);// shuffle the array elements 1-9
	?>

	<body><br/>
		<img id="secondimg" class="center" src="../text_captcha/backgrounds\hero2.jpg" height="100" width="475"/>
		<img id="robotimg" class="center" src="../text_captcha/backgrounds\Capture.jpg" height="200" width="500"/>
		</br>
		<center>
			<span id="resultmsg"></span>
		</center>
		<form method="POST" action="index.php">
			<div id="fullborder">
				<div id="imglist" class="pointer grid-container">
					<div class="grid-item">	<label class="cursor"><img id="img1" class="img-check" src="images/<?php echo $folder_name; ?>/<?php echo $my_array[0]; ?>.jpg" height="125" width="125"></div>
					<div class="grid-item">	<label class="cursor"><img id="img2" class="img-check" src="images/<?php echo $folder_name; ?>/<?php echo $my_array[1]; ?>.jpg" height="125" width="125"></div>
					<div class="grid-item">	<label class="cursor"><img id="img3" class="img-check" src="images/<?php echo $folder_name; ?>/<?php echo $my_array[2]; ?>.jpg" height="125" width="125"></div>
					<div class="grid-item">	<label class="cursor"><img id="img4" class="img-check" src="images/<?php echo $folder_name; ?>/<?php echo $my_array[3]; ?>.jpg" height="125" width="125"></div>
					<div class="grid-item">	<label class="cursor"><img id="img5" class="img-check" src="images/<?php echo $folder_name; ?>/<?php echo $my_array[4]; ?>.jpg" height="125" width="125"></div>
					<div class="grid-item">	<label class="cursor"><img id="img6" class="img-check" src="images/<?php echo $folder_name; ?>/<?php echo $my_array[5]; ?>.jpg" height="125" width="125"></div>
					<div class="grid-item">	<label class="cursor"><img id="img7" class="img-check" src="images/<?php echo $folder_name; ?>/<?php echo $my_array[6]; ?>.jpg" height="125" width="125"></div>
					<div class="grid-item">	<label class="cursor"><img id="img8" class="img-check" src="images/<?php echo $folder_name; ?>/<?php echo $my_array[7]; ?>.jpg" height="125" width="125"></div>
					<div class="grid-item">	<label class="cursor"><img id="img9" class="img-check" src="images/<?php echo $folder_name; ?>/<?php echo $my_array[8]; ?>.jpg" height="125" width="125"></div>
				</div>
				
				<?php
					$query  = "SELECT question ";
					$query .= "from visual_ans ";
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
								<?php $pos = strpos($row["question"],"with"); 
								$before_with = substr($row["question"],0,$pos+4);?>
								
								<?php $highlight_text = substr($row["question"],$pos+4); ?>
								<?php echo $before_with;?>
								<font color="red"> <?php echo $highlight_text; ?></font>
								
								
								
							</div>
						</strong>
						</h2>
					<br/>
					<div class="btn-group">
						<a type="button" class="btn btn-danger btn-md" href="http://localhost/captcha/text_captcha/index.php">
							<span class="glyphicon glyphicon-triangle-left"></span>&nbsp;Text Captcha
						</a>
						<a type="button" class="btn btn-danger btn-md" id="check">
							<span class="glyphicon glyphicon-upload"></span>&nbsp;Check
						</a>
						<a type="button" class="btn btn-danger btn-md" href="http://localhost/captcha/visual_captcha/index.php">
							<span class="glyphicon glyphicon-repeat">
							</span>&nbsp;Reload (in <span id="box"></span>)
						</a>
						<a type="button" class="btn btn-danger btn-md" href="http://localhost/captcha/collage_captcha/index.php">
							<span class="glyphicon glyphicon-picture"></span>&nbsp; Object Collage Captcha 
							<span class="glyphicon glyphicon-triangle-right"></span>
						</a>
					</div>
				</center>
			</div>
		</form>
	</body>

		<script type="text/javascript">
			$(window).on("load",function(e){
				<?php
				
				$query  = "SELECT answer ";
				$query .= "from visual_ans ";
				$query .= "WHERE folder_name = {$folder_name} ";
				$query .= "LIMIT 1";
				$result = mysqli_query($connection, $query);
				if(mysqli_affected_rows($connection) == 1)
				$row = mysqli_fetch_array($result);
			
				?>
			
			var number = 60;
			var url = 'index.php';
					
			function countdown(){
				setTimeout(countdown, 1000);
				$('#box').html(number + " s");
				number--;
				
				if(number < 0){
					window.location = "http://localhost/captcha/visual_captcha/index.php";
					number = 0;
				}
			}
			countdown();
		
			var array = new Array();// declaring an array
			var ans;var res;
				$(".img-check").click(function(){ // for red border on clicked image
					$(this).toggleClass("check");
				
				}); // end of 1st click function
			
			
				$('.img-check').click(function()
					{
						var test = $(this).attr('src').split('\/').slice(-1).join().split(".").shift(); // removing extension from filename
						var imagename = test[test.length-1];
						if(array.includes(imagename) == true){
							var index = array.indexOf(imagename);
							array.splice(index,1);
							 ans = array.toString();
							 res = ans.replace(/,/g, "");
						}else{
						   array.push(imagename);
						   ans = array.toString();
							res = ans.replace(/,/g, "");
						 }
					}); // end of 2nd click function
		
				
				$('#check').click(function(){ // outputting the result
				if((res === undefined) || (res.length == 0)){
					$('#resultmsg').html("<strong><span id=\"alert1\" class=\"alert alert-danger col-xs-auto alert-trim \"><span class=\"glyphicon glyphicon-info-sign\"></span>&nbsp;<strong>You should select atleast one image!</span></strong>"); 
				}
				else if(((res.length == 2) || (res.length == 3)) && (res.includes(<?php echo $row["answer"][0]; ?>) == true) && (res.includes(<?php echo $row["answer"][1]; ?>) == true) && ((res.includes(<?php echo $row["answer"][2]; ?>) == true) || ((res.length == 2) && (<?php echo $row["answer"][2]; ?> == 0)))) {
					$("#resultmsg").html("<span id=\"alert1\" class=\"alert alert-success col-xs-auto alert-trim\"><span class=\"glyphicon glyphicon-thumbs-up\"></span><strong>&nbsp;Awesome! Wanna try again? Hit Reload!</strong></div>");
				}
				else{
					$("#resultmsg").html("<strong><span id=\"alert1\" class=\"alert alert-danger col-xs-auto alert-trim \"><span class=\"glyphicon glyphicon-remove\"></span>&nbsp;<strong>Uh oh! You clicked on wrong image set. Hit Reload to try again!</span></strong>"); 
				}
				}); //end of 3rd click function
			
			});// end of document.ready function

		</script>
		<?php mysqli_close($connection); ?>

