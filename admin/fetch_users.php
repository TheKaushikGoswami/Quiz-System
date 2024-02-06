<?php

include 'config/config.php';

if(isset($_POST['course']) && isset($_POST['year'])) {
    $course = $_POST['course'];
    $year = $_POST['year'];

    $query = "SELECT * FROM users WHERE course = '$course' AND year = '$year'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        echo "<table style='border-collapse: collapse; width: 100%; text-align: center' align='center'>";
        echo "<tr><th style='border: 1px solid white; color: white;'>Roll No</th><th style='border: 1px solid white; color: white;'>Name</th><th style='border: 1px solid white; color: white;'>Allotment</th></tr>";
        while($row = $result->fetch_assoc()) {

            echo "<tr><td>" . $row["roll_no"]. "</td><td>" . $row["name"]. "</td><td><input type='checkbox' name='allotment' value='" . $row["roll_no"] . "'></td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
} else {
    echo "No data received.";
}


?>
