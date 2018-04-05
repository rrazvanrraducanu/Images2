<?php
       //include connection file
        include 'connection.php';
        if(!isset($_POST["submit"])){
$sql="SELECT * FROM output_images WHERE ID='{$_GET['id']}'";
            $result=mysqli_query($con, $sql);
            $record=  mysqli_fetch_array($result);
        }else{
 $sql2="SELECT * FROM output_images WHERE ID='{$_POST['id']}'"; 
           $result2=mysqli_query($con, $sql2);
           $rec=  mysqli_fetch_array($result2);

$image_name=$_POST["image_name"]; 

$name=$_FILES['image']['name'];
$mime=$_FILES['image']['type'];
$data =addslashes(file_get_contents($_FILES['image']['tmp_name']));

$sql1="UPDATE output_images SET name='{$image_name}', data='{$data}' WHERE id='{$_POST['id']}'";
mysqli_query($con, $sql1) or die(mysqli_error($con));
header('Location:index.php');
      
        }
 ?>
<h1>Editati inregistrarea:</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
    Titlu:<br/><input type="text" name="image_name" value="<?php echo $record['name'] ;?>"/><br/>
    Image: <br/><input type="file" name="image" value=""><br/>
<?php    
    echo '<img src="data:image/jpeg;base64,'.base64_encode( $record['data'] ).'" height="200" width="200"/>';
?>    <br/>
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
    <input type="submit" name="submit" value="Edit"/>
</form>
