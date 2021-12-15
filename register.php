<?php

session_start();

error_reporting(0);

if (isset($_SESSION['user_id'])) {
  header("Location: index.php");
}
include 'connection.php';

if (isset($_POST["register"])) {
  $full_name = mysqli_real_escape_string($conn, $_POST["regi_full_name"]);
  $email = mysqli_real_escape_string($conn, $_POST["regi_email"]);
  $phone = mysqli_real_escape_string($conn, $_POST["regi_phone"]);
  $password = mysqli_real_escape_string($conn, md5($_POST["regi_password"]));
  $confirm_password = mysqli_real_escape_string($conn, md5($_POST["regi_confirm_password"]));

  $check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM users WHERE email='$email'"));
  $check_phone = mysqli_num_rows(mysqli_query($conn, "SELECT phone FROM users WHERE phone='$phone'"));

  if ($password !== $confirm_password) {
    echo "<script>alert('Password did not matched');</script>";
  } elseif ($check_email > 0) {
    echo "<script>alert('Email already exists');</script>";
  } elseif ($check_phone > 0) {
    echo "<script>alert('Phone number already exists');</script>";
  } else {
    $sql = "INSERT INTO users (full_name,email,phone,password) VALUES ('$full_name', '$email', '$phone', '$password')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $_POST["regi_full_name"] = "";
      $_POST["regi_email"] = "";
      $_POST["regi_phone"] = "";
      $_POST["regi_password"] = "";
      $_POST["regi_confirm_password"] = "";
      // echo "<script>alert('User registration successfull');</script>";
      header("Location: index.php");
    } else {
      echo "<script>alert('User registration failed');</script>";
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
  <title>Sign Up</title>
</head>

<body>
  <div class="card">
    <form action="" method="post">
      <h2 class="title">Sign up</h2>
      <div class="input-field">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Full Name" name="regi_full_name" value="<?php echo $_POST["regi_full_name"]; ?>" required />
      </div>
      <div class="input-field">
        <i class="fas fa-envelope"></i>
        <input type="email" id="email" placeholder="Email" name="regi_email" value="<?php echo $_POST["regi_email"]; ?>" required />
      </div>
      <div class="input-field">
        <i class="fas fa-phone"></i>
        <input type="tel" id="phone" name="regi_phone" placeholder="01XXXXXXXXX" pattern="[0-1]{2}[1-9]{1}[0-9]{8}" min="11" max="11" required placeholder="Phone" value="<?php echo $_POST["regi_phone"]; ?>" />
      </div>
      <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" name="regi_password" placeholder="Password minimum 6 characters " required minlength="6" maxlength="40" value="<?php echo $_POST["regi_password"]; ?>" />
      </div>
      <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" name="regi_confirm_password" placeholder="Confirm Password" required value="<?php echo $_POST["regi_confirm_password"]; ?>" />
      </div>
      <input type="submit" class="btn" name="register" value="Sign up" />
      <div class="link-margin">
        <p>Already have an account? <a class="text-link" href="index.php">Log In</a></p>
      </div>
    </form>
  </div>
</body>

</html>