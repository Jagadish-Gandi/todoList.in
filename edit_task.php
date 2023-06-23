<?php
include ('config.php');

// Assuming you have the task ID from a query parameter or a form submission
$task_id = $_GET["id"];

// Retrieve the task from the database based on the task ID
$sql = "SELECT * FROM tasks WHERE id = $task_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $task_name = $row['task_name'];
} else {
    // Handle the case when the task with the provided ID is not found
    echo "Task not found";
    exit;
}

$conn->close();
?>

<!-- Render the form with the task name -->
<form action="update_task.php" method="POST">
    <input type="hidden" name="task_id" value="<?php echo $task_id; ?>">
    <input type="text" name="task_name" value="<?php echo $task_name; ?>" required>
    <button type="submit">Update Task</button>
</form>
