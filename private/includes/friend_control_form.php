<form action="../../private/form_actions/control_friend.php" method="POST">
            <input type="hidden" name="friend_id" value="<?php echo $id ?>">
        
        <?php
        
            $friend_status = friend_status($l_id, $id);
            
            if($l_id == $id){
                echo "you are visiting your own profile";
            }else if($friend_status == 0){
                ?>
                
                    
                    <input type="submit" value="Add Friend" name="add_friend">
                 
                <?php
            }else if($friend_status == 3){
                ?>
                    
                    <input type="submit" value="Remove Friend" name="remove_friend">
                <?php
            }else if($friend_status == 1){
                ?> 
                    Friend request sent
                    
                    <input type="submit" value="Cancel Friend Request" name="cancel_friend_request">

                <?php
            }else if($friend_status == 2){
                ?>
                    <?php echo $profile['username'] ?> has sent you friend request
                    
                    <input type="submit" value="Accept" name="accept">
                    <input type="submit" value="Decline" name="decline">
                <?php
            }

        ?>
        </form>