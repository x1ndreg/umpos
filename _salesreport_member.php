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

include "config3.php";
include "fetch_products.php";

$sreport = fetchSalesReportFromDatabase();
?>

<?php include "_header.php"

?>

<body>


    <div class="main-wrapper">

        <?php

        include "_navbar.php"

        ?>
        <?php

        include "_sidebar.php"

        ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Sales List</h4>
                        <h6>Manage all sales</h6>
                    </div>
                    <!-- <div class="page-btn">
                        <a href="_addsales.php" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img" class="me-1">Add Sales</a>
                    </div> -->
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-path">
                                    <div class="search-input">
                                        <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
                                    </div>
                                    <div class="row">
                                        <select class="reportslist" id="reports" onchange="redirectToPage()">
                                            <option value="_salesreport_member.php">Sales Report Member</option>
                                            <option value="_salesreport_non-member.php">Sales Report Non-Member</option>
                                            <option value="_salesreport.php">All</option>
                                        </select>
                                    </div>

                                    <script>
                                        function redirectToPage() {
                                            var selectedValue = document.getElementById("reports").value;
                                            if (selectedValue !== "Member") {
                                                window.location.href = selectedValue;
                                            }
                                        }
                                    </script>
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

                        <div class="card" id="filter_inputs">
                            <div class="card-body pb-0">
                                <div class="reportslist">
                                    <select class="list" id="reports">
                                        <option value="member">Sales Report Member</option>
                                        <option value="non-member">Sales Report Non-Member</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Rice</th>
                                        <th>Drink</th>
                                        <th>Bread</th>
                                        <th>Desserts</th>
                                        <th>Viand</th>
                                        <th>Chips</th>
                                        <th>Biscuits</th>
                                        <th>Total</th>
                                        <th>Role</th>
                                        <th>Payment</th>
                                        <th class="text-center">Action</th> <!-- Added column for action buttons -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($sreport as $report) : ?>
                                        <?php if ($report['Role'] === 'Member') : ?>
                                            <tr>
                                                <td><?= $report['repid']; ?></td>
                                                <td><?= $report['date']; ?></td>
                                                <td><?= '₱' . $report['Rice']; ?></td>
                                                <td><?= '₱' . $report['Drink']; ?></td>
                                                <td><?= '₱' . $report['Bread']; ?></td>
                                                <td><?= '₱' . $report['Desserts']; ?></td>
                                                <td><?= '₱' . $report['Viand']; ?></td>
                                                <td><?= '₱' . $report['Chips']; ?></td>
                                                <td><?= '₱' . $report['Biscuits']; ?></td>
                                                <td><?= '₱' . $report['Total']; ?></td>
                                                <td><?= $report['Role']; ?></td>
                                                <td><?= $report['Payment']; ?></td>
                                                <td>
                                                    <!-- Delete button within a form -->
                                                    <form id="deleteForm<?= $report['repid']; ?>" action="delete_report_member.php" method="post">
                                                        <input type="hidden" name="repid" value="<?= $report['repid']; ?>">
                                                        <!-- Use an anchor tag with the delete icon as the button -->
                                                        <a href="javascript:void(0);" onclick="confirmDelete(<?= $report['repid']; ?>)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete">
                                                            <img src="assets/img/icons/delete.svg" alt="Delete">
                                                        </a>
                                                    </form>

                                                    <script>
                                                        function confirmDelete(repid) {
                                                            if (confirm("Are you sure you want to delete this report?")) {
                                                                // If the user confirms, submit the form
                                                                document.getElementById('deleteForm' + repid).submit();
                                                            }
                                                        }
                                                    </script>

                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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