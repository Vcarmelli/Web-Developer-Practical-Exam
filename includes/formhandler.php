<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numErr = "";
    $input = test_input($_POST["plateNum"]);
    if (empty($_POST["plateNum"])) {
        $numErr = "Plate Number is required";

    } 
    else if (!preg_match("/^[A-Z 0-9]+$/i", $input)) {         
        $numErr = "Invalid input";
        //2echo $numErr;
    } 
    else {
        addData();
    }
} 
else {
    // para bumalik sa page kung hindi inaaccess in a right way 
    // didn't clicked submit button instead tinype sa address
    header("Location: ../index.php"); 
}   



function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function addData() {
    try {
        require "db.php";

        $plate = $_POST["plateNum"]; 
        $curr = $_POST["currColor"];
        $targ = $_POST["targColor"];
        // to convert into sentence case before adding to db 
        // ayaw kasi gumana ng javascript pag nakasentence case yung value sa html T-T
        $curr = ucwords(strtolower($curr));
        $targ = ucwords(strtolower($targ));
        $query = "INSERT INTO paint_queue (plateNum, currColor, targColor)
                  VALUES (?, ?, ?);";
        /*
        // prepared statement to avoid injections (using PDO)
        $stmt = $pdo->prepare($query);
        $stmt->execute([$plate, $curr, $targ]);
        // clear memory
        $pdo = null;
        $stmt = null;
        */
        
        // using mysqli
        $stmt = mysqli_prepare($conn, $query);
        
        mysqli_stmt_bind_param($stmt, "sss", $plate, $curr, $targ);  // sss - means 3 strings
        mysqli_stmt_execute($stmt);



        header("Location: ../paint_jobs.php"); 
        // can use exit(); but if with connection use die()
        die();
    } catch (Exception $e) {
        die("Query Failed: " . $e->getMessage());
    }
}