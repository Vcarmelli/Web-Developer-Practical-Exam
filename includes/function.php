<?php

require 'db.php';


if(isset($_POST["action"])) {
    if ($_POST["action"] == "delete") {
        delete();
    } else if ($_POST["action"] == "update") {
        update();
    }

}

function delete() {
    global $conn;
    // get the data from POST 
    $plate = $_POST[ "plateNum"]; 
    $curr = $_POST["currColor"];
    $targ = $_POST["targColor"];

    try {
        // adds the data of completed job before removing to paint_queue
        $insert = "INSERT INTO completed_jobs (plateNum, currColor, targColor) VALUES (?, ?, ?);";
        $stmt1 = mysqli_prepare($conn, $insert);   // prepare the query for db
        mysqli_stmt_bind_param($stmt1, "sss", $plate, $curr, $targ);  // adds the variable into the sql query

        if (mysqli_stmt_execute($stmt1)) {
            // will remove data if successfully added to completed table
            $sql = "DELETE FROM paint_queue WHERE plateNum = ?"; 
            $stmt2 = mysqli_prepare($conn, $sql);   // preparing query to remove the data from queue table
            mysqli_stmt_bind_param($stmt2, "s", $plate);
            mysqli_stmt_execute($stmt2);

            echo "Job removed from the queue.";
        }
        else {
            echo "Failed to remove paint job.";
        }

        die();
    } catch (Exception $e) {
        die("Query Failed: " . $e->getMessage());
    }
} 

//080123
function update() {
    global $conn;
    $data = array(); 
    $sql = "SELECT COUNT(targColor) AS count, targColor FROM completed_jobs GROUP BY targColor;";
    $result = mysqli_query($conn, $sql);
    // receive and store the data from the query in an array 
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    // convert the array into json format para ipasa sa ajax call
    $jsonResponse = json_encode($data);
    echo $jsonResponse;
}