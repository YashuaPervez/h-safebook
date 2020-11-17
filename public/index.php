<?php
    include("../private/ini.php");

    if($l_user){

        header("location: user/index.php");

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Larkost</title>
</head>
<body>

    <div class="form-box">
        <div class="form-header">
            <h1>Larkost</h1> <p>Register Here!!!</p>
        </div>
        <div class="form-body">
            <form action="../private/form_actions/register_user.php" method="POST">
            
                <label for="username">Username: </label>
                <input type="text" name="username" placeholder="Username" autocomplete="off"><br>

                <label for="email">Email: </label>
                <input type="email" name="email" placeholder="Email"  autocomplete="off"><br>

                <label for="password">Password: </label>
                <input type="password" name="password" placeholder="Password" ><br>

                <input type="submit" value="Register!!!" name="register">

            </form>
        </div>
    </div>
    
</body>
</html>