<?php
session_start();
error_reporting(0);

// echo $_SESSION["user_id"];

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
include 'connection.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM employee WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location: employee.php');
    } else {
        echo "<script>alert('Employee deletion failed');</script>";
    }
}
