<?php

include "config.php";



// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // If the username is not set in the session, you can handle it here, perhaps by redirecting the user to the login page.
    header('Location: _signin.php'); // Redirect to your login page
    exit();
}
?>

?>

<div class="header">

    <div class="header-left active">
        <a href="index.php" class="logo">
            <img src="assets/img/UMDEM.png" alt="">
        </a>
        <a href="index.php" class="logo-small">
            <img src="assets/img/umdemlogoround.png" alt="">
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

    <ul class="nav user-menu">

        <li class="nav-item">
            <div class="top-nav-search">
                <a href="javascript:void(0);" class="responsive-search">
                    <i class="fa fa-search"></i>
                </a>
                <form action="#">
                    <div class="searchinputs">
                        <input type="text" placeholder="Search Here ...">
                        <div class="search-addon">
                            <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                        </div>
                    </div>
                    <a class="btn" id="searchdiv"><img src="assets/img/icons/search.svg" alt="img"></a>
                </form>
            </div>
        </li>
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                <span class="user-img"><img src="assets/img/umdemlogoround.png" alt="">
                    <span class="status online"></span></span>
            </a>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilename">
                    <div class="profileset">
                        <!-- <span class="user-img"><img src="assets/img/profiles/avator1.jpg" alt=""> -->
                        <!-- <span class="status online"></span></span> -->
                        <div class="profilesets">
                            <h5 class="database_profile">
                                <?php echo $username; ?>
                            </h5>
                        </div>
                    </div>
                    <hr class="m-0">
                    <a class="dropdown-item" href="_profile.php"> <i class="me-2" data-feather="user"></i> My Profile</a>
                    <!-- <a class="dropdown-item" href="_generalsetting.php"><i class="me-2" data-feather="settings"></i>Settings</a> -->
                    <hr class="m-0">
                    <a class="dropdown-item logout pb-0" href="_signin.php?logout"><img src="assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
                </div>
            </div>
        </li>
    </ul>


    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="_profile.php">My Profile</a>
            <!-- <a class="dropdown-item" href="_generalsetting.php">Settings</a> -->
            <a class="dropdown-item" href="_signin.php">Logout</a>
        </div>
    </div>

</div>