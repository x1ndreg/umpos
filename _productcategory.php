<?php

include "_header.php"

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
                        <h4>Products</h4>
                        <h6>List of Products</h6>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="requiredfield">
                            <h4>Encode the products</h4>
                        </div>
                        <div class="form-group">
                            <label>Product Name</label>
                            <div class="input-groupicon">
                                <input type="text" placeholder="Please type product code and select...">
                                <div class="addonset">
                                    <!-- <img src="assets/img/icons/scanners.svg" alt="img"> -->
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table-height">
                            <!-- <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>SKU</th>
                                        <th>Qty</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Macbook pro</td>
                                        <td>PT001</td>
                                        <td>100.00</td>
                                        <td class="text-end">
                                            <a class="delete-set"><img src="assets/img/icons/delete.svg" alt="img"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Apple Earpods </td>
                                        <td>PT002</td>
                                        <td>1000.00</td>
                                        <td class="text-end">
                                            <a class="delete-set"><img src="assets/img/icons/delete.svg" alt="img"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Macbook Pro</td>
                                        <td>PT003</td>
                                        <td>5000.00</td>
                                        <td class="text-end">
                                            <a class="delete-set"><img src="assets/img/icons/delete.svg" alt="img"></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table> -->
                        </div>
                        <div class="row">
                            <!-- <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Paper Size</label>
                                    <select class="select">
                                        <option>36mm (1.4 inch)</option>
                                        <option>12mm (1 inch)</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-lg-12">
                                <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
                                <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="scanner" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Barcode</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-barcode">
                        <ul>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="assets/img/barcode1.png" alt="img"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-print"><img src="assets/img/icons/printer.svg" alt="img">Print</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/owlcarousel/owl.carousel.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>