<?php

    include("../ini.php");

    if(isset($_POST['login'])){

        $error = "";

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE email = '$email'"));

        if(mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE email = '$email'")) < 1){
            $error = "email do not exsist";
        }else if($password != $user['password']){
            $error = "invalid password";
        }

        if($error == ""){

            $_SESSION['loggedin_user'] = $user;
            $_SESSION['login_error'] = "";

            $date_now = time("Y-m-d H:i:s");
            mysqli_query($con, "UPDATE users SET last_login = $date_now");
            header("location: ../../public/login.php");

        }else{

            $_SESSION['login_error'] = $error;
            $_SESSION['loggedin_user'] = "";
            header("location: ../../public/login.php");

        }

    }else{
        header("location: ../../public/login.php");
    }

?>