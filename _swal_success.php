<?php
include "config.php";

if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
} 
?>
<script src="assets/js/sweetalert.min.js"></script>
<script>
    swal({
  title: "Login Successful!",
  text: "Hello <?php echo $username; ?>, Welcome Back",
  icon: "success",
  buttons: false,
  timer: 2000,
});
    </script>
  