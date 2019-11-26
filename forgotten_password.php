<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php
	if (isset($_GET['code'])) { ?>
		<?php
			if (isset($_GET['error'])) {
				if ($_GET['error'] == "emptyfields") {
					echo '<p>Fill in all fields</p>';
				} else if ($_GET['error'] == "passwordcheck") {
					echo '<p>Passwords doesn\'t match</p>';
				} else if ($_GET['error'] == "pwdshort") {
					echo '<p>Password needs to be longer than 8 characters</p>';
				} else if ($_GET['error'] == "pwdnocap") {
					echo '<p>Password needs at least 1 uppercase letter</p>';
				} else if ($_GET['error'] == "pwdnolow") {
					echo '<p>Password needs at least 1 lowercase letter</p>';
				} else if ($_GET['error'] == "pwdnospchar") {
					echo '<p>Password needs at least 1 special character</p>';
				} else if ($_GET['error'] == "pwdnodigit") {
					echo '<p>Password needs at least 1 digit</p>';
				} else if ($_GET['error'] == "pwdspace") {
					echo '<p>Password should have no spaces</p>';
				} else if ($_GET['error'] == "wrongpwd") {
					echo '<p>Incorrect password</p>';
				}
			}
			?>
		<section>
			<form action="includes/forgotten_password.inc.php" method="post">
				<input type="password" name="pwd" placeholder="Password"><br>
				<input type="password" name="pwd-repeat" placeholder="Confirm password"><br>
				<input type="hidden" name="code" value="<?php echo $_GET['code']; ?>">
				<button type="submit" name="reset-submit">Signup</button>
			</form>
		</section>
	<?php
	} else {
		if (isset($_GET['error'])) {
			if ($_GET['error'] == "emptyfields") {
				echo '<p>Fill in all fields</p>';
			} else if ($_GET['error'] == "invalidmail") {
				echo '<p>Invalid email</p>';
			}
		}
		?>
		<section>
			<form action="includes/forgotten_password.inc.php" method="post">
				Enter your Email: <br>
				<input type="email" name="email" placeholder="Email"><br>
				<button type="submit" name="send_mail">Send mail</button>
			</form>
		</section>
	<?php }
	?>

</body>

</html>