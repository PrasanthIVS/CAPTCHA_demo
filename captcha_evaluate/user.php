<?php session_start(); ?>
<head>
<!--<meta http-equiv="refresh" content="5">-->
	<script src="../text_captcha/js/jquery-3.3.1.js"></script>
	<title>User Registration</title>
		<link rel="stylesheet" href="..\text_captcha\bootstrap\css\bootstrap.min.css" type="text/css"/>
		<link href="../text_captcha/css/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
	<div class="container">
		<div id="header">
			  <h2><b>User Registration</b></h2>
			</div>
		</br></br>
		<script type="text/javascript">
			
		
			</script>
			
			</br></br>
		<body class="container">
			<form method="post" action="http://localhost/captcha/captcha_evaluate/text_captcha_evaluate.php">
				<center>
					<div class="col-xs-4 col-xs-offset-4">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" autofocus="autofocus" maxlength="15" class="form-control input-lg" name="username" required autocomplete="off" placeholder="Enter your name to begin">
						</div>
					</div></br></br></br>
					<button type="submit" id="check" class="btn btn-success btn-lg">
					<span class="glyphicon glyphicon-play-circle"></span>&nbsp; Start</button>
					<a type="button" class="btn btn-success btn-lg" href="http://localhost/captcha/text_captcha/index.php">
					<span class="glyphicon glyphicon-home"></span>&nbsp; Home</a></b></h1></br></br>
					<strong>
						<div class="alert alert-info col-xs-auto alert-trim">
							
						<span class="glyphicon glyphicon-asterisk"></span>&nbsp;	You have 10 sets of text, visual and collage CAPTCHA's to evaluate</br>
						You can view your report at the end!
						</div>
					</strong>
				</center>
			</form>
		</body>
	</div>
	