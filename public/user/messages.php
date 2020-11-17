<?php

    include("../../private/includes/user_top.php");

    if(isset($_GET['id']) && $_GET['id'] != $l_id){

        $friend_id = $_GET['id'];

    }else{
        header("location: index.php");
    }

?>
    <div class="post-area">
        <div class="message-area">
            <div class="send-message">
                <input type="text" class="message-field" autocomplete="off">
                <button class="message-button">Send</button>
            </div>
            
            <div class="display-chat">
                <?php
                    $m_q = "SELECT * FROM messages WHERE (from_id = $l_id AND to_id = $friend_id) OR (from_id = $friend_id AND to_id = $l_id) ORDER BY id DESC ";
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
                ?>
                
                
            </div>
            <input type="hidden" value="<?php echo $l_m_id; ?>" id="last-message-id">
            
            
        </div>
    </div>

    <script>

        setInterval(() => {
            var id = $("#last-message-id").val();
            var user_id = <?php echo $l_id; ?>;
            var friend_id = <?php echo $friend_id; ?>;
            
            var data = "id=" + id + "&user=" + user_id + "&to_id=" + friend_id;
            
            $.ajax({
                url: "../../private/form_actions/scan_message.php",
                data: data,
                type: "post",
                success: function(response){

                    if(response){
                        $(".display-chat").prepend(response);
                        $("#last-message-id").val(Number(id) + 1);
                    }
                    
                }
            });
        }, 1000);

        $(".message-button").on("click", () => {

            var message_body = $(".message-field").val();
            var user_id = <?php echo $l_id; ?>;
            var friend_id = <?php echo $friend_id; ?>;

            var data = "body=" + message_body + "&user=" + user_id + "&to_id=" + friend_id;

            if(message_body){

                $(".message-field").val("");

                $.ajax({
                    url: "../../private/form_actions/add_message.php",
                    data: data,
                    type: "post",
                    success: function(response){
                        //alert(response);
                    }
                })
            
            }

        });

    </script>

<?php

    include("../../private/includes/user_bottom.php");

?>