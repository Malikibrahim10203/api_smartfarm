<?php

    include 'connection.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $pw =  password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE users SET name='$name', email='$email', password='$pw', role='$role' WHERE id='$id'";

    $result = $connect->query($sql);


    if($result->num_rows > 0) {
        $user = array();
        while ($row = $result->fetch_assoc()) {
            $user[] = $row;
        }

        echo json_encode(array(
            "success"=>true,
            "user"=>$user,
        ));
    } else {
        echo json_encode(array(
            "success"=>false,
        ));
    }
?>