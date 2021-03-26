<?php
    session_start();
    require 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Students - CIT Internship Website</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="icon" type="image/png" href="c5.png" />
                <script src="search.js"></script>
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
    
        <div class="users">
            <div class="user-info">
                <h1>Avaliable CIT Students</h1>
                <input type="text" id="search" onkeyup="search()" placeholder="Search for CIT Interns By Internship Interests">
                <!--Techie, C. (2016, November 11). Retrieved April 22, 2019, from https://www.youtube.com/watch?v=FgSysHTsb6A-->
                <div id="userslist">
                    <?php
                        $sql = 'SELECT id, username, avatar, interests, active FROM users';
                        $result = $mysqli->query($sql);
                        while($row = $result->fetch_assoc()){
                            if($row['active'] != 0){
                                echo "<div class='card'>";
                                echo "<img src='$row[avatar]' width='300px' alt='avatar' />";
                                echo "<h2>".$row['username']."</h2>";
                                echo "<p>".$row['interests']."</p>";
                                echo "<button><a href=profile.php?id=".$row['id'].">View</a></button>";
                                echo "<br/><br/>";
                                echo "</div>";
                            }
                        }
                    ?>
                </div>
                <br/><br/>
            </div>
        </div>
</body>
</html>



    
    
        


