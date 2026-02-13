<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$ticket_id = $_POST['ticket_id'];
$user_id = $_SESSION['user_id'];

$query = "DELETE FROM tickets WHERE id='$ticket_id' AND user_id='$user_id'";
mysqli_query($conn, $query);

header("Location: my_tickets.php");
?>
