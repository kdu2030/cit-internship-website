<?php
    require 'db.php';
    session_start();
    
    if(!isset($_SESSION['username'])){
        header('location: login.php');
    }
    
    if($_SESSION['email'] != "drcitinternship@gmail.com"){
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	<title>Admin - CIT Internship Website</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="icon" type="image/png" href="c5.png" />
    </head>
    
    <?php
        require 'delete.php';
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
        
    <div class="header">
        <button id="logout"><a href="logout.php">Log Out</a></button>
    </div>

        <div class="admin">
            <h1>CIT Internship Website Admin</h1>
            <p><?=$_SESSION['message']?></p>
            <form action="admin.php" method="post"> <!--Text box for deleting a user-->
                <input type="text" name="username" placeholder="username" />
                <button type="submit">Delete</button>
                <br/><br/>
            </form>
            <form action="admin.php" method="post"> <!-- Button for deleting all users except admin account -->
                <input type="hidden" name="username" value="all" />
                <button type="submit">Delete All</button>
                <br/><br/>
            </form>
            <h2>User Table</h2>
            <table>
                <tr><th>ID</th><th>Username</th><th>Email</th><th>Active</th></tr>
   
                <?php
                    $sql = "SELECT id, username, email, active FROM users";
                    $result = $mysqli->query($sql);
                    while($row = $result->fetch_assoc()){
                        echo "<tr><td>".$row['id']."</td><td>".$row['username']."</td><td>".$row['email']."</td><td>".$row['active']."</td></tr>";
                    }
                ?>
            </table>
            <br/><br/>
        </div>

    </body>

</html>