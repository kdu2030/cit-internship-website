<?php
	require 'db.php';
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Profile - CIT Internship Website</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="icon" type="image/png" href="c5.png" />
                <script src="script.js"></script>
	</head>
	

<body id="pg_background">
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
    
    <div class="header">
        <button id="edit"><a href="edit.php">Edit</a></button>
        <button id="logout"><a href="logout.php">Log Out</a></button>
    </div>
        
    <div class="name">
        <h2 id="name"><a href="change.php"><?= $_SESSION['username'] ?></a></h2>
        <img src="<?= $_SESSION['avatar'] ?>" width="300px" alt="profile"/>
        <br/><br/>
        <button id="open">Contact</button>
		<br/><br/>
    </div>
    
    <div class="person-paragraph">
        <h2>Experience</h2>
        <p><?= $_SESSION['experience'] ?></p>
    </div>
    
    <div class="person-paragraph">
        <h2>Skills and Interests</h2>
        <p><b>Technology Skills</b></p>
        <p><?= $_SESSION['skills'] ?></p>
        <p><b>Internship Interests</b></p>
        <p><?= $_SESSION['interests'] ?></p>
    </div>
    
    <div class="contact">
			<div class="contact-form">
				<span id="close"><b>&times;</b></span>
				<h2>Contact</h2>
				<form>
					<input type="text" name="name" placeholder="Name" required />
					<input type="text" name="organization" placeholder="Organization" required/>
					<input type="email" name="requestemail" placeholder="Email" required/>
					<textarea name="message" placeholder="message"></textarea>
					<br/><br/>
					<button type="submit">Submit</button>
				</form>
		  </div>
            </div>
    </div>
    
</body>

</html>
	