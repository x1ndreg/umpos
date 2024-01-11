<?php
// include "config.php"; // Include your database connection code here.
// include "_header.php";
// session_start(); // Start the session

// if (isset($_GET['logout'])) {
//     session_destroy(); // destroy the session
//     header("Location: _signin.php"); // redirect to the login page
//     exit();
// }

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
//     $username = $_POST['user'];
//     $password = $_POST['pass'];

//     // Per authentication here (query your database).
//     $sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute([$username]);
//     $result = $stmt->fetch();

//     if ($result) {
//         $plain_password = $result['password'];

//         if ($password === $plain_password) {
//             // Authentication successful

//             $_SESSION['username'] = $username;

//             // diri unta ang modal sa succes pero dli man mogana 
//                 echo "<script>
//             swal({
//               title: 'Login Successful',
//               text: 'Welcome back, " . $username . "! You have successfully logged in.',
//               icon: 'success',
//               confirmButtonColor: '#28a745',
//               confirmButtonText: 'Continue'
//             });
//           </script>";

//             // Redirect to the profile page with the username as a URL parameter

//             header("Location: index.php");
//             exit();
//         } else {
//             // Authentication failed, set the error message
//             $error = "Invalid Username and Password";
//         }
//     } else {
//         // Authentication failed, set the error message;
//         $error = "Invalid Username and Password";
//     }
// }

include "config.php"; // Include your database connection code here.
include "_header.php";
include "hash_password.php";
session_start(); // Start the session

if (isset($_GET['logout'])) {
    
    session_destroy(); // destroy the session
    header("Location: _signin.php"); // redirect to the login page
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    // Perform authentication here (query your database).
    $sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $result = $stmt->fetch();

    if ($result) {
        $hashed_password = $result['password'];

        if (password_verify($password, $hashed_password)) {
            // Authentication successful
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        } else {
            // Authentication failed, set the error message
            $error = "Invalid Username and Password";
        }
    } else {
        // Authentication failed, set the error message
        $error = "Invalid Username and Password";
    }
}
?>

<body class="account-page">
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <div class="login-logo">
                            <img src="assets/img/UMDEM.png" alt="img">
                        </div>
                        <div class="login-userheading">
                            <h3>Sign In</h3>
                            <h4>Please login to your account</h4>
                        </div>
                        <div class="form-login">

                            <form name="form" method="POST">
                                <label>Username</label>
                                <div class="form-addons">
                                    <input type="text" name="user" placeholder="Enter your Username">
                                    <img src="assets/img/icons/mail.svg" alt="img">
                                </div>
                        </div>
                        <div class="form-login">
                            <label>Password</label>
                            <div class="pass-group">
                                <input type="password" name="pass" class="pass-input" placeholder="Enter your password">
                                <span class="fas toggle-password fa-eye-slash"></span>
                            </div>
                        </div>
                        <div class="form-login">
                            <input class="btn btn-login" type="submit" id="btn" value="Sign In" name="submit" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class="login-img">
                    <img src="assets/img/sidebanner2.png" alt="img">
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JavaScript -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php
    include "_script.php";
    ?>

    <!-- JavaScript to show the error modal -->
    <?php
    if ($error) {
        echo '<script>
            swal({
            title: "Login Failed!",
            text: "' . $error . '",
            icon: "error",
            timer: 3000,
            });
            </script>';
    }
    ?>

</body>

</html>