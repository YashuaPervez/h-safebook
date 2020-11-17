<?php
    include("../private/ini.php");

    if($l_user){

        header("location: user/index.php");

    }

    if(isset($_SESSION['login_error'])){

        echo "<br>" . $_SESSION['login_error'];

    }

    if(isset($_SESSION['loggedin_user'])){


    }

    //print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Larkost | Login</title>
</head>
<body>
    
    <div class="form-box">
        <div class="form-header">
            <h1>Larkost</h1> <p>Login</p>
        </div>
        <div class="form-body">
            <form action="../private/form_actions/login_user.php" method="POST">

                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Email" autocomplete="off"><br>

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password">

                <input type="submit" value="Login" name="login">



            </form>
        </div>
    </div>

</body>
</html>