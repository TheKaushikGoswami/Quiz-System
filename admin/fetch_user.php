<?php

include 'config/config.php'; // Adjust the path as necessary

if(isset($_POST['roll_no'])) {
    $roll_no = $_POST['roll_no'];
    $sql = "SELECT * FROM quiz WHERE `allocated_to` LIKE CONCAT('%', ?, '%')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $roll_no);
    $stmt->execute();
    $result = $stmt->get_result();

    $output = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $sql2 = "SELECT marks FROM $name WHERE `user_id` = ?";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param("s", $roll_no);
            $stmt2->execute();
            $result2 = $stmt2->get_result();

            while ($r = $result2->fetch_assoc()) {
                $marks = $r['marks'];
                $output[] = [$roll_no, $name, $marks];
            }
        }
        echo json_encode($output);
    } else {
        echo json_encode(["error" => "No user found with this roll number"]);
    }
} else {
    echo json_encode(["error" => "No roll number provided"]);
}
?>
