<?php

    function post_liked($post_id, $user_id){

        $con = $GLOBALS['con'];
        $q = "SELECT * FROM post_like WHERE post_id = $post_id AND user_id = $user_id";

        $n = mysqli_num_rows(mysqli_query($con, $q));

        if($n < 1){
            return false;
        }else{
            return true;
        }
    }

    function post_likes($post_id){

        $con = $GLOBALS['con'];
        $q = "SELECT * FROM post_like WHERE post_id = $post_id";

        return mysqli_num_rows(mysqli_query($con, $q));

    }

?>