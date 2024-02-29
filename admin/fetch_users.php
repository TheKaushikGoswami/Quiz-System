<?php

include 'config/config.php';

if(isset($_POST['course']) && isset($_POST['year'])) {
    $course = $_POST['course'];
    $year = $_POST['year'];

    $query = "SELECT * FROM users WHERE course = '$course' AND year = '$year'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        echo "<table class='table' style='border-collapse: collapse; width: 100%; text-align: center' align='center'>";
        echo "<tr><th>Roll No</th><th>Name</th><th>Allotment</th></tr>";
        $i = 0;
        while($row = $result->fetch_assoc()) {

            echo "<tr><td>" . $row["roll_no"]. "</td><td>" . $row["name"]. "</td><td><input style='width:25px;height: 25px;' type='checkbox' name='allotment[]' value='" . $row["roll_no"] . "'></td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
} else {
    echo "No data received.";
}


?>
