<?php

    include("../ini.php");

    if(isset($_POST['register'])){

        $q2 = "INSERT INTO profiles VALUES('', '-', '-', '-', '-', '-', '-', '-', '-')";
        mysqli_query($con, $q2);

        $profile_id = mysqli_insert_id($con);

        $current_time = date("Y-m-d H:i:s");
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $q = "INSERT INTO users VALUES('', '$username', '$email', '$password', '$current_time', '$current_time', '$profile_id', '')";

        mysqli_query($con, $q);

        echo $q;

        $user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE email = '$email'"));
        $_SESSION['loggedin_user'] = $user;

        header("location: ../../public/index.php");

    }else{
        header("location: ../../public/index.php");
    }

?>