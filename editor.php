  
<?php require 'header.php' ?>

<main>
	<?php
	if ($_SESSION['verify'] == 0) {
		echo '<h2 id="verify-tag">Verify account to access Editor page</h2>';
	}
	else{
		
	}
	?>
</main>


<?php require 'footer.php' ?>