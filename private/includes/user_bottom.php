    
</div>
<div class="friends-list">
        <div class="friends-list-header">
            Friends
        </div>
        <ul id="user-friends-list">
            <?php
                $friends = friend_list($l_id);

                foreach($friends as $friend){
                    
                    $friend_user = user_id_to_row($friend);
                    $friend_profile = user_profile($friend);

                    ?>
                    <li>
                        <img src="../images/prof_pics/<?php echo $friend_profile['img'] ?>">
                        <a href="messages.php?id=<?php echo $friend ?>"><?php echo $friend_user['username'] ?></a>
                        <div class="online-status <?php
                            $t_ago = explode("-", time_ago_data($friend_user['last_online']));

                            if($t_ago[1] == "S" && $t_ago[0] < 10){

                                echo "online-green " . $t_ago[0];
                                
                            }

                        ?>">
                            
                        </div>
                    </li>
                    <?php
                }
                
            ?>
        </ul>
        
    </div>
    </div>

    
    <script>

        $("button").on("click", function(){

            var clicked = $(this).siblings(".header-tab");
            var status = clicked.css("display");

            $(".header-tab").hide();

            if(status == "none"){

                clicked.show();

            }else{

                clicked.hide();

            }

        });

                function like_post(post_id){

                    var user_id = <?php echo $l_id ?>;
                    var data = "post=" + post_id + "&user=" + user_id;

                    var btn_id = ".post-" + post_id;
                    var span_id = ".total-like-" + post_id;

                    $.ajax({
                        url: "../../private/form_actions/add_like.php",
                        data: data,
                        type: "post",
                        success: function(response){

                            $(btn_id).toggleClass("liked");
                            $(span_id).html("total likes:" + response);

                        }
                    });

                }

                $(".add-comment-btn").on("click", function(){

                    var comment_body = $(this).siblings("input").val();
                    var post_id = $(this).siblings(".comment-post").val();
                    var user_id = <?php echo $l_id; ?>

                    var data = "body=" + comment_body + "&user=" + user_id + "&post=" + post_id;

                    if(comment_body){

                        $(this).siblings("input").val("");
                        var area = $(this).parents().siblings(".comment-area");
                        

                        $.ajax({
                            url: "../../private/form_actions/add_comment.php",
                            data: data,
                            type: "post",
                            success: function(response){

                                area.html(response);

                            }
                        })

                    }

                    

                })

                //Updating logged in user online status
                setInterval(() => {

                    var user = <?php echo $l_id; ?>

                    $.ajax({
                        url: "../../private/form_actions/update_last_online.php",
                        data: "user=" + user,
                        type: "POST",
                        success: (response) => {

                            //alert(response);

                        }
                    });

                }, 5000);


                //Getting friends online status
                setInterval(() => {

                    var user = <?php echo $l_id; ?>

                    $.ajax({
                        url: "../../private/form_actions/get_online_friend.php",
                        data: "user=" + user,
                        type: "POST",
                        success: (response) => {

                            $("#user-friends-list").html(response);

                        }
                    });

                }, 5000);

            </script>

</body>
</html>