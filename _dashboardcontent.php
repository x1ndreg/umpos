<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <?php

            $sql = "SELECT COUNT(*) as member_count FROM members";

            // Prepare the SQL statement
            $stmt = $pdo->prepare($sql);

            // Execute the statement
            $stmt->execute();

            // Fetch the result
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Get the member count
            $memberCount = $result['member_count'];
            ?>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash1">
                    <div class="dash-widgetimg">
                        <span><img src="assets/img/icons/dash2.svg" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>₱<span class="counters" data-count="23423">₱</span></h5>
                        <h6>Commulative Sales</h6>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget">
                    <div class="dash-widgetimg">
                        <span><img src="assets/img/icons/dash1.svg" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>$<span class="counters" data-count="23423">₱</span></h5>
                        <h6>Commulative Sales</h6>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash2">
                    <div class="dash-widgetimg">
                        <span><img src="assets/img/icons/dash3.svg" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>$<span class="counters" data-count="23423">₱</span></h5>
                        <h6>placeholder</h6>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash3">
                    <div class="dash-widgetimg">
                        <span><img src="assets/img/icons/dash1.svg" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>₱<span class="counters" data-count="2423">₱</span></h5>
                        <h6>placeholder</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count">
                    <div class="dash-counts">
                        <h4>Members</h4>
                        <h5><span class="counters" data-count="<?= $memberCount; ?>"></span</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="user-check"></i>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das1">
                    <div class="dash-counts">
                        <h4>Non-Members</h4>
                        <h5>placeholder</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="user"></i>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das2">
                    <div class="dash-counts">
                        <h4>Total Sales</h4>
                        <h5>₱<span class="counters" data-count="6351"></span></h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="dollar-sign"></i>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das3">
                    <div class="dash-counts">
                        <h4>Total Users</h4>
                        <h5>placeholder</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="file"></i>
                    </div>
                </div>
            </div> -->
        </div>

        <!-- for analytics chart  -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Horizontal Stacked Bar Chart</div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-wrapper-demo">
                            <canvas id="chartStacked1" class="h-500" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Pie Chart</div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-wrapper-demo">
                            <canvas id="chartPie1" class="h-300" width="490" height="450" style="display: block; box-sizing: border-box; height: 300px; width: 326.667px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>