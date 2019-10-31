<?php
if (isset($_POST['signup-submit']))
{
	require 'dbh.inc.php';	
	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];
	if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat))
	{
		header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
		exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username))
	{
		header("Location: ../signup.php?error=invalidmailuid");
		exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		header("Location: ../signup.php?error=invalidmail&uid=".$username);
		exit();
	}
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $username))
	{
		header("Location: ../signup.php?error=invaliduid&mail=".$email);
		exit();
	}
	else if ($password !== $passwordRepeat)
	{
		header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
		exit();
	}
	else
	{
		try {	
			$sql1 = "SELECT COUNT(*) FROM `users` Where emailUsers=:mail";
			$query = $conn->prepare($sql1);
			$query->bindParam(":mail", $email);
			$query->execute();
			$count = $query->fetchColumn();
			if ($count > 0)
			{
				header("Location: ../signup.php?error=mailtaken=".$username);
				exit();
			}
			else{
				$sql = "INSERT `users` (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
				$hashed =  password_hash($password, PASSWORD_DEFAULT);
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(1, $username);
				$stmt->bindParam(2, $email);
				$stmt->bindParam(3, $hashed);
				$stmt->execute();
				header("Location: ../signup.php?signp=success");
				exit();	
			}
		}
		catch (PDOException $e)
		{
			die("Connection failed: " . $e->getMessage());
			header("Location: ../signup.php?error=sqlerror");
			exit();	
		}
	}
	$conn = null;
}
else
{
	header("Location: ../signup.php");
	exit();	
}
?>