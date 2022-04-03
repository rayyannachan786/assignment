<?php
$connection = mysqli_connect("localhost", "root", "", 'phpcrud');
$id = $_POST['id'];  
$query = mysqli_query($connection, "select photo from animaldata where id=$id");
$row = mysqli_fetch_assoc($query);
$pathname = 'images/'.$row['photo'];
$result = mysqli_query($connection, "Delete from animaldata where id=$id");
if($result)
    {        unlink($pathname);
        header('Location: animals.php');
    }
    else
    {
        echo '<script> alert("Failed to delete"); </script>';
        header('Location: animals.php');
    }
?> 