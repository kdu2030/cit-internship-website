<?php
    require ("\wamp64\www\CIT Internship\CIT Internship Website\PHPMailer\PHPMailer\src\PHPMailer.php");
    require ("\wamp64\www\CIT Internship\CIT Internship Website\PHPMailer\PHPMailer\src\SMTP.php");
    require ("\wamp64\www\CIT Internship\CIT Internship Website\PHPMailer\PHPMailer\src\Exception.php");

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $id = $_GET['id'];
        
        $sql = "SELECT username, email, avatar, experience, skills, interests FROM users WHERE id = '$id'";
        $result = $mysqli->query($sql);
        $person = $result->fetch_assoc();
    }
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $organization = $mysqli->escape_string($_POST['organization']);
        $name = $mysqli->escape_string($_POST['name']);
        $email = $mysqli->escape_string($_POST['email']);
        $message = $mysqli->escape_string($_POST['message']);
        $toname = $mysqli->escape_string($_POST['toname']);
        $toemail = $mysqli->escape_string($_POST['toemail']);
        
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = "465";
        $mail->Username = "drcitinternship@gmail.com"; //Username for CIT Internship Email
        $mail->Password = "Internship2019"; //Password for CIT Internship Email
                        
        //mail data
        $mail->AddAddress($toemail, $toname);
        $mail->SetFrom('drcitinternship@gmail.com', 'CIT Internship');
        $mail->Subject = $organization." Has Requested Your Resume";
        $mail->Body = $name." from ".$organization." has requested your resume. \n Send your resume to ".$email
                        ." \n Message:  \n"
                        .$message;
                        
        try{
            $mail->send();
        } catch (Exception     $ex) {
            echo "There was an issue sending your email.";
        }
        
        header('location: students.php');
        
    }

?>