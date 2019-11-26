<!DOCTYPE html>

<form enctype="multipart/form-data" method="post" name="changer">
<input name="image" accept="image/jpeg" type="file">
<input value="Submit" type="submit">
</form>
</html>
<?php

print_r($_FILES);
?>