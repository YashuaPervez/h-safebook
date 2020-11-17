<?php
    include("../../private/includes/user_top.php");
?>
<div class="post-area">
    <div class="panel">
        <div class="panel-header">
            Friends
        </div>
        <div class="panel-body">
            <?php
                $q = "SELECT * FROM friend_requests WHERE ((request_to = $l_id) OR (request_by = $l_id)) AND accepted = 1";
                $f_ids = mysqli_query($con, $q);

                while($f_id = mysqli_fetch_assoc($f_ids)){

                    $id = ($f_id['request_to'] == $l_id) ? $f_id['request_by'] : $f_id['request_to'] ;
                    $profile = user_id_to_row($id);

                    echo $profile['username'];
                    include("../../private/includes/friend_control_form.php");
                    echo "<br><br>";

                }

                if(mysqli_num_rows($f_ids) < 1){
                    echo "No Friends";
                }
            ?>
        </div>
    </div>

    <div class="panel">
        <div class="panel-header">
            Sent Requests
        </div>
        <div class="panel-body">
        <?php

            $q = "SELECT * FROM friend_requests WHERE request_by = $l_id AND accepted = 0";
            $f_ids = mysqli_query($con, $q);

            while($id = mysqli_fetch_assoc($f_ids)){

                $id = $id['request_to'];
                $profile = user_id_to_row($id);
                echo "You have sent friend request to " . $profile['username']; 
                include("../../private/includes/friend_control_form.php");
                echo "<br><br>";
            }

            if(mysqli_num_rows($f_ids) < 1){
                echo "You have sent request to no one";
            }
        ?>
        </div>
    </div>

    <div class="panel">
        <div class="panel-header">
            Incomming Requests
        </div>
        <div class="panel-body">
            <?php

                $q = "SELECT * FROM friend_requests WHERE request_to = $l_id AND accepted = 0";
                $f_ids = mysqli_query($con, $q);

                while($id = mysqli_fetch_assoc($f_ids)){

                    $id = $id['request_by'];
                    $profile = user_id_to_row($id);
                    include("../../private/includes/friend_control_form.php");
                }

                if(mysqli_num_rows($f_ids) < 1){
                    echo "No Incomming Requests";
                }
            ?>
        </div>
    </div>

</div>

<?php
    include("../../private/includes/user_bottom.php");
?>