<?php
    include("../../private/includes/user_top.php");

?>
    <div class="post-area">
            <div class="panel">
                <div class="panel-header">
                    Edit your Profile
                </div>
                <div class="panel-body">
                    <form action="../../private/form_actions/edit_profile.php" method="POST" enctype="multipart/form-data">

                    <img src="../images/prof_pics/<?php echo $l_profile['img'] ?> " style="max-width:200px; max-width:200px; border-radius: 50%; border: 3px solid rgb(28, 122, 211)">
                        <br><label for="profile_pic">Profile Picture: </label><input type="file" name="profile_pic"><br>
                        

                        <label class="fld-lbl" for="about">About: </label><textarea name="about" cols="30" rows="10" placeholder="Something about you" class="inp-txt"><?php echo $l_profile['about'] ?></textarea><br>
                        <label class="fld-lbl" for="facebook">Facebook: </label><input type="text" name="facebook" placeholder="Facebook" autocomplete="off" value="<?php echo $l_profile['facebook'] ?>"  class="inp-fld"><br>
                        <label class="fld-lbl" for="phone_number">Phone Number: </label><input type="text" name="phone_number" placeholder="Phone Number" autocomplete="off" value="<?php echo $l_profile['phone_number'] ?>"  class="inp-fld"><br>
                        <label class="fld-lbl" for="instagram">Instagram: </label><input type="text" name="instagram" placeholder="Instagram" autocomplete="off" value="<?php echo $l_profile['instagram'] ?>"  class="inp-fld"><br>
                        <label class="fld-lbl" for="profession">Profession: </label><input type="text" name="profession" placeholder="Profession" autocomplete="off" value="<?php echo $l_profile['profession'] ?>"  class="inp-fld"><br>
                        <label class="fld-lbl" for="education">Education: </label><input type="text" name="education" placeholder="Education" autocomplete="off" value="<?php echo $l_profile['education'] ?>"  class="inp-fld"><br>
                        <label class="fld-lbl" for="resident">Resident: </label><input type="text" name="resident" placeholder="Resident" autocomplete="off" value="<?php echo $l_profile['resident'] ?>"  class="inp-fld"><br>

                        <input type="submit" value="Change Profile" name="change_profile" class="btn-blu">

                    </form>
                </div>
            </div>
    </div>

<?php
    include("../../private/includes/user_bottom.php");
?>