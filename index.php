<?php
session_start();



// Check if the username session variable is not set
if (!isset($_SESSION['username'])) {
    // Redirect to the login page
    header("Location: _signin.php");
    exit();
}

include "_header.php";
?>
<?php
session_start();

// Check if the swal_success_shown session variable is not set
if (!isset($_SESSION['swal_success_shown'])) {
  // Include the SweetAlert modal file
  include "_swal_success.php";

  // Set the swal_success_shown session variable to true
  $_SESSION['swal_success_shown'] = true;
}
?>
<body>

    <div class="main-wrapper">

        <?php
        include "_navbar.php";
        include "_sidebar.php";
        include "_dashboardcontent.php";
        ?>

    </div>

    <?php
    include "_script.php";
    ?>
</body>

</html>