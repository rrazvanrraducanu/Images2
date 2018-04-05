<?php
include 'connection.php';
$sql = "SELECT * FROM output_images ORDER BY id DESC"; 
$result = mysqli_query($con, $sql)or die(mysqli_error($con));
?>
<HTML>
<HEAD>
<TITLE>List BLOB Images</TITLE>
</HEAD>
<BODY>
     <table rules="rows">
         <tr>
             <th>Name</th>
             <th>Image</th>
             <th colspan="3" center="align">Actions</th>
         </tr>
<?php
while($row = mysqli_fetch_array($result)) {
?>
         <tr style="border-bottom: 1px solid black;">
             <td style="width:300px">
                 <h1> <?php echo $row["name"]; ?></h1>
             </td>
             <td style="width:300px">
<?php
echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['data'] ).'" height="200" width="200"/>';
?>
</td>
<td>
<?php echo "<a href=\"view.php?id=".$row['id']."\">View</a> <a href=\"edit.php?id=".$row['id']."\">Edit</a> 
<a href=\"delete.php?id=".$row['id']."\" onclick=\"return confirm('Are you sure?')\">Delete</a>"?>
</td>
    </tr>
<?php }?>
</table>
    <a href="upload.php">Upload another image</a>
</BODY>
</HTML>


