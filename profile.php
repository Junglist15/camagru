<?php require 'header.php' ?>

<main>
	<?php
	if (!$_SESSION) {
		header("Location: index.php");
		exit();
	} else { ?>
		<?php
			$username = $_SESSION['username'];
			$user_id = $_SESSION['userId'];
			$pp_src = $_SESSION['pp_src'];
			$email = $_SESSION['email'];
			?>
		<section class="user-info">
			<div id="pp"></div>
			<form action="includes/profile.inc.php" method="post">
				Username: <input type="text" name="username" value="<?php echo $username ?>" readonly><br>
				Email: <input type="email" name="email" value="<?php echo $email ?>" readonly><br>
				Password: <input type="password" name="username" value="00000000" readonly><br>
				<button type="submit" name="update-info">Update info</button>
			</form>
			<button onclick="change_field()">Edit information</button>
		</section>
	<?php }
	?>

	<!-- <script>
		function change_field() {
		$m = document.getElementsByName("username");
		$p = document.getElementsByName("email");
			$m.disable = false;
			$p.disable = false
		}
	</script>  -->
</main>


<?php require 'footer.php' ?>





<!-- 
$_SESSION['userId'] = $result['user_id'];
$_SESSION['username'] = $result['username'];
$_SESSION['pp_src'] = $result['pp_src'];
$_SESSION['verify'] = $result['verified']; 
$_SESSION['email'] = $result['email'];
-->