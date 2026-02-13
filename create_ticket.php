<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if(isset($_POST['submit_ticket'])) {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];

    $query = "INSERT INTO tickets (user_id, title, description, priority) 
              VALUES ('$user_id', '$title', '$description', '$priority')";

    if(mysqli_query($conn, $query)) {
        echo "Ticket Created Successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Create New Ticket</h2>

<form method="POST">
    Title: <input type="text" name="title" required><br><br>
    Description: <textarea name="description" required></textarea><br><br>
    
    Priority:
    <select name="priority">
        <option value="Low">Low</option>
        <option value="Medium">Medium</option>
        <option value="High">High</option>
    </select><br><br>

    <button type="submit" name="submit_ticket">Submit Ticket</button>
</form>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
