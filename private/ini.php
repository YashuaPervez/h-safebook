<?php

    session_start();
    include("connection.php");
    include("functions.php");

    if(is_loggedin()){

        $l_user = $_SESSION['loggedin_user'];
        $l_id = $l_user['id'];

        $u_profile = $l_user['profile_id'];
        $q = "SELECT * FROM profiles WHERE id = $u_profile";
        $l_profile = mysqli_fetch_assoc(mysqli_query($con, $q));

    }else{

        $l_user = false;

    }

?>