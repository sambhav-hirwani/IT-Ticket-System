<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

$query = "SELECT tickets.*, users.name 
          FROM tickets 
          JOIN users ON tickets.user_id = users.id 
          ORDER BY created_at DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="container mt-5">

<h2>Admin - All Tickets</h2>

<table class="table table-bordered table-striped">
    <tr>
        <th>User</th>
        <th>Title</th>
        <th>Description</th>
        <th>Priority</th>
        <th>Status</th>
        <th>Update</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo $row['priority']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td>
            <form method="POST" action="update_status.php">
                <input type="hidden" name="ticket_id" value="<?php echo $row['id']; ?>">
                <select name="status">
                    <option value="Open">Open</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Closed">Closed</option>
                </select>
                <button type="submit">Update</button>
            </form>
        </td>
    </tr>
    <?php } ?>

</table>

<br>
<a href="logout.php">Logout</a>

</body>
</html>
