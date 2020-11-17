<?php

    include("../ini.php");

    if(isset($_POST['change_profile'])){

        $about = mysqli_real_escape_string($con, $_POST['about']);
        $phone_number = $_POST['phone_number'];
        $facebook = $_POST['facebook'];
        $instagram = $_POST['instagram'];
        $profession = $_POST['profession'];
        $education = $_POST['education'];
        $resident = $_POST['resident'];

        $profile_pic = $_FILES['profile_pic'];

        $q = "UPDATE `profiles` SET `about`='$about',`phone_number`='$phone_number',`facebook`='$facebook',`instagram`='$instagram',`profession`='$profession',`education`='$education',`resident`='$resident' ";

        if($profile_pic['error'] != 4 ){
            
            $type = explode("/", $profile_pic['type'])[0];
            $att_ext = explode("/", $profile_pic['type'])[1];

            $rnd_name = rand(1000, 9999) . "-" . rand(1000, 9999) . "-" . rand(1000, 9999) . "-" . time() . "." . $att_ext;

            move_uploaded_file($profile_pic['tmp_name'], "../../public/images/prof_pics/" . $rnd_name);

            $q .= ", `img` = '$rnd_name'";

        }

        

        $u_profile = $l_user['profile_id'];

        $q .= " WHERE id = $u_profile";

        mysqli_query($con, $q);
        

        header("location: ../../public/user/edit_profile.php");

    }else{

        header("location: ../../public/user/edit_index.php");

    }
?>