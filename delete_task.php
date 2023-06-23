<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $task_id = $_GET["id"];

    // Delete the task from the database
    $sql = "DELETE FROM tasks WHERE id=$task_id";
    if ($conn->query($sql) === TRUE) {
        // Redirect to the index.php page after successful deletion
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
