<?php
    $username = $_POST['user-sign'];
    $password = $_POST['pass-pass'];
    $full_name = $_POST['full_name'];
    $email = $_POST['mail'];
    $con = new mysqli('localhost', 'root', '', 'cse');

    $query = "INSERT INTO users VALUES (4, '$username', '$password', '$full_name', '$email');";
    $result = mysqli_query($con, $query);
    //echo 'Done!';
    $con->close();
?>