<?php

    include("../ini.php");

    if(isset($_POST['post_button'])){

        $post_body = $_POST['post_body'];
        $time = date("Y-m-d H:i:s");
        $post_by = $l_user['id'];
        $attachment_name = "-";

        $file = $_FILES['post_attachment'];

        if($file['error'] != 4){

            $att_ext = explode("/", $file['type'])[1];

            $attachment_name = rand(1000, 9999) . "-" . rand(1000, 9999) . "-" . rand(1000, 9999) . "-" . time() . "." . $att_ext;

            move_uploaded_file($file['tmp_name'], "../../public/images/pst_atts/" . $attachment_name);
        }


        $q = "INSERT INTO posts VALUES('', '$post_body', '$attachment_name', '$post_by', '$post_by', '$time', '', '')";

        mysqli_query($con, $q);

        header("location: ../../public/user/index.php");
        

    }else{
        header("location: ../../public/user/index.php");
    }

?>
