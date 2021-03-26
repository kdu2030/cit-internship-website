<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$_SESSION['username'] = $_POST['username'];
        
	
        $username = $mysqli->escape_string($_POST['username']);
        $avatar = $mysqli->escape_string('image/'.$username.'.jpg');
        $email = $_SESSION['email'];
        
        $sql = "UPDATE users "
                . "SET username = '$username', avatar = '$avatar'"
                    . "WHERE email='$email'";
        copy($_FILES['avatar']['tmp_name'], $avatar);
        $_SESSION['avatar'] = $avatar;
        if($mysqli->query($sql)){
            header('location: person.php');
        }
       
    }
?>
