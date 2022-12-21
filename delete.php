<?php
include 'connection.php';

if(isset($_GET['deleteid'])){

    $id=$_GET['deleteid'];
  
    $delete="DELETE FROM album WHERE id= $id";
    $result= mysqli_query($conn,$delete);
    if($delete){

        //echo $id;
        header('location:data.php');
    }
    else{
        echo"not deleted";
        //die(mysqli_error($conn));
    }
}
?>

