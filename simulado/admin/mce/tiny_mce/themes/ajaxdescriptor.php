<?php


if($_SERVER['REQUEST_METHOD'] == "POST") {
	$diretorio = "";
	if(isset($_POST['diretorio']) && !empty($diretorio)) {
		$diretorio = $_POST['diretorio'];
	}else {
		$diretorio = "";
	}

	if(empty($diretorio))
		$uploaddir = getcwd();
	else
		$uploaddir = $diretorio;
		
	$uploadfile = $uploaddir ."/". basename($_FILES['userfile']['name']);

	echo "<p>";

	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
	  echo "File is valid, and was successfully uploaded.\n";
	} else {
	   echo "Upload failed";
	}

	echo "</p>";
	echo '<pre>';
	echo 'Here is some more debugging info:';
	print_r($_FILES);
	print "</pre>";
}


?> 
Tiny Mce Content 
<form enctype="multipart/form-data" action="ajaxdescriptor.php" method="POST">
    Send this file: <input name="userfile" type="file" /> <br/>
	<!--<input type="text" name="diretorio" />-->
	
    <input type="submit" value="Send File" />
</form>