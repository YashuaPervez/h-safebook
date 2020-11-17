<?php

    include("../ini.php");

    if(isset($l_id) && $l_id == $_POST['user']){

        $friends = friend_list($l_id);

                foreach($friends as $friend){
                    
                    $friend_user = user_id_to_row($friend);
                    $friend_profile = user_profile($friend);

                    ?>
                    <li>
                        <img src="../images/prof_pics/<?php echo $friend_profile['img'] ?>">
                        <a href="profile.php?id=<?php echo $friend ?>"><?php echo $friend_user['username'] ?></a>
                        <div class="online-status <?php
                            $t_ago = explode("-", time_ago_data($friend_user['last_online']));

                            if($t_ago[1] == "S" && $t_ago[0] < 6){

                                echo "online-green " . $t_ago[0];
                                
                            }

                        ?>">
                            
                        </div>
                    </li>
                    <?php
                }

    }

?>