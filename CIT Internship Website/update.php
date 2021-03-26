<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$_SESSION['experience'] = $_POST['experience'];
	$_SESSION['skills'] = $_POST['skills'];
        $_SESSION['interests'] = $_POST['interests'];
	
        $email = $_SESSION['email'];
        $experience = $mysqli->escape_string($_POST['experience']);
	$skills = $mysqli->escape_string($_POST['skills']);
	$interests = $mysqli->escape_string($_POST['interests']);
        
        if(isset($_POST['active']) && $_POST['active'] = "yes"){
            $active = 0;
        }
        else{
            $active = 1;
        }
        
        /*SQL UPDATE Statement. (n.d.). Retrieved April 22, 2019, from https://www.w3schools.com/sql/sql_update.asp*/
        $sql = "UPDATE users "
                . "SET experience = '$experience', skills = '$skills', interests='$interests', active='$active'"
                    . "WHERE email='$email'";
        if($mysqli->query($sql)){
            header('location: person.php');
        }
        else{
            echo mysqli_error($mysqli);
        }
       
    }
?>
