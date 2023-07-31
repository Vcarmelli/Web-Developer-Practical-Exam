<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plate = $_POST[ "plateNum"]; 
    $curr = $_POST["currColor"];
    $targ = $_POST["targColor"];

    // to convert into sentence case before adding to db 
    // ayaw kasi gumana ng javascript pag nakasentence case yung value sa html T-T
    $plate = ucwords(strtolower($plate));
    $curr = ucwords(strtolower($curr));
    $targ = ucwords(strtolower($targ));

    try {
        require_once "db.php";
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

        header("Location: ../index.php"); 
        // can use exit(); but if with connection use die()
        die();
    } catch (Exception $e) {
        die("Query Failed: " . $e->getMessage());
    }
} 
else {
    // para bumalik sa page kung hindi inaaccess in a right way 
    // didn't clicked submit button instead tinype sa address
    header("Location: ../index.php"); 
}   