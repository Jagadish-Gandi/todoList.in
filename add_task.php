<?php
include ('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST["task_name"];

    // Insert task into the database
    $sql = "INSERT INTO tasks(task_name) VALUES('$task_name')";
    if ($conn->query($sql) === TRUE) {
        // Redirect to the index.php page after successful insertion
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
