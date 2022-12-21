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
      <?php
      $i = 1;
      $rows = mysqli_query($conn, "SELECT * FROM album")
      ?>

      <?php foreach ($rows as $row) : ?>

      <div class= "cards">
       <div class="card-profile">  
       <img src="img/<?php echo $row["image"]; ?>" title="<?php echo $row['image']; ?>">
       <div class="info">
       <h2><?php echo $row["name"]; ?></h2>
       <button><a href="viewmore.php?viewid=id">View more</a></button>
       <button><a href="update.php?updateid=id">Rename</a></button>
       <button><a href="delete.php?deleteid=id">Delete</a></button>
      </div>      
    </div>
</div>
<?php endforeach; ?>
  </body>
</html>
