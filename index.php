<!DOCTYPE html>
<html>
<head>
    <title>Todo List Application</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="todoList.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Todo List Application</h1>
        <form action="add_task.php" method="POST" class="mt-4">
            <div class="input-group">
                <input type="text" name="task_name" class="form-control" placeholder="Enter task name" required>
                <button type="submit" class="btn btn-primary">Add Task</button>
            </div>
        </form>
        
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Task Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP code to fetch and display tasks from the database will go here -->
                <!-- PHP code to fetch and display tasks from the database will go here -->
                <?php
include('config.php');

if (isset($_GET['id'])) {
    $task_id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id = $task_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $completed = $row['completed'];
        $newStatus = $completed ? 0 : 1;
        $updateSql = "UPDATE tasks SET completed = $newStatus WHERE id = $task_id";
        $conn->query($updateSql);
    }
}

$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $task_id = $row['id'];
        $task_name = $row['task_name'];
        $completed = $row['completed'];
        $status = $completed ? '<i class="fas fa-check-circle"></i>' : '<i class="far fa-circle"></i>';
        $taskClass = $completed ? 'completed-task' : '';

        echo "<tr class='$taskClass'>";
        echo "<td>$task_name</td>";
        echo "<td><a href='index.php?id=$task_id' class='status-toggle'>$status</a></td>";
        echo "<td class='actions'>
                <a href='edit_task.php?id=$task_id' class='btn btn-primary btn-sm'>Edit</a>
                <a href='delete_task.php?id=$task_id' class='btn btn-danger btn-sm'>Delete</a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No tasks found.</td></tr>";
}
$conn->close();
?>



            </tbody>
        </table>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
