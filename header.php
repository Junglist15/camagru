<?php session_start();?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Camagru - Super Posable</title>
	<link rel="stylesheet" media="all" href="style.css">

</head>
<header>
	<div id="logo"></div>
	<?php
	if (isset($_SESSION['userId'])) { ?>
		<nav>
		<ul class="nav-links">
			<li><a href="profile.php">profile</a></li>
			<li><a href="gallery.php">gallery</a></li>
			<li><a href="editor.php">editor</a></li>
		</ul>
	</nav>

	<div class="nav-input">
		<form action="includes/login.inc.php" method="post">
			<button id="logout-butt" type="submit" name="logout-submit">Logout</button>
		</form>
	</div> <?php
	}
	if (isset($_GET['guest'])) { ?>
		<div class="nav-input">
		<form action="includes/login.inc.php" method="post">
		<input type="text" name="mailuid" placeholder="Username/E-mail">
		<input type="password" name="pwd" placeholder="Password">
		<button type="submit" name="guest-login-submit">Login</button>
		<input id="login-butt" type="button" value="Login" onclick="location.href='index.php'">
		<input id="signup-butt" type="button" value="Signup" onclick="location.href='signup.php'">
		</form>
		<?php
		if (isset($_GET['error'])) {
			if ($_GET['error'] == "emptyfields") {
				echo '<p>Fill in all fields</p>';
			} else if ($_GET['error'] == "nouser") {
				echo '<p>Please sign-up to sign-in</p>';
			} else if ($_GET['error'] == "wrongpwd") {
				echo '<p>Incorrect password</p>';
			} else if ($_GET['error'] == "nouser") {
				echo '<p>Please sign-up to sign-in</p>';
			}
		}
		echo '</div>';
	}
	?>
</header>

</html>