<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="welcome.css" />
    <title>Sign Up</title>
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