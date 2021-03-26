<?php
    require 'db.php';
    session_start();
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
		require 'info.php';
	?>

<body id="pg_background">
	
	<nav>
		<img src="c5.png" width = "50" alt="cit logo" id="citlogo"/>
		<h1 id="pgname">CIT Internship Website</h1>
		<ul>
			<li><a href="signup.php">Sign Up</a></li>
			<li><a href="login.php">Log In</a></li>
			<li><a href="companies.html">Companies</a></li>
			<li><a href="students.html">Students</a></li>
			<li><a href="info.html">Course Information</a></li>
			<li><a href="about.html">About</a></li>
			<li><a href="index.html">Home</a></li>
		</ul>
	</nav>
	
	<div class="edit">
            <h2>Edit</h2>
            <form action="change.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <p><b>Username</b></p>
                <input type="text" name="username" placeholder="Username" value="<?= $_SESSION['username'] ?>" required />
                <p><b>Avatar</b></p>
                <input type="file" name="avatar" required />
                <br/><br/>
                <button type="submit">Submit</button>
            </form>
		
        </div>
    </body>
</html>

