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
	$username = $_SESSION['username'];
	$user_id = $_SESSION['userId'];
	$email = $_SESSION['email'];
	?>
	<section class="update-user-info">
		<div id="pp"></div>
		<?php
		if (isset($_GET['error'])) {
			if ($_GET['error'] == "emptyfields") {
				echo '<p class="err">Fill in all fields</p>';
			} else if ($_GET['error'] == "invalidmailuid") {
				echo '<p class="err">Invalid username & password</p>';
			} else if ($_GET['error'] == "invalidmail") {
				echo '<p class="err">Invalid email</p>';
			} else if ($_GET['error'] == "invaliduid") {
				echo '<p class="err">Invalid username</p>';
			} else if ($_GET['error'] == "wrongpwd") {
				echo '<p class="err">Incorrect password</p>';
			} else if ($_GET['error'] == "mailtaken") {
				echo '<p class="err">Email already registered</p>';
			}
		}
		?>
		<form action="includes/update.inc.php" method="post">
			<p>Username: <input type="text" name="username" value="<?php echo $username; ?>"></p>
			<p>Email: <input type="email" name="email" value="<?php echo $email; ?>"></p>
			<p>Password: <input type="password" name="password" placeholder="Enter to confirm changes"></p>
			<button type="submit" name="update-info">Update info</button>
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