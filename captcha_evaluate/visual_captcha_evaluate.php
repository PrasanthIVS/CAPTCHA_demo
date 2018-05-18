<?php session_start(); ?>
<?php include("../db_connection.php"); ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Visual Captcha Evaluation</title>
		<head>
			<link rel="stylesheet" href="..\visual_captcha\bootstrap\css\bootstrap.min.css" type="text/css"/>
			<script src="../visual_captcha/js/jquery-3.3.1.js"></script>
			<link rel="stylesheet" href="../visual_captcha/styles.css" type="text/css"/>
		</head>
	<div id="header">
		<h2>
			<b>
				<span class="glyphicon glyphicon-eye-open"></span>&nbsp;Visual Captcha Evaluation 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				 <span class="label label-success" id="l1">
				Welcome <?php
									$query = "select last_id from name_user where id=1";
						$result = mysqli_query($connection, $query);
						$response = mysqli_fetch_array($result);
						
						$query = "select name from name_user where id=$response[0]";
									$result = mysqli_query($connection, $query);
									$response = mysqli_fetch_array($result);
									echo ucfirst($response[0]);
								?> !
				</span>
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
				
	function randomnum($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
		}

		$cap_img = randomnum(1,15,10);
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
				
		$my_array = array("1","2","3","4","5","6","7","8","9");
		shuffle($my_array);// shuffle the array elements 1-9
	
		if(!isset($_SESSION['counter'])) {
					$_SESSION['counter'] = 9;
					
					}else if($_SESSION["counter"] <= 0){
						
							session_unset(); 
							session_destroy();
							//$_SESSION['counter'] = 10;
							header('Location: http://localhost/captcha/captcha_evaluate/collage_captcha_evaluate.php');
					}else{
						--$_SESSION["counter"];} ?>
	<body>
		<img id="robotimg" class="center" src="../text_captcha/backgrounds\Capture.jpg" height="200" width="500"/></br>
		<center>
			<span id="resultmsg"></span>
		</center>
		<form method="POST" action="visual_captcha_evaluate.php" id="myform">
			<div id="fullborder">
				<div id="imglist" class="pointer grid-container">
				
					<div class="grid-item">	<label class="cursor"><img id="img1" class="img-check" src="../visual_captcha/images/<?php echo $folder_name; ?>/<?php echo $my_array[0]; ?>.jpg" height="125" width="125"></div>
					<div class="grid-item">	<label class="cursor"><img id="img2" class="img-check" src="../visual_captcha/images/<?php echo $folder_name; ?>/<?php echo $my_array[1]; ?>.jpg" height="125" width="125"></div>
					<div class="grid-item">	<label class="cursor"><img id="img3" class="img-check" src="../visual_captcha/images/<?php echo $folder_name; ?>/<?php echo $my_array[2]; ?>.jpg" height="125" width="125"></div>
					<div class="grid-item">	<label class="cursor"><img id="img4" class="img-check" src="../visual_captcha/images/<?php echo $folder_name; ?>/<?php echo $my_array[3]; ?>.jpg" height="125" width="125"></div>
					<div class="grid-item">	<label class="cursor"><img id="img5" class="img-check" src="../visual_captcha/images/<?php echo $folder_name; ?>/<?php echo $my_array[4]; ?>.jpg" height="125" width="125"></div>
					<div class="grid-item">	<label class="cursor"><img id="img6" class="img-check" src="../visual_captcha/images/<?php echo $folder_name; ?>/<?php echo $my_array[5]; ?>.jpg" height="125" width="125"></div>
					<div class="grid-item">	<label class="cursor"><img id="img7" class="img-check" src="../visual_captcha/images/<?php echo $folder_name; ?>/<?php echo $my_array[6]; ?>.jpg" height="125" width="125"></div>
					<div class="grid-item">	<label class="cursor"><img id="img8" class="img-check" src="../visual_captcha/images/<?php echo $folder_name; ?>/<?php echo $my_array[7]; ?>.jpg" height="125" width="125"></div>
					<div class="grid-item">	<label class="cursor"><img id="img9" class="img-check" src="../visual_captcha/images/<?php echo $folder_name; ?>/<?php echo $my_array[8]; ?>.jpg" height="125" width="125"></div>
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
					</h2><br/>
					<div class="btn-group">
						<a type="button" class="btn btn-danger btn-md" id="check">
							<span class="glyphicon glyphicon-upload"></span>&nbsp;Check
							
						</a>
						<a type="button" id="refresh" class="btn btn-danger btn-md" href="http://localhost/captcha/captcha_evaluate/visual_captcha_evaluate.php">
							<span class="glyphicon glyphicon-repeat">
							</span>&nbsp;Reload (in <span id="box"></span>)
						</a>
					</div><br/><br/>
					<strong>
						<div class="alert alert-info col-xs-auto alert-trim">
							After <?php echo $_SESSION["counter"]; ?> attempt(s) you will be directed to evaluate object collage captcha &nbsp;<span class="glyphicon glyphicon-time"></span>&nbsp; Hitting Reload or Timeout will fail the current set!
						</div>
					</strong>
				</center>
			</div>
		</form>
	</body>
	
	<script type="text/javascript">
		$(window).on("load",function(e){
			var flag = 1;
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
					while(flag < 3){
					$.post( 
                  "visual_insert.php",
                  { response: "Fail" },
					);
			   flag++;
					}
				number = 0;
				window.location = "http://localhost/captcha/captcha_evaluate/visual_captcha_evaluate.php";
				}
			}
			countdown();
			
			$('#refresh').click(function()
					{
						$.post( 
                  "visual_insert.php",
                  { response: "Fail" },
                  
               );
			   $.post( 
                  "visual_insert.php",
                  { response: "Fail" },
               );
			});
			var array = new Array();// declaring an array
			var ans;var res;
				$(".img-check").click(function(){ // for red border on clicked image
					$(this).toggleClass("check");
				
				}); // end of 1st click function
			
			
				$('.img-check').click(function()
					{
						var test = $(this).attr('src').split('\/').slice(-1).join().split(".").shift();
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
		
				
				$('#check').click(function(){ 
				if((res === undefined) || (res.length == 0)){
					$('#resultmsg').html("<strong><span id=\"alert1\" class=\"alert alert-danger col-xs-auto alert-trim \"><span class=\"glyphicon glyphicon-info-sign\"></span>&nbsp;<strong>You should select atleast one image!</span></strong>"); 
					}
				else if(((res.length == 2) || (res.length == 3)) && (res.includes(<?php echo $row["answer"][0]; ?>) == true) && (res.includes(<?php echo $row["answer"][1]; ?>) == true) && ((res.includes(<?php echo $row["answer"][2]; ?>) == true) || ((res.length == 2) && (<?php echo $row["answer"][2]; ?> == 0)))) {
					$.post( 
                  "visual_insert.php",
                  { response: "Pass" },
					);
			   $("#resultmsg").html("<span id=\"alert1\" class=\"alert alert-success col-xs-auto alert-trim\"><span class=\"glyphicon glyphicon-thumbs-up\"></span><strong>&nbsp;Awesome!</strong></div>");
					number = 0;
					flag = 2;
				}
				else{
					$.post( 
                  "visual_insert.php",
                  { response: "Fail" },
                  );
				$("#resultmsg").html("<strong><span id=\"alert1\" class=\"alert alert-danger col-xs-auto alert-trim \"><span class=\"glyphicon glyphicon-remove\"></span>&nbsp;<strong>Uh oh! You clicked on wrong image set. Try again!</span></strong>");
				number = 0;
				flag = 2;
				
				}
				}); //end of 3rd click function
			});// end of document.ready function
			
		</script>
		<?php mysqli_close($connection); ?>

		
	

