<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $task_id = $_GET["id"];

    // Update the completed status of the task in the database
    $sql = "UPDATE tasks SET completed = 1 WHERE id=$task_id";
    if ($conn->query($sql) === TRUE) {
        // Redirect to the index.php page after successful update
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
