<?php

require 'db.php';
$numErr = $input = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["input-plate"])) {
      $numErr = "Plate Number is required";
    } else {
      $input = test_input($_POST["input-plate"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' 0-9]*$/",$input)) {
        $numErr = "Invalid input";
      }
    }
}


if(isset($_POST["action"])) {
    if($_POST["action"] == "delete") {
        delete();
    }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


function delete() {
    global $conn;
    $data = $_POST["action"];
    $sql = "DELETE FROM paintjobs WHERE plateNum = '$data';";
    mysqli_query($conn, $sql);
    echo "REMOVED from the QUEUE";
}
