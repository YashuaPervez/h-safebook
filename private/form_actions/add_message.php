<?php
    include("../ini.php");

    if(isset($l_id) && $l_id == $_POST['user']){

        //Add into message
        $body = $_POST['body'];
        $from_id = $_POST['user'];
        $to_id = $_POST["to_id"];

        $q = "INSERT INTO messages VALUES('', '$body', '$from_id', '$to_id', '0')";
        mysqli_query($con, $q);

    }
?>