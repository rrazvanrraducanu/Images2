<?php
include 'connection.php';
if(count($_FILES) > 0) {
if(is_uploaded_file($_FILES['image']['tmp_name'])) {

$name=$_FILES['image']['name'];
$mime=$_FILES['image']['type'];
$data =addslashes(file_get_contents($_FILES['image']['tmp_name']));
//$imageProperties = getimageSize($_FILES['image']['tmp_name']);
$image_name=$_POST["image_name"];
$sql = "INSERT INTO output_images(mime ,data, name)
VALUES('{$mime}', '{$data}', '$image_name')";

$current_id = mysqli_query($con, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($con));
if(isset($current_id)) {
header("Location: index.php");
}
}}
?>

<HTML>
<HEAD>
<TITLE>Upload Image to MySQL BLOB</TITLE>
<link href="style.css" rel="stylesheet" type="text/css" />
</HEAD>
<BODY>
<form name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">
<label>Upload Image File:</label><br/>
<input name="image" type="file" class="inputFile" /><br/>
<label>File Name:</label><br/>
<input name="image_name" type="text" class="inputFile" /><br/>
<input type="submit" value="Submit" class="btnSubmit" />
</form>
</div>
</BODY>
</HTML>
