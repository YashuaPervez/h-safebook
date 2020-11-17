<?php
    include("../ini.php");
    if(isset($l_id) && $l_id == $_POST['user']){

        $last_message_id = $_POST['id'];
        $friend_id = $_POST['to_id'];

        $m_q = "SELECT * FROM messages WHERE ((from_id = $l_id AND to_id = $friend_id) OR (from_id = $friend_id AND to_id = $l_id)) AND id > $last_message_id ORDER BY id DESC LIMIT 1";
        $messages = mysqli_query($con, $m_q);
                
                    $l_m_id = 0;

                    while($m = mysqli_fetch_assoc($messages)){

                        if($m['from_id'] == $l_id){
                            ?>
                                <div class="m-me">
                                    <div class="message">
                                        <?php echo $m['body']; ?>
                                    </div>
                                </div>
                            <?php
                        }else{
                            ?>
                                <div class="m-f">
                                    <div class="message">
                                        <?php echo $m['body']; ?>
                                    </div>
                                </div>
                            <?php
                        }

                        if($l_m_id == 0)
                            $l_m_id = $m['id'];
                        
                    }
                    

    }else{
        echo "nikal hacker";
    }
?>