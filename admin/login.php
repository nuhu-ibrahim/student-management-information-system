<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>ABU Zaria</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Account Register Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="../assets/css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link href="//localhost/SIMS/assets/css/bootstrap.min.css" rel="stylesheet"><!-- Font-Awesome-Icons-CSS -->

<link rel="stylesheet" href="../assets/css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link href="//fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,devanagari,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

<!-- //css files -->
</head>

<body style="background: #3CB371;">
<!-- main -->
<div class="w3ls-header">
	<h1 style="color: white">ABU Admin Dashboard</h1>
	<div class="header-main">
		<h2>Login to Continue</h2>
		<?php 
            session_start();
            if(isset($_SESSION['error'])){
            	echo "<h4 class = 'alert alert-danger'>".$_SESSION['error']."</h4>";
            	unset($_SESSION['error']);
            }
		?>
			<div class="header-bottom">
				<div class="header-right w3agile">
					<div class="header-left-bottom agileinfo">
						<form action="loginHandler.php" method="post">
							<div class="icon1">
								<i class="fa fa-user" aria-hidden="true"></i>
								<input  type="text" placeholder="Username" name="username" required=""/>
							</div>
							<div class="icon1">
								<i class="fa fa-lock" aria-hidden="true"></i>
								<input type="password" placeholder="Password" name="password" required=""/>
							</div>
							
							<div class="bottom">
								<input type="submit" name="submit" value = "Submit" />
							</div>
							
					</form>	
					</div>
				</div>
			</div>
	</div>
</div>
<!--header end here-->
<!-- copyright start here -->
<div class="copyright">
	<p>© 2018 Ahmadu Bello University Zaria. All rights reserved</p>
</div>
<!--copyright end here-->
</body>
</html>