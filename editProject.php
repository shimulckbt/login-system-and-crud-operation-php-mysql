<?php
session_start();
error_reporting(0);
// echo $_SESSION["user_id"];

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
include 'connection.php';

$id = $_GET['editid'];

$sql = "SELECT * FROM project WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$project_name = $row['project_name'];
$cost = $row['cost'];
$start_date = $row['start_date'];
$close_date = $row['close_date'];

if (isset($_POST["edit_project"])) {
    $project_name = mysqli_real_escape_string($conn, $_POST["project_name"]);
    $cost = mysqli_real_escape_string($conn, $_POST["cost"]);
    $start_date = mysqli_real_escape_string($conn, $_POST["start_date"]);
    $close_date = mysqli_real_escape_string($conn, $_POST["close_date"]);

    $sql = "UPDATE employee SET id=$id,name='$name',email='$email',phone='$phone',city='$city' WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Project updated successfully');</script>";
        // header("Location: addProject.php");
    } else {
        echo "<script>alert('Project update failed');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="welcome.css" />
    <title>Add Employee</title>
</head>

<body>
    <header>
        <h1 id="nav-title"><a href="welcome.php">EMS.ME</a></h1>
        <nav>
            <ul>
                <li><a href="employee.php">Employee</a></li>
                <li><a href="project.php">Project</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="card">
        <form action="" method="post">
            <h2 class="title">Edit Project</h2>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Full Name" name="project_name" value="<?php echo $project_name; ?>" required />
            </div>
            <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="text" id="cost" placeholder="Amount" name="cost" value="<?php echo $cost; ?>" required />
            </div>
            <label for="">Starting Date</label>
            <div class="input-field">
                <i class="fas fa-hourglass-start"></i>
                <input type="date" id="start_date" name="start_date" placeholder="Starting Date" required value="<?php echo $start_date; ?>" />
            </div>
            <label for="">Closing Date</label>
            <div class="input-field">
                <i class="fas fa-hourglass-end"></i>
                <input type="date" id="close_date" name="close_date" placeholder="Closing Date" required value="<?php echo $close_date; ?>" />
            </div>
            <input type="submit" class="btn" name="edit_project" value="Update" />
        </form>
    </div>
</body>

</html>