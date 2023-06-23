<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_id = $_POST["task_id"];
    $task_name = $_POST["task_name"];

    // Update task in the database
    $sql = "UPDATE tasks SET task_name='$task_name' WHERE id=$task_id";
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
