<?php
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Link Swiper's CSS -->
    <link
    rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <title>Album</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <div class="heading">
        <h1>ALBUM</h1>
        <ul>
            <li><a href="index.php">Add image</a></li>
            <li><a href="data.php">view Album</a></li>
        </ul>
    </div>
    <div class="go-back">
    <p><a href="data.php">Go back</a></p> 
    </div>

    
    <?php
    $id=$_GET['viewid'];
    $select="SELECT * FROM album where id=$id";
    $selected=mysqli_query($conn,$select);
    $row=mysqli_fetch_assoc($selected);
    $names=$row['name'];
    $descr=$row['description'];
    $img=$row['image']; 
    ?>  
    
    <div class= "cards">
       <div class="card-profile">  
       <img src="img/<?php echo $img ?>" title="<?php echo $row['image']; ?>">
       <div class="info">
       <h2><?php echo $names; ?></h2>
       <p><?php echo $descr; ?></p>
      </div>      
    </div>
</div>


  </body>
</html>
