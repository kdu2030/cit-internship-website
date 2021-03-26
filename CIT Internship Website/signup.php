<?php
        /*Techie, C. (2017, February 02). Retrieved April 22, 2019, from https://www.youtube.com/watch?v=Pz5CbLqdGwM*/
	require 'db.php';
	session_start();
?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Register - CIT Internship Website</title>
		<link rel="stylesheet" type="text/css" href="forms.css" />
		<link rel="icon" type="image/png" href="c5.png" />
	</head>
	
	<?php
		require 'register.php';
	?>

<body>
	
	<nav>
		<img src="c5.png" width = "50" alt="cit logo" id="citlogo"/>
		<h1 id="pgname">CIT Internship Website</h1>
		<ul>
			<li><a href="signup.php">Sign Up</a></li>
			<li><a href="login.php">Log In</a></li>
			<li><a href="companies.html">Company Sign Up</a></li>
			<li><a href="students.php">Students</a></li>
			<li><a href="info.html">Course Information</a></li>
			<li><a href="about.html">About</a></li>
			<li><a href="index.html">Home</a></li>
		</ul>
	</nav>
	
	<div class="register">
			<h1>Register an Account</h1>
			<p><?php if(isset($_SESSION_message)){
                                echo $_SESSION['message'];
                              } ?>
                        </p>
	  <form action="signup.php" method="post" enctype="multipart/form-data" autocomplete="off">
				<input type="text" placeholder="User name" name="username" required/>
				<input type="text" placeholder="Email" name="email" required/>
				<input type="password" placeholder="Password" name="password" required/>
				<input type="password" placeholder="Confirm Password" name="confirmpassword" required/>
		  		<br>
				<p id="select">Select your avatar  </p><input type="file" name="avatar" accept="image/*" required/>
		  		<br/><br/>
		  		<button type="submit" class="register-button">Register</button>
		  		<br/><br/>
			</form>
		</div>
    </body>
</html>