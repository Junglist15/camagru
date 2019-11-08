<?php require "header.php"; ?>

<main>
	<div class="center">
		<div class="logins">
			<h5>Welcome!</h5>
			<?php
			if (isset($_GET['error'])) {
				if ($_GET['error'] == "emptyfields") {
					echo '<p>Fill in all fields</p>';
				} else if ($_GET['error'] == "nouser") {
					echo '<p>Please sign-up to sign-in</p>';
				}
				else if ($_GET['error'] == "wrongpwd") {
					echo '<p>Incorrect password</p>';
				}
				else if ($_GET['error'] == "nouser") {
					echo '<p>Please sign-up to sign-in</p>';
				} else if ($_GET['error'] == "updatefiles") {
					echo '<p>Failed to verify account</p>';
				}
			}
			else if ($_GET['success'] == "signup") {
				echo '<p id="success">Registered!<br />Verify email to login<p>';
			} else if ($_GET['success'] == "verified") {
				echo '<p id="success">Verified!<br />Please login<p>';
			}
			?>
			<form action="includes/login.inc.php" method="post">
				<input id="email" onkeyup="stoppedTyping()" type="text" name="mailuid" placeholder="Username/E-mail"><br>
				<input id="pwd" onkeyup="stoppedTyping()" type="password" name="pwd" placeholder="Password"><br>
				<button id="login-butt" type="submit" name="login-submit">Login</button><br>
			</form>
			<input type="button" class="signup-butt" value="Signup" onclick="location.href='signup.php';"><br>
			<form action="gallery.php" method="get">
				<input type="submit" name="guest" value="guest" class="guest-butt">
			</form>
		</div>
	</div>
	<!-- <script>
		$m = document.getElementById("email");
		$p = document.getElementById("pwd");
		
		function stoppedTyping() {
			if ($m.value.length > 0 && $p.value.length > 0) {
				document.getElementById("login-butt").disable = false;
			} else {
				document.getElementById("login-butt").disable = true;
			}
		}
	</script> -->
	<!-- } -->
</main>

<?php require "footer.php"; ?>