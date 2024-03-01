<?php

include 'config/config.php'; // Adjust the path as necessary

if(isset($_POST['roll_no'])) {
    $roll_no = $_POST['roll_no'];
    $sql = "SELECT * FROM `users` WHERE `roll_no` = ?";
    // $sql = "SELECT * FROM quiz ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $roll_no);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "No user found with this roll number"]);
    }
}
?>
