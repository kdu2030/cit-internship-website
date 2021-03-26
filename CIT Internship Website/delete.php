<?php
    //require 'db.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        if($username == "all"){
            $user = $_SESSION['username'];
            $email = $_SESSION['email'];
            $password = $_SESSION['password'];
            $hash = $_SESSION['hash'];
            $avatar = $_SESSION['avatar'];
            $active = $_SESSION['active'];
            
            /*
             * SQL DELETE Statement. (n.d.). Retrieved April 20, 2019, from https://www.w3schools.com/sql/sql_delete.asp
             */
            
            $sql = "DELETE FROM users";
            $result = $mysqli->query($sql);
            $sql = "INSERT INTO users (username, email, password, hash, avatar, experience, skills, interests, active) "
				. "VALUES ('$user', '$email', '$password', '$hash', '$avatar_path', 'none', 'none', 'none', '$active')";
            $result = $mysqli->query($sql);
            echo var_export($result);
            $_SESSION['message'] = 'User deleted successfully!';
            header("location: admin.php");
        }
        else if($username != 'admin'){
            $result = $mysqli->query("DELETE FROM users WHERE username = '$username'");
            $_SESSION['message'] = 'User deleted successfully!';
            header("location: admin.php");
        }
        else if($username == 'admin'){
            $_SESSION['message'] = 'DO NOT delete the admin account!';
            header("location: admin.php");
        }
        else{
            $_SESSION['message'] = 'User not deleted. Please try again.';
        }
    }

?>
