<?php
require 'connection.php';


$id=$_GET['updateid'];
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $description = $_POST["description"];
  if($_FILES["image"]["error"] == 4){
    echo
    "<script> alert('Image Does Not Exist'); </script>"
    ;
  }
  else{
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if ( !in_array($imageExtension, $validImageExtension) ){
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    }
    else if($fileSize > 1000000){
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    }
    else{
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, 'img/' . $newImageName);

      $query = "UPDATE album set id='$id,name='$name',description='$description',image='$newImageName' WHERE id=$id";

      mysqli_query($conn, $query);
      echo
      "
      <script>
        alert('Successfully updated');
        document.location.href = 'data.php';
      </script>
      ";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Upload Image File</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <div class="heading">
        <h1>ALBUM</h1>
        <ul>
            <li><a href="index.php">Add New image</a></li>
            <li><a href="data.php">view Album</a></li>
        </ul>
    </div>
    <div class= "form">
        <h2>Update images in Album</h2>
    <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
      <input type="text" name="name" placeholder="Collection name" id = "name" required value=""> <br>
      <textarea name="description" id="" cols="30" rows="10" placeholder="collection description"></textarea><br>
      <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value=""> <br>
      <input type="submit" name="submit" value="UPDATE"><br> 
    </form>
</div>
  </body>
</html>
