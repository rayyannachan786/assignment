<?php

$connection = mysqli_connect("localhost", "root", "", 'phpcrud');

if (isset($_POST['insertdata'])) {
    $name = $_POST['name'];
    if (empty($name)) {
        $name_error = "Name must be filled";
    }
    $category = $_POST['category'];
    $description = $_POST['description'];
    $lifeexp = $_POST['lifeexp'];
    $submission = date('d-m-Y h:i:sa');
    $fname = $_FILES["filename"]["name"];
    $path = "images/$fname";
    $temp = $_FILES["filename"]["tmp_name"];

    if ((!empty($_POST['g-recaptcha-response']))) {
        $secret = '6LcBHjMfAAAAAOyC1YFpd54LCRiHD-QjLEVPl9V5';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if ($responseData->success) {
            move_uploaded_file($temp, $path);

            $query = "INSERT INTO animaldata (`name`,`category`,`photo`,`description`,`lifeexpect`,`submission`) VALUES ('$name','$category','$fname','$description','$lifeexp','$submission')";
            $query_run = mysqli_query($connection, $query);

            if ($query_run) {
                header('Location: animals.php');
            } else {
                echo '<script> alert("Data Not Saved"); </script>';
            }
        } else {
            echo '<script> alert("Failed to validate"); </script>';
        }
    } else {
        echo '<script> alert("Captcha failed"); </script>';
?>
        <script>
            window.location = "animals.php";
        </script>
<?php
    }
}
?>