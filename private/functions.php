<?php

    include("functions/user.php");
    include("functions/friend.php");
    include("functions/like.php");

    function time_ago($time_posted){
        
        $time_now = new DateTime(date("Y-m-d H:i:s"));
        $time_posted = new DateTime($time_posted);

        $time_ago = explode(":", $time_now->diff($time_posted)->format('%Y:%M:%D:%H:%I:%S'));
        
        if($time_ago[0] < 1 && $time_ago[1] < 1 && $time_ago[2] < 1 && $time_ago[3] < 1 && $time_ago[4] < 1){

            return $time_ago[5] . " Seconds Ago";

        }else if($time_ago[0] < 1 && $time_ago[1] < 1 && $time_ago[2] < 1 && $time_ago[3] < 1){

            return $time_ago[4] . " Minutes Ago";

        }else if($time_ago[0] < 1 && $time_ago[1] < 1 && $time_ago[2] < 1){

            return $time_ago[3] . " Hours Ago";

        }else if($time_ago[0] < 1 && $time_ago[1] < 1){

            return $time_ago[2] . " Days Ago";

        }else if($time_ago[0] < 1){

            return $time_Ago[1] . " Months Ago";

        }else{

            return $time_ago[0] . " Years Ago";

        }
                                    
    }

    function time_ago_data($last_time){
        
        $time_now = new DateTime(date("Y-m-d H:i:s"));
        $last_time = new DateTime($last_time);

        $time_ago = explode(":", $time_now->diff($last_time)->format('%Y:%M:%D:%H:%I:%S'));
        
        if($time_ago[0] < 1 && $time_ago[1] < 1 && $time_ago[2] < 1 && $time_ago[3] < 1 && $time_ago[4] < 1){

            return $time_ago[5] . "-S";

        }else if($time_ago[0] < 1 && $time_ago[1] < 1 && $time_ago[2] < 1 && $time_ago[3] < 1){

            return $time_ago[4] . "-M";

        }else if($time_ago[0] < 1 && $time_ago[1] < 1 && $time_ago[2] < 1){

            return $time_ago[3] . "-H";

        }else if($time_ago[0] < 1 && $time_ago[1] < 1){

            return $time_ago[2] . "-D";

        }else if($time_ago[0] < 1){

            return $time_Ago[1] . "-M";

        }else{

            return $time_ago[0] . "-Y";

        }
                                    
    }
    

?>