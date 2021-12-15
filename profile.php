<?php
session_start();
// error_reporting(0);

// echo $_SESSION["user_id"];

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
include 'connection.php';
if (isset($_POST["submit"])) {
    $full_name = mysqli_real_escape_string($conn, $_POST["full_name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $password = mysqli_real_escape_string($conn, md5($_POST["password"]));
    $confirm_password = mysqli_real_escape_string($conn, md5($_POST["confirm_password"]));

    if ($password === $confirm_password) { {
            $sql = "UPDATE users SET full_name = '$full_name', email = '$email', phone = '$phone', password = '$password' WHERE id='{$_SESSION['user_id']}'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Profile Updated successfully.');</script>";
            } else {
                echo "<script>alert('Profile can not Updated.');</script>";
                echo  $conn->error;
            }
        }
    } else {
        echo "<script>alert('Password not matched. Please try again.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="welcome.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Profile</title>
</head>

<body>
    <div>
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
        <div class="card">
            <!-- <form action="" method="post" enctype="multipart/form-data"> -->
            <form action="" method="post">

                <!-- php script -->

                <?php
                $sql = "SELECT * FROM users WHERE id='{$_SESSION["user_id"]}'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <h2 class="title">Profile</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" placeholder="Full Name" name="full_name" value="<?php echo $row["full_name"]; ?>" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="email" placeholder="Email" name="email" value="<?php echo $row["email"]; ?>" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-phone"></i>
                            <input type="tel" id="phone" name="phone" placeholder="01XXXXXXXXX" pattern="[0-1]{2}[1-9]{1}[0-9]{8}" min="11" max="11" placeholder="Phone" value="<?php echo $row["phone"]; ?>" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" placeholder="Password minimum 6 characters " minlength="6" maxlength="50" value="<?php echo $row["password"]; ?>" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="confirm_password" placeholder="Confirm Password" value="<?php echo $row["password"]; ?>" />
                        </div>
                <?php
                    }
                }
                ?>
                <input type="submit" class="btn" name="submit" value="Update" />
            </form>
        </div>
    </div>
</body>

</html>