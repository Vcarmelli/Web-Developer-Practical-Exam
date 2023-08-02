<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js" defer></script>
    <title>New Paint Jobs</title>
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
    <div class="main-div">
        <h2 class="web-title">New Paint Job</h2>
        <div class="car-image">
            <img id="current-car" class="current-color" src="/images/Default.png">
            <img class="shape" src="/images/shape.png">
            <img id="target-car" class="target-color" src="/images/Default.png">
        </div>
        <h4 class="div-title">Car Details</h4>
        <form class="form" method="post" action="includes/formhandler.php"> 
            <div>
                <div class="details">
                    <span class="form-title">Plate No.</span>
                    <input id="plateNum" class="form-input" name="plateNum" type="text" autocomplete="off" autofocus placeholder="XXX 0000"></input>
                    <span class="error">* <?php echo isset($numErr) ? $numErr : ''; ?></span> <br><br>
                </div>
                <div class="details">
                    <span class="form-title">Current Color</span>
                    <select  id="current-select" class="form-input" name="currColor">
                        <option value="default"></option>
                        <option value="red">Red</option>
                        <option value="green">Green</option>
                        <option value="blue">Blue</option>
                    </select>
                </div>
                <div class="details">
                    <span class="form-title">Target Color</span>
                    <select id="target-select" class="form-input" name="targColor">
                        <option value="default"></option>
                        <option value="red">Red</option>
                        <option value="green">Green</option>
                        <option value="blue">Blue</option>
                    </select>
                </div>
            </div>
            <button class="btn" type="submit">Submit</button>
        </form>  
    </div>

</body>
</html>
