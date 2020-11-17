<?php
    $page = "profile";

    include("../../private/includes/user_top.php");

    if(!isset($_GET['id'])){
        header("location: index.php");
    }else{
        $id = $_GET['id'];
    }


    if(user_exsist($id)){

        
        $profile = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE id = $id"));

        $p_q = "SELECT * FROM posts WHERE post_to = $id ORDER BY id DESC";
        $posts = mysqli_query($con, $p_q);
        ?>

        
        

        <div class="post-area">

        <?php include("../../private/includes/friend_control_form.php"); ?>
        
            <?php

while($post = mysqli_fetch_assoc($posts) ){

    $post_id = $post['id'];

    ?>

        <div class="post">
            <div class="post-header">
                <?php
                    $posted_by = user_id_to_row($post['post_by']);
                    $profile = user_profile($post['post_by'])
                ?>
                <div class="header-profile-img">
                    <img src="../images/prof_pics/<?php echo $profile['img']; ?>" alt="">
                </div>
                <div class="header-profile-name">
                    <?php echo $posted_by['username']; ?>
                </div>
                                    
            </div>
            <div class="post-body">
                <?php echo $post['post_body']; ?>
            </div>
            <?php

                if($post['post_attachment'] != "-"){
                    ?>
                        <img src="../images/pst_atts/<?php echo $post['post_attachment']; ?>" class="post-attachment">
                    <?php
                }
            
            ?>
            <div class="post-like">
                                    <?php
                                        if(post_liked($post['id'], $l_id)){
                                            $like_status = "liked";
                                        }else{
                                            $like_status = "";
                                        }

                                        $like_btn_id = "post-" . $post['id'];
                                        $like_span_id = "total-like-" . $post['id'];
                                    ?>
                <button onclick="like_post(<?php echo $post['id']; ?>)" class="like-button <?php echo $like_status ?> <?php echo $like_btn_id ?>"><i class="far fa-thumbs-up"></i></button>
                <span class="<?php echo $like_span_id ?>">total likes: <?php echo post_likes($post['id']) ?></span>
            </div>

            <div class="post-comments">
                                        <?php
                                            $comment_btn_class = "comment-btn-" . $post['id'];
                                            $comment_fld_class = "comment-fld-" . $post['id'];
                                        ?>
                                        <img src="../images/prof_pics/<?php echo $l_profile['img'] ?>" alt="">
                                        <input type="text" name="comment_body" class="comment-field" placeholder="Comment as <?php echo $l_user['username'] ?>">
                                        <input type="hidden" class="comment-post" value="<?php echo $post['id'] ?>">
                                        <button class="add-comment-btn"><i class="fas fa-paper-plane"></i></button>
                                        
                                </div>
                                <div class="comment-area">
                                            <?php
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
                                            ?>
                                            
                                </div>
            
            
            
        </div>

    <?php
}
                
            ?>

        </div>

        <?php

    }else {
        echo "User ID do not exsists";
    }

    include("../../private/includes/user_bottom.php");
?>