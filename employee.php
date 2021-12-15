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
    <link rel="stylesheet" href="style.css" />
    <title>Employee</title>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
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
        <div class="padding-table">
            <button class="btn"><a href="addEmployee.php">Add Employee</a></button>

            <table id="customers">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>Operations</th>
                </tr>
                <?php

                $sql = "SELECT * FROM employee";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $phone = $row['phone'];
                        $city = $row['city'];
                        echo '<tr>
                    <td>' . $id . '</td>
                    <td>' . $name . '</td>
                    <td>' . $email . '</td>
                    <td>' . $phone . '</td>
                    <td>' . $city . '</td>
                    <td><button class="btn"><a href="editEmployee.php?editid=' . $id . '">Edit</a></button><button class="btn"><a href="employeeDelete.php?deleteid=' . $id . '">Delete</a></button></td>
                </tr>';
                    }
                }
                ?>
            </table>
        </div>
    </div>

</body>

</html>