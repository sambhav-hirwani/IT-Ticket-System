<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM tickets WHERE user_id='$user_id' ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Tickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>My Tickets</h2>

<table class="table table-bordered table-striped">
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Priority</th>
        <th>Status</th>
        <th>Created At</th>
        <th>Delete</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo $row['priority']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td><?php echo $row['created_at']; ?></td>
        <td>
            <form method="POST" action="delete_ticket.php">
            <input type="hidden" name="ticket_id" value="<?php echo $row['id']; ?>">
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>

    </tr>
    <?php } ?>

</table>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
