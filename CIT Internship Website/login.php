
<?php
        /*Techie, C. (2017, February 02). Retrieved April 22, 2019, from https://www.youtube.com/watch?v=Pz5CbLqdGwM*/
	require 'db.php';
	session_start();
        $_SESSION['message'] = "";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Login - CIT Internship Website</title>
		<link rel="stylesheet" type="text/css" href="forms.css" />
		<link rel="icon" type="image/png" href="c5.png" />
	</head>
	
	<?php
		require 'signin.php';
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
            <h1>Log In</h1>
            <p><?= $_SESSION['message'] ?>
            <form action="login.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <input type="text" placeholder="Email" name="email" required/>
                <input type="password" placeholder="Password" name="password" required/>
                <br>
                <button type="submit" class="register-button">Log in</button>
                <br/><br/>
            </form>
	</div>
    
</body>
</html>

    