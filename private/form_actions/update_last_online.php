<?php

    include("../ini.php");

    if(isset($l_id) && $l_id == $_POST['user']){

        $time_now = date("Y-m-d H:i:s");
        $q = "UPDATE users SET last_online = '$time_now' WHERE id = $l_id";

        mysqli_query($con, $q);

        echo $q;

    }

?>