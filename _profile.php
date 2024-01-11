<?php
include "_header.php";
include "config.php";

// Start the session to access the username if the user is logged in
session_start();

// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // If the username is not set in the session, you can handle it here, perhaps by redirecting the user to the login page.
    header('Location: _signin.php'); // Redirect to your login page
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Your HTML head content here -->
</head>

<body>
    <div class="profile-contentname">
        <h2><?php echo $username; ?></h2>
        <!-- <h4>Updates Your Photo and Personal Details.</h4> -->
    </div>
    <!-- Rest of your profile page content -->
</body>

</html>

<body>


    <div class="main-wrapper">

        <div class="header">

            <div class="header-left active">
                <a href="index.php" class="logo">
                    <img src="assets/img/umdemlogoround.png" alt="">
                </a>
                <a href="index.php" class="logo-small">
                    <img src="assets/img/logo-small.png" alt="">
                </a>
                <a id="toggle_btn" href="javascript:void(0);">
                </a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <?php

            include "_navbar.php"

            ?>

            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="_profile.php">My Profile</a>
                    <a class="dropdown-item" href="_generalsetting.php">Settings</a>
                    <a class="dropdown-item" href="_signin.php">Logout</a>
                </div>
            </div>

        </div>


        <?php

        include "_sidebar.php"

        ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Profile</h4>
                        <h6>User Profile</h6>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="profile-set">
                            <div class="profile-head">
                            </div>
                            <div class="profile-top">
                                <div class="profile-content">
                                    <div class="profile-contentimg">
                                        <img src="assets/img/umdemlogoround.png" alt="img" id="blah">
                                        <div class="profileupload">
                                            <input type="file" id="imgInp">
                                            <a href="javascript:void(0);"><img src="assets/img/icons/edit-set.svg" alt="img"></a>
                                        </div>
                                    </div>
                                    <div class="profile-contentname">
                                        <div class="profile-contentname">


                                            <h2><?php echo $username; ?></h2>
                                            <h4>Username</h4>
                                        </div>


                                    </div>
                                    <!-- <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-submit me-2">Save</a>
                                        <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php

        include "_script.php";

        ?>
</body>

</html>