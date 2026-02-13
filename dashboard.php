<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Welcome to Dashboard</h2>

<p>You are logged in.</p>

<a href="create_ticket.php">Create Ticket</a><br><br>

<a href="my_tickets.php">My Tickets</a><br><br>

<a href="logout.php">Logout</a>

</body>
</html>
