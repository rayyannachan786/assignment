<?php 
    // Connect to databse
    $connection = mysqli_connect("localhost","root","", 'phpcrud');
	 
	// Update
	if (isset($_POST['edit'])) 
	{
		// receive all input values from the form
		$idd = $_POST['id'];   
        $name = $_POST['name'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        $lifeexp = $_POST['lifeexp'];    
        $fname = $_FILES["filename"]["name"];        
        $path = "images/$fname";
        $temp = $_FILES["filename"]["tmp_name"];
        $oldname = $_POST['old'];
        $pathname = 'images/'.$oldname;

        if(!empty($fname)){
            move_uploaded_file($temp,$path);
            unlink($pathname);
        }
        else{
           $fname = $oldname;
        }

		$sql = "update animaldata set name=?,category=?,photo=?,description=?,lifeexpect=? where id=?";
        $stmt = mysqli_prepare($connection,$sql);

        mysqli_stmt_bind_param($stmt, "sssssi",$name,$category,$fname,$description,$lifeexp,$idd);
        mysqli_stmt_execute($stmt);

        $check = mysqli_stmt_affected_rows($stmt);
		if($check>0)
		{        
            header('Location: animals.php');
        }
        else
        {
            echo '<script> alert("Data Not updated"); </script>';
        }	         
	}
