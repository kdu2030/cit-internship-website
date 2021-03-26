<?php
    /*Avs099avs099 7. (2018, March 5). /*Fatal error: Class 'PHPMailer' not found. Retrieved April 22, 2019, 
     * from https://stackoverflow.com/questions/28906487/fatal-error-class-phpmailer-not-found
     */

     require ("\wamp64\www\CIT Internship\CIT Internship Website\PHPMailer\PHPMailer\src\PHPMailer.php");
     require ("\wamp64\www\CIT Internship\CIT Internship Website\PHPMailer\PHPMailer\src\SMTP.php");
     require ("\wamp64\www\CIT Internship\CIT Internship Website\PHPMailer\PHPMailer\src\Exception.php");

    //Setting session variables
     
    /*Techie, C. (2016, November 11). Retrieved April 22, 2019, from https://www.youtube.com/watch?v=FgSysHTsb6A*/
         
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['username'] = $_POST['username'];
	
        $username = $mysqli->escape_string($_POST['username']);
	$email = $mysqli->escape_string($_POST['email']);
	$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
	$hash = $mysqli->escape_string(md5(rand(0,1000)));
	$avatar_path = $mysqli->escape_string('image/'.$username.'.jpg');

	//Does the user email exist?
	$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());
	
	if($result->num_rows > 0){
		$_SESSION['message'] = 'User with this email already exists!';
	}
	else{
		//insert data into database
		$sql = "INSERT INTO users (username, email, password, hash, avatar, experience, skills, interests) "
				. "VALUES ('$username', '$email', '$password', '$hash', '$avatar_path', 'none', 'none', 'none')";
		$_SESSION['avatar'] = $avatar_path;
		copy($_FILES['avatar']['tmp_name'], $avatar_path);
		
		
		if($mysqli->query($sql)){
                    
                         //send email using PHPMailer and Google STMP
                    
                         /*Mārtiņš BriedisMārtiņš Briedis 13.6k44059. (2014, January 3). How to send email from PHP without SMTP server installed? 
                          * Retrieved April 22, 2019, from https://stackoverflow.com/questions/4963688/how-to-send-email-from-php-without-smtp-server-installed
                          */
                        
                        $mysqli->commit();
                        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                        $mail->IsSMTP();
                        $mail->SMTPAuth = true;
                        $mail->SMTPSecure = "ssl";
                        $mail->Host = "smtp.gmail.com";
                        $mail->Port = "465";
                        $mail->Username = "drcitinternship@gmail.com"; //Username for CIT Internship Email
                        $mail->Password = "Internship2019"; //Password for CIT Internship Email
                        
                        //mail data
                        $mail->AddAddress($email, $username);
                        $mail->SetFrom('drcitinternship@gmail.com', 'CIT Internship');
                        $mail->Subject = "CIT Internship Signup Successful!";
                        $mail->Body = 'Hello '.$username.' Thank you for signing up!';
                        
                        try{
                            $mail->send();
                        } catch (Exception     $ex) {
                            $_SESSION['message'] = 'There was a problem sending your email';
                        }
                        
                        $_SESSION['message'] = 'Registration successful!';
                        $_SESSION['message'] = "";
			header('location: login.php');
                        
		}
		else{
			$_SESSION['message'] = 'Registration failed. Contact Mrs. Norris or your CIT Webmaster.';
		}
		
	}
    }
	

?>