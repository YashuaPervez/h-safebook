<?php

    include("../../private/ini.php");

    if(!$l_user){

        header("location: ../login.php");

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="../icons/css/all.min.css">
    <script src="../js/jquery.js"></script>
    <title>Larkost</title>
</head>
<body>
    
    <div class="container">
        <div class="header">
            <div class="header-logo">
                Larkost
            </div>
            <div class="user-search">
                <form action="search.php" method="GET">
                    <input type="text" name="search_query" class="user-search-field">
                    <button class="user-search-button">Search</button>
                </form>
            </div>
            <div class="header-controls">
                <ul>

                    <li>
                        <button><i class="fas fa-cog"></i></button>
                        <ul class="header-tab header-tab-control">
                            <li><a href="friends.php">Friends <i class="fas fa-user-friends"></i></a> </li>
                            <li><a href="logout.php">Logout <i class="fas fa-sign-out-alt"></i></a></li>
                        </ul>
                    </li>

                    <li>
                        <button><i class="fas fa-bell"></i></button>
                        <ul class="header-tab header-tab-notifications">
                            <h3>Notifications</h3>
                        </ul>
                    </li>

                    <li>
                        <button><i class="fas fa-comments"></i></button>
                        <ul class="header-tab header-tab-messages">
                            <h3>Messages</h3>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main">

            <div class="user-control">
                <h2>Quick Access</h2><br>
                <ul>
                    <li><a href="index.php">News Feed</a></li>
                    <li><a href="edit_profile.php">Edit Profile</a></li>
                </ul>
                <br>
                
                
            </div>