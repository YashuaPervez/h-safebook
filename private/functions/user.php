<?php

    function is_loggedin(){
        if(isset($_SESSION['loggedin_user']['email'])){
            
            $email = $_SESSION['loggedin_user']['email'];
            $password = $_SESSION['loggedin_user']['password'];

            if(mysqli_num_rows(mysqli_query($GLOBALS['con'], "SELECT id FROM users WHERE email = '$email' AND password = '$password'")) > 0){
                return true;
            }

        }

        return false;
    }

    function user_id_to_row($id){
        $result = mysqli_query($GLOBALS['con'], "SELECT * FROM users WHERE id = '$id'");
        return mysqli_fetch_assoc($result);
    }

    function user_profile($id){
        $profile_id = mysqli_fetch_assoc(mysqli_query($GLOBALS['con'], "SELECT profile_id FROM users WHERE id = $id"))['profile_id'];

        $result = mysqli_query($GLOBALS['con'], "SELECT * FROM profiles WHERE id = '$profile_id'");
        return mysqli_fetch_assoc($result);
    }

    function user_exsist($id){
        $q = "SELECT id FROM users WHERE id = $id";
        $n = mysqli_num_rows(mysqli_query($GLOBALS['con'], $q));

        if($n > 0){
            return true;
        }else{
            return false;
        }
    }

?>