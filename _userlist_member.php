<?php
// Start the session to access the username if the user is logged in
session_start();

// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // If the username is not set in the session, redirect to the login page
    header('Location: _signin.php');
    exit();
}

include "_header.php";

try {
    // Database configuration
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'pos_users';

    // Connect to the MySQL database using PDO
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Your SQL query to fetch data from the members table
    $sql = "SELECT * FROM members";
    $stmt = $pdo->query($sql);

    // Fetch all the rows as an associative array
    $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

?>
<?php

include "alerts.php";

?>

<!DOCTYPE html>
<html lang="en">

<body>

    <div class="main-wrapper">
        <?php include "_navbar.php" ?>

        <?php include "_sidebar.php" ?>

        <!-- page content  -->
        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Users List Member</h4>
                        <h6>Manage your User</h6>
                    </div>
                    <div class="page-btn">
                        <button type="button" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            <img src="assets/img/icons/plus.svg" alt="img"> Add User
                        </button>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-path">
                                </div>
                                <div class="search-input">
                                    <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
                                </div>
                            </div>
                            <div class="wordset">
                                <ul>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="assets/img/icons/printer.svg" alt="img"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Added On</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <?php foreach ($members as $member) : ?>
                                    <tr>
                                        <td><!-- Add your checkbox input here if needed --></td>
                                        <td><?= $member['id']; ?></td>
                                        <td><?= $member['name']; ?></td>
                                        <td><?= $member['phone']; ?></td>
                                        <td><?= $member['email']; ?></td>
                                        <td><?= $member['added_on']; ?></td>
                                        <td><!-- Add member status if available --></td>
                                        <td>
                                            <a href="javascript:void(0);" onclick="showEditModal(<?= $member['id']; ?>)" class="btn btn-edit" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit">
                                                <img src="assets/img/icons/edit.svg" alt="Edit" />
                                            </a>

                                            <a href="javascript:void(0);" onclick="confirmDelete(<?= $member['id']; ?>)" class="btn btn-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete">
                                                <img src="assets/img/icons/delete.svg" alt="Delete" />
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Set the form action to the PHP script that handles the form submission -->
                    <form action="save_user.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= isset($member['name']) ? $member['name'] : ''; ?>">

                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" class="form-control" id="phone" name="phone" value="<?= isset($member['phone']) ? $member['phone'] : ''; ?>">

                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= isset($member['email']) ? $member['email'] : ''; ?>">

                            <label for="aon" class="form-label">Added on</label>
                            <input type="date" class="form-control" id="aon" name="added_on" value="<?= isset($member['added_on']) ? $member['added_on'] : ''; ?>">
                        </div>
                        <!-- Add other form fields as needed -->
                        <button type="submit" class="btn btn-primary">Save User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="update_member.php" method="POST">
                        <input type="hidden" id="editMemberId" name="id">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>

                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" class="form-control" id="phone" name="phone" required>

                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>

                            <label for="aon" class="form-label">Added on</label>
                            <input type="date" class="form-control" id="aon" name="added_on" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showEditModal(id) {
            // Make an AJAX request to fetch member data
            $.ajax({
                url: 'get_member_data.php',
                method: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    // Populate the modal with the fetched data
                    $('#editUserModal #name').val(data.name);
                    $('#editUserModal #phone').val(data.phone);
                    $('#editUserModal #email').val(data.email);
                    $('#editUserModal #aon').val(data.added_on);

                    // Set the member ID in the form
                    $('#editUserModal #editMemberId').val(data.id);

                    // Open the edit modal
                    $('#editUserModal').modal('show');
                },
                error: function() {
                    alert('Error fetching member data.');
                }
            });
        }

        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this user?")) {
                window.location.href = "delete_member.php?id=" + id;
            }
        }
    </script>


    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>