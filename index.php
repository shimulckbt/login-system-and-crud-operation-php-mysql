<?php

session_start();

error_reporting(0);
// echo $_SESSION["user_id"];

if (isset($_SESSION['user_id'])) {
    header("Location: welcome.php");
}
include 'connection.php';

if (isset($_POST["login"])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, md5($_POST["password"]));

    $check_email = mysqli_query($conn, "SELECT id FROM users WHERE email='$email' AND password = '$password'");

    if (mysqli_num_rows($check_email) > 0) {
        $row = mysqli_fetch_assoc($check_email);
        $_SESSION["user_id"] = $row['id'];
        header("Location: welcome.php");
    } else {
        echo "<script>alert('Login details incorrect');</script>";
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
    <title>Sign In</title>
</head>

<body>
    <div class="card">
        <form action="" method="post">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email Address" value="<?php echo $_POST["email"]; ?>" required />
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" value="<?php echo $_POST["password"]; ?>" required />
            </div>
            <input type="submit" value="login" name="login" class="btn solid" />
            <div class="link-margin">
                <p>Dont Have an account? <a class="text-link" href="register.php">Register</a></p>
            </div>
        </form>
    </div>
</body>

</html>