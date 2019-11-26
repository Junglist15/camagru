<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php
	$user_id = $_SESSION['userId'];
	?>
	<section class="update-user-info">
		<div id="pp"></div>
		<?php
		if (isset($_GET['error'])) {
			if ($_GET['error'] == "emptyfields") {
				echo '<p class="err">Fill in all fields</p>';
			} else if ($_GET['error'] == "passwordcheck") {
				echo '<p class="err">Passwords doesn\'t match</p>';
			} else if ($_GET['error'] == "pwdshort") {
				echo '<p class="err">Password needs to be longer than 8 characters</p>';
			} else if ($_GET['error'] == "pwdnocap") {
				echo '<p class="err"Password needs at least 1 uppercase letter</p>';
			} else if ($_GET['error'] == "pwdnolow") {
				echo '<p class="err">Password needs at least 1 lowercase letter</p>';
			} else if ($_GET['error'] == "pwdnospchar") {
				echo '<p class="err">Password needs at least 1 special character</p>';
			} else if ($_GET['error'] == "pwdnodigit") {
				echo '<p class="err">Password needs at least 1 digit</p>';
			} else if ($_GET['error'] == "pwdspace") {
				echo '<p class="err">Password should have no spaces</p>';
			} else if ($_GET['error'] == "wrongpwd") {
				echo '<p class="err">Incorrect password</p>';
			}
		}
		?>
		<form action="includes/update.inc.php" method="post">
			<p>Password: <input type="password" name="pwd-current" placeholder="Enter current password"></p>
			<p>Password: <input type="password" name="password" placeholder="Enter New password"></p>
			<p>Confirm password: <input type="password" name="pwd-repeat" placeholder="Re-enter new password"></p>
			<button type="submit" name="update-pass">Update Password</button>
			<button id="info" onclick="change_field()">close</button>
		</form>
	</section>

</body>

</html>

<script>
	function change_field() {
		window.close();
	}
</script>