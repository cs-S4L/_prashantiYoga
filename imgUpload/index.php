<?php
	require "../init.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<title>CMS Upload Images</title>

	<?php include(DIR__PARTIALS . 'head/metaViewport.php') ?>

	<?php include(DIR__PARTIALS . 'head/metaFavicon.php') ?>
	
	<link rel="stylesheet" href="<?=BASE_URL?>_css/cmsEdit.css">
</head>
<body>

	<form action="processImages.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <h3>Bilder hochladen</h3>
        <input type="hidden" name="MAX_FILE_SIZE" value="<?= MAX_IMAGE_SIZE ?>">

        <label>Datei 1 auswählen</label>
        <input type="file" name="image1">
        <label>Datei 2 auswählen</label>
        <input type="file" name="image2">
        <label>Datei 3 auswählen</label>
        <input type="file" name="image3">
        <label>Datei 4 auswählen</label>
        <input type="file" name="image4">
        <label>Datei 5 auswählen</label>
        <input type="file" name="image5">


        <input type="submit" value="Upload">
        <input type="button" value="Abbrechen" onclick="parent.closeIframe('abort')">
    </fieldset>
</form>

	<script src="<?=BASE_URL?>_js/cmsEdit.js"></script>

</body>
</html>