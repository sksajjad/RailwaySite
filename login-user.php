<?php
    $username = $_POST['useruser'];
    $password = $_POST['passpass'];
    $con = new mysqli('localhost', 'root', '', 'cse');

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password';";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    echo json_encode($id);
    $con->close();
?>