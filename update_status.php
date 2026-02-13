<?php
session_start();
include 'db.php';

if($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

$ticket_id = $_POST['ticket_id'];
$status = $_POST['status'];

$query = "UPDATE tickets SET status='$status' WHERE id='$ticket_id'";
mysqli_query($conn, $query);

header("Location: admin_dashboard.php");
?>
