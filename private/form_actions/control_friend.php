<?php

    include("../ini.php");

    if(isset($_POST['add_friend']) && isset($l_id)){

        $friend = $_POST['friend_id'];
        $current_date = date("Y-m-d H:i:s");

        $q = "INSERT INTO friend_requests VALUES('', '$l_id', '$friend', '0', '$current_date')";
        mysqli_query($con, $q);

    }else if(isset($_POST['remove_friend']) && isset($l_id)){

        $friend = $_POST['friend_id'];
        $q = "DELETE FROM friend_requests WHERE (request_by = $l_id AND request_to = $friend) OR (request_by = $friend AND request_to = $l_id)";

        mysqli_query($con, $q);

    }else if(isset($_POST['cancel_friend_request']) && isset($l_id)){

        $friend = $_POST['friend_id'];
        $q = "DELETE FROM friend_requests WHERE request_by = $l_id AND request_to = $friend";

        mysqli_query($con, $q);

    }else if(isset($_POST['decline']) && isset($l_id)){

        $friend = $_POST['friend_id'];
        $q = "DELETE FROM friend_requests WHERE request_by = $friend AND request_to = $l_id";

        mysqli_query($con, $q);

    }else if(isset($_POST['accept']) && isset($l_id)){

        $friend = $_POST['friend_id'];
        $q = "UPDATE friend_requests SET accepted = 1 WHERE request_by = $friend AND request_to = $l_id";

        mysqli_query($con, $q);

    }

    header("location: ../../public/user/profile.php?id=$friend");


?>