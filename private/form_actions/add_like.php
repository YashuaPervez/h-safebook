<?php
    include("../ini.php");
    if(isset($l_id) && $l_id == $_POST['user']){

        $post_id = $_POST['post'];

        

        if(post_liked($post_id, $l_id)){
            $q = "DELETE FROM post_like WHERE post_id = '$post_id' AND user_id = '$l_id'";
        }else{
            $q = "INSERT INTO post_like VALUES('', '$post_id', '$l_id')";
        }
        
        mysqli_query($con, $q);
        echo post_likes($post_id);

    }else{
        echo "nikal hacker";
    }
?>