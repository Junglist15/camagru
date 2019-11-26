<?php
if (isset($_POST['send_mail'])) {
	include '../config/database.php';
	$email = htmlspecialchars($_POST['email']);

	if (empty($email)) {
		header("Location: ../forgotten_password.php?error=emptyfields");
		exit();
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../forgotten_password.php?error=invalidmail");
		exit();
	} else {
		try {
			$sql = "SELECT * FROM `users` WHERE email = :mail";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":mail", $email);
			$stmt->execute();
			$count = $stmt->rowCount();
			if ($count > 0) {
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				$user_id = $result['user_id'];
				$username = $result['username'];

				$to = $email;
				$subject = "Reset password";
				$url = "http://localhost:8080/camagru/forgotten_password.php?code=" . base64_encode($user_id);
				$msg = "
		<p>Hi $username,</p>
		<p>Click the link below to change password<br /><br /></p>
		<p>$url</p>
		<p>From,<br /> Bear</p>
		";

				$headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: Bear <no-reply@superposable.com>' . "\r\n";

				if (mail($to, $subject, $msg, $headers)) {
					header("Location: ../index.php?success=pwdreset");
					exit();
				} else {
					header("Location: ../forgotten_password.php?error=mailerror");
					exit();
				}
			} else {
				header("Location: ../forgotten_password.php?error=noemail");
				exit();
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
} else if (isset($_POST['reset-submit'])) {
	include '../config/database.php';

	$code = $_POST['code'];
	$user_id = intval(base64_decode(($_POST['code'])));
	$pwd = htmlspecialchars($_POST['pwd']);
	$pwd_repeat = htmlspecialchars($_POST['pwd-repeat']);

	if (empty($pwd) || empty($pwd_repeat)) {
		header("Location: ../forgotten_password.php?error=emptyfields&code=" . $code);
		exit();
	} else if ((strlen($pwd) < 8)) {
		header("Location: ../forgotten_password.php?error=pwdshort&code=" . $code);
		exit();
	} else if (!preg_match('/[A-Z]/', $pwd)) {
		header("Location: ../forgotten_password.php?error=pwdnocap&code=" . $code);
		exit();
	} else if (!preg_match('/[a-z]/', $pwd)) {
		header("Location: ../forgotten_password.php?error=pwdnolow&code=" . $code);
		exit();
	} else if (!preg_match("/[!@#$%^&*()-=`~_+,.\/<>?:;\|]/", $pwd)) {
		header("Location: ../forgotten_password.php?error=pwdnospchar&code=" . $code);
		exit();
	} else if (!preg_match('/[0-9]/', $pwd)) {
		header("Location: ../forgotten_password.php?error=nodigit&code=" . $code);
		exit();
	} else if (strstr($pwd, ' ')) {
		header("Location: ../forgotten_password.php?error=pwdspace&code=" . $code);
		exit();
	} else if ($pwd !== $pwd_repeat) {
		header("Location: ../forgotten_password.php?error=pwdcheck&code=" . $code);
		exit();
	} else {
		try {
			$sql = "UPDATE `users` SET `password` = ? WHERE `user_id` = ?";
			$stmt = $conn->prepare($sql);
			$hashed = password_hash($pwd, PASSWORD_DEFAULT);
			$stmt->bindParam(1, $hashed);
			$stmt->bindParam(2, $user_id);

			if ($stmt->execute()) {
				header("Location: ../index.php?success=pwdchanged");
				exit();
			}
		} catch (PDOException $e) {
			die("Connection failed: " . $e->getMessage());
		}
	}
}
