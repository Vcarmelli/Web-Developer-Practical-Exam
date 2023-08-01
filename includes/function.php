<?php

require 'db.php';


/*$numErr = $input = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["plateNum"])) {
      $numErr = "Plate Number is required";
    } else {
      $input = test_input($_POST["input-plate"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/[a-zA-Z-' 0-9]/i",$input)) {
        $numErr = "Invalid input";
      }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}*/

if(isset($_POST["action"])) {
    if ($_POST["action"] == "delete") {
        delete();
    } else if ($_POST["action"] == "update") {
        update();
    }

}

function delete() {
    global $conn;
    $data = $_POST["plateNum"];
    $sql = "DELETE FROM paint_queue WHERE plateNum = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $data);

    if (mysqli_stmt_execute($stmt)) {
        echo "Job removed from the queue.";
    } else {
        echo "Failed to remove paint job.";
    }
    mysqli_stmt_close($stmt);
} 

//080123
function update() {
    global $conn;
    $data = array(); 
    $sql = "SELECT COUNT(targColor) AS count, targColor FROM paint_queue GROUP BY targColor;";
    $result = mysqli_query($conn, $sql);
    // receive and store the data from the query in an array 
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    // convert the array into json format para ipasa sa ajax call
    $jsonResponse = json_encode($data);
    echo $jsonResponse;
}