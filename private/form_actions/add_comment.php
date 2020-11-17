<?php
    include("../ini.php");
    if(isset($l_id) && $l_id == $_POST['user']){

        $body = $_POST['body'];
        $user_id = $_POST['user'];
        $post_id = $_POST['post'];

        $q = "INSERT INTO comments VALUES('', '$body', '$user_id', '$post_id')";

        mysqli_query($con, $q);

        $comments = mysqli_query($con, "SELECT * FROM comments WHERE post_id = $post_id");

        while($comment = mysqli_fetch_assoc($comments)){

            $commenter = user_id_to_row($comment['user_id']);
            $commenter_profile = user_profile($comment['user_id']);

                                                    ?>
                                                    <div class="comment">
                                                        <img src="../images/prof_pics/<?php echo $commenter_profile['img']; ?>" alt="">
                                                        <div>
                                                            <a href="profile.php?id=<?php echo $comment['user_id'] ?>"><?php echo $commenter['username'] ?><br></a>
                                                            <?php echo $comment['body']; ?>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <?php

        }


    }else{
        echo "nikal hacker";
    }
?>