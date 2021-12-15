<?php
session_start();
error_reporting(0);

// echo $_SESSION["user_id"];

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
include 'connection.php';

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
                <input type="text" placeholder="Project Name" name="full_name" value="<?php echo $_POST["regi_full_name"]; ?>" required />
            </div>
            <div class="input-field">
                <i class="fas fa-dollar-sign"></i>
                <input type="number" id="cost" placeholder="Amount" name="cost" value="<?php echo $_POST["regi_email"]; ?>" required />
            </div>
            <div class="input-field">
                <i class="fas fa-hourglass-start"></i>
                <input type="date" id="phone" name="start_date" placeholder="Starting Date" required value="<?php echo $_POST["regi_phone"]; ?>" />
            </div>
            <div class="input-field">
                <i class="fas fa-hourglass-end"></i>
                <input type="date" name="close_date" placeholder="Closing Date" required value="<?php echo $_POST["regi_password"]; ?>" />
            </div>
            <input type="submit" class="btn" name="addproject" value="Add Project" />
        </form>
    </div>
</body>

</html>