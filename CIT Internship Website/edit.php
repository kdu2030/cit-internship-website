<?php
    require 'db.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Edit - CIT Internship Website</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="icon" type="image/png" href="c5.png" />
	</head>
	
	<?php
		require 'update.php';
	?>

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
    
        <!--HTML <input type="checkbox" />. (n.d.). Retrieved April 20, 2019, from https://www.w3schools.com/tags/att_input_type_checkbox.asp-->
	
	<div class="edit">
            <h2>Edit</h2>
            <form action="edit.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <p><b>Experience</b></p>
                <textarea name="experience" placeholder="Experience" required><?= $_SESSION['experience'] ?></textarea>
                <p><b>Skills</b></p>
                <textarea name="skills" placeholder="Skills" required><?= $_SESSION['skills'] ?></textarea>
                <p><b>Interests</b></p>
                <textarea name="interests" placeholder="Interests" required><?= $_SESSION['interests'] ?></textarea>
                <p>Do you have an internship?</p>
                <input type="checkbox" name="active" value="yes"><p id="checkbox"> Yes</p>
                <br/><br/>
                <button type="submit">Submit</button>
            </form>
		
        </div>
    </body>
</html>

