<?php

/*Techie, C. (2017, February 02). Retrieved April 22, 2019, from https://www.youtube.com/watch?v=Pz5CbLqdGwM*/

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$email = $mysqli->escape_string($_POST['email']);
	$result = $mysqli->query("SELECT * FROM users WHERE email = '$email'") or die(mysqli_error($mysqli));
	if($result->num_rows === 0){
		$_SESSION['message'] = "User with that email does not exist!";
	}
	else{
		$user = $result->fetch_assoc();
                
                if($email == "drcitinternship@gmail.com" && password_verify($_POST['password'], $user['password'])){
                    header("location: admin.php");
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['password'] = $user['password'];
                    $_SESSION['avatar'] = $user['avatar'];
                    $_SESSION['active'] = $user['active'];
                    $_SESSION['hash'] = $user['hash'];
                    $_SESSION['message'] = "";
                }
		else if( password_verify($_POST['password'], $user['password']) ){
			
			$_SESSION['email'] = $user['email'];
			$_SESSION['username'] = $user['username'];
			$_SESSION['avatar'] = $user['avatar'];
			$_SESSION['active'] = $user['active']; 
			$_SESSION['ideal'] = $user['ideal'];
			$_SESSION['experience'] = $user['experience'];
			$_SESSION['skills'] = $user['skills'];
			$_SESSION['interests'] = $user['interests'];
			
			$_SESSION['logged_in'] = true;
                        $_SESSION['message'] = "";
			header("location: person.php");
		}
		else{
			$_SESSION['message'] = "You have entered in the wrong password, try again!";
		}
	}
}

?>