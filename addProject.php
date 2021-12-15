<?php
session_start();
error_reporting(0);

// echo $_SESSION["user_id"];

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
include 'connection.php';

if (isset($_POST["addproject"])) {
    $project_name = $_POST["project_name"];
    $cost = $_POST["cost"];
    $start_date = date('Y-m-d', strtotime($_POST["start_date"]));
    $close_date = date('Y-m-d', strtotime($_POST["close_date"]));

    $sql = "INSERT INTO project (project_name,cost,start_date,close_date) VALUES ('$project_name', '$cost', '$start_date', '$close_date')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_POST["project_name"] = "";
        $_POST["cost"] = "";
        $_POST["start_date"] = "";
        $_POST["close_date"] = "";
        echo "<script>alert('Employee added successfully');</script>";
        // header("Location: addEmployee.php");
    } else {
        echo "<script>alert('Employee add failed');</script>";
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
    <title>Add Project</title>
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
            <h3 class="title">Project Details</h3>
            <div class="input-field">
                <i class="fas fa-project-diagram"></i>
                <input type="text" placeholder="Project Name" name="project_name" value="<?php echo $_POST['project_name']; ?>" required />
            </div>
            <div class="input-field">
                <i class="fas fa-dollar-sign"></i>
                <input type="text" id="cost" placeholder="Amount" name="cost" value="<?php echo $_POST['cost']; ?>" required />
            </div>
            <label for="">Starting Date</label>
            <div class="input-field">
                <i class="fas fa-hourglass-start"></i>
                <input type="date" id="start_date" name="start_date" placeholder="Starting Date" required value="<?php echo $_POST['start_date']; ?>" />
            </div>
            <label for="">Closing Date</label>
            <div class="input-field">
                <i class="fas fa-hourglass-end"></i>
                <input type="date" name="close_date" placeholder="Closing Date" required value="<?php echo $_POST['close_date']; ?>" />
            </div>
            <input type="submit" class="btn" name="addproject" value="Add Project" />
        </form>
    </div>
</body>

</html>