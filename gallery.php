<?php require 'header.php' ?>

<main>
	<?php
	if (!$_SESSION && !$_GET['guest'])
	{
		header("Location: index.php");
		exit();
	}
	?>
	<body>
		<div class="gallery">
			<h2>Gallery</h2>
			<div>1</div>
			<div>2</div>
			<div>3</div>
			<div>4</div>
		</div>
	</body>
</main>

<?php require "footer.php"; ?>