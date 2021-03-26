<?php
	session_start();
	$_SESSION['message'] = '';
	/*Change this to Henrico County Server*/
	$mysqli = new MySQLi('sql304.epizy.com', 'epiz_23634671', 'd2RLRH5bZQ5d', 'epiz_23634671_students');
	//Figure this out later
	/*$ftp_server = 'ftpupload.net';
	$ftp_conn = ftp_connect($ftp_server);
	$login = ftp_login($ftp_conn, 'epiz_23634671', 'd2RLRH5bZQ5d');
	mysqli_error($mysqli);*/
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//two passwords are equal
		if ($_POST['password'] == $_POST['confirmpassword']){
			$username = $mysqli->real_escape_string($_POST['username']);
			$email = $mysqli->real_escape_string($_POST['email']);
			$password = md5($_POST['password']);
			$avatar_path = $mysqli->real_escape_string($_FILES['avatar']['name']);
			//original path name - 'image/'
		
		//make sure file type is image
			if (preg_match("!image!", $_FILES['avatar']['type'])){
				//copy image to image folder
				//original if statement: copy(['avatar']['tmp_name'], $avatar_path
				if (true/*ftp_put($ftp_conn, $avatar_path, '/home/vol9_6/epizy.com/epiz_23634671/htdocs/', FTP_ASCII)*/){
					$_SESSION['username'] = $username;
					$_SESSION['avatar'] = $avatar_path;

					$sql = "INSERT INTO users(username, email, password, avatar)"
							. "VALUES ('$username','$email','$password','$avatar_path')";

					//if query is succcessful, redirect to welcome.php page
					if ($mysqli->query($sql) == true){
						$_SESSION['message'] = "Registration successful!";
						header("location: welcome.php");
					}
					else{
						$SESSION['message'] = "User could not be added.";
					}
				}
				else{
					$SESSION['message'] = "File upload failed. Try another file.";
				}
			}
			else{
				$SESSION['message'] = "Please only upload GIF, JPG, or PNG images.";
			}
		}
		else{
			$SESSION['message'] = "The two passwords did not match.";
		}
	}

?>

<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="form.php" method="POST" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <input type="text" placeholder="User Name" name="username" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*" required /></div>
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>