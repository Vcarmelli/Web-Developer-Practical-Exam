<?php
    include './includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer src="script.js"></script>
    <title>Paint Jobs</title>
</head>
<body>
    <header class="main-header">
        <div>
            <h1 class="header-title">JUAN'S AUTO PAINT</h1>
            <nav class="nav main-nav"> 
                <ul>
                    <li><a href="index.php">NEW PAINT JOB</a></li>
                    <li><a href="paint_jobs.php">PAINT JOBS</a></li>
                </ul>
            </nav>
        </div>
        
    </header>
    <h2 class="web-title">Paint Jobs</h2>
    <div class="inprogress-performance">
        <div>
            <span class="div-title">Paint Jobs in Progress</span>
            <table id="jobs-table" class="table">
                <thead class="table-header">
                    <tr>
                        <th>Plate No.</th>
                        <th>Current Color</th>
                        <th>Target Color</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php
                        $sql = "SELECT * FROM paint_queue LIMIT 5";
                        $rows = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($rows)) { ?>
                            <tr class="job-row">
                                <td><?php echo $row["plateNum"]; ?></td>
                                <td><?php echo $row["currColor"]; ?></td>
                                <td><?php echo $row["targColor"]; ?></td>
                                <td><a href='#' class="action" 
                                    onclick="submitData('<?php echo $row['plateNum']; ?>', '<?php echo $row['currColor']; ?>', '<?php echo $row['targColor']; ?>');">
                                    Mark as Completed</a></td>
                            </tr>           
                        <?php }
                    ?>
                    <!-- <tr>
                        <td>XSA 723</td>
                        <td>Blue</td>
                        <td>Green</td>
                        <td class="action">Mark as Completed</td>
                    </tr>
                    <tr>
                        <td>ABS 092</td>
                        <td>Red</td>
                        <td>Blue</td>
                        <td class="action">Mark as Completed</td>
                    </tr>
                    <tr>
                        <td>JSL 110</td>
                        <td>Red</td>
                        <td>Green</td>
                        <td class="action">Mark as Completed</td>
                    </tr> 
                    <tr>
                        <td>XHJ 133</td>
                        <td>Green</td>
                        <td>Blue</td>
                        <td class="action">Mark as Completed</td>
                    </tr>
                    <tr>
                        <td>HSU 005</td>
                        <td>Blue</td>
                        <td>Red</td>
                        <td class="action">Mark as Completed</td>
                    </tr> -->
                </tbody>           
            </table>
        </div>
        <div class="shop-performance">
            <span class="perf-title">SHOP PERFORMANCE</span>
            <div class="performance-deets">
                <div class="perf-details">
                    <div class="bd-total">
                        <span class="perf-details-total">Total Cars Painted:</span>
                        <span class="perf-num"> </span>
                    </div>                       
                </div>
                <div class="perf-details">
                    <span class="perf-details">Breakdown:</span>
                    <div class="bd-blue"> 
                        <span class="perf-details-bd">Blue</span>
                        <span class="perf-blue"> </span>
                    </div>
                    <div class="bd-red"> 
                        <span class="perf-details-bd">Red</span>
                        <span class="perf-red"> </span>
                    </div>
                    <div class="bd-green"> 
                        <span class="perf-details-bd">Green</span>
                        <span class="perf-green"> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <h4 class="div-title">Paint Queue</h4>
        <table class="table">
            <thead class="table-header">
                <tr>
                    <th>Plate No.</th>
                    <th>Current Color</th>
                    <th>Target Color</th>
                </tr>
            </thead>
            <tbody>
                 <?php
                    $sql = "SELECT * FROM paint_queue";
                    $rows = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($rows)) { ?>
                        <tr class="job-row2">
                            <td><?php echo $row["plateNum"]; ?></td>
                            <td><?php echo $row["currColor"]; ?></td>
                            <td><?php echo $row["targColor"]; ?></td>
                        </tr>           
                    <?php }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>