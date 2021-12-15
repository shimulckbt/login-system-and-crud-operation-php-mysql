<?php
session_start();
error_reporting(0);
// echo $_SESSION["user_id"];

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
include 'connection.php';

if (isset($_POST["addemployee"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $city = mysqli_real_escape_string($conn, $_POST["city"]);

    $check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM employee WHERE email='$email'"));
    $check_phone = mysqli_num_rows(mysqli_query($conn, "SELECT phone FROM employee WHERE phone='$phone'"));

    if ($check_email > 0) {
        echo "<script>alert('Email already exists');</script>";
    } elseif ($check_phone > 0) {
        echo "<script>alert('Phone number already exists');</script>";
    } else {
        $sql = "INSERT INTO employee (name,email,phone,city) VALUES ('$name', '$email', '$phone', '$city')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_POST["name"] = "";
            $_POST["email"] = "";
            $_POST["phone"] = "";
            $_POST["city"] = "";
            echo "<script>alert('Employee added successfully');</script>";
            // header("Location: addEmployee.php");
        } else {
            echo "<script>alert('Employee add failed');</script>";
        }
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
            <h2 class="title">Employee Details</h2>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Full Name" name="name" value="<?php echo $_POST["name"]; ?>" required />
            </div>
            <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="email" id="email" placeholder="Email" name="email" value="<?php echo $_POST["email"]; ?>" required />
            </div>
            <div class="input-field">
                <i class="fas fa-phone"></i>
                <input type="tel" id="phone" name="phone" placeholder="01XXXXXXXXX" pattern="[0-1]{2}[1-9]{1}[0-9]{8}" min="11" max="11" required placeholder="Phone" value="<?php echo $_POST["phone"]; ?>" />
            </div>
            <div class="input-field">
                <i class="fas fa-city"></i>
                <input type="text" name="city" placeholder="Enter city name" required value="<?php echo $_POST["city"]; ?>" />
            </div>
            <input type="submit" class="btn" name="addemployee" value="Add Employee" />
        </form>
    </div>
</body>

</html>