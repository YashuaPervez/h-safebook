<?php

    function friend_status($user_id, $friend_id){

        $con = $GLOBALS['con'];
        $n = mysqli_query($con, "SELECT * FROM friend_requests WHERE (request_by = $user_id AND request_to = $friend_id) OR (request_by = $friend_id AND request_to = $user_id)");

        if(mysqli_num_rows($n) > 0){
            $req = mysqli_fetch_assoc($n);

            if($req['accepted'] == 1){
                return 3;
            }else if($req['request_by'] == $friend_id){
                return 2;
            }else if($req['request_by'] == $user_id){
                return 1;
            }else{
                return 0;
            }


        }else{
            return 0;
        }

    }

    function friend_list($user){

        $con = $GLOBALS['con'];
        $q = "SELECT * FROM friend_requests WHERE ((request_by = '$user') OR (request_to = '$user')) AND accepted = 1";

        $friends = array();

        $res = mysqli_query($con, $q);
        while($friend = mysqli_fetch_assoc($res)){

            if($friend['request_to'] == $user){

                array_push($friends, $friend['request_by']);

            }else{

                array_push($friends, $friend['request_to']);

            }

        }

        return $friends;
    }

?>