<?php
    include("../../private/includes/user_top.php");

    if(isset($_GET['search_query'])){

        $search_query = $_GET['search_query'];

        

    }
?>

    <div class="panel">
        <div class="panel-header">
            User Results
        </div>
        <div class="panel-body">
            Showing results for "<?php echo $search_query; ?>"

            <?php
                if(strlen(trim($search_query)) < 1){

                    exit("please enter something");

                }else{

                    $users = mysqli_query($con, "SELECT * FROM users WHERE username LIKE '%$search_query%'");
                    while($user = mysqli_fetch_assoc($users)){
                        ?>
                            <br><br><a href="profile.php?id=<?php echo $user['id'] ?>"><?php echo $user['username'] ?></a>

                        <?php
                        $id = $user['id'];
                        $profile = $user;
                        include("../../private/includes/friend_control_form.php");
                    }   

                }
            ?>
        </div>
    </div>
    


<?php
    include("../../private/includes/user_bottom.php");

?>