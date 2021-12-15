<?php
session_start();
// error_reporting(0);

// echo $_SESSION["user_id"];

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="welcome.css" />
    <title>Employee</title>
</head>

<body>
    <header>
        <h1 id="nav-title"><a href="welcome.php">EMS.ME</a></h1>
        <nav>
            <ul>
                <li><a class="text-link" href="employee.php">Employee</a></li>
                <li><a class="text-link" href="project.php">Project</a></li>
                <li><a class="text-link" href="profile.php">Profile</a></li>
                <li><a class="text-link" href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <h3>hello employee</h3>
</body>

</html>