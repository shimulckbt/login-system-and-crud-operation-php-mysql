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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="welcome.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Project</title>
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
            <button class="btn"><a href="addProject.php">Add Project</a></button>

            <table id="customers">
                <tr>
                    <th>ID</th>
                    <th>Project Name</th>
                    <th>Project Cost</th>
                    <th>Starting Date</th>
                    <th>Closing Date</th>
                    <th>Operations</th>
                </tr>
                <?php

                $sql = "SELECT * FROM project";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $project_name = $row['project_name'];
                        $cost = $row['cost'];
                        $start_date = $row['start_date'];
                        $close_date = $row['close_date'];
                        echo '<tr>
                    <td>' . $id . '</td>
                    <td>' . $project_name . '</td>
                    <td>' . $cost . '</td>
                    <td>' . $start_date . '</td>
                    <td>' . $close_date . '</td>
                    <td><button class="btn"><a href="editProject.php?editid=' . $id . '">Edit</a></button><button class="btn"><a href="deleteProject.php?deleteid=' . $id . '">Delete</a></button></td>
                </tr>';
                    }
                }
                ?>
                <!-- <tr>
                    <td>6</td>
                    <td>Alfreds Futterkiste</td>
                    <td>Maria Anders</td>
                    <td><input type="datetime-local" name="" id=""></td>
                    <td><input type="datetime-local" name="" id=""></td>
                    <td><button class="btn">Edit</button><button class="btn">Delete</button></td>
                </tr> -->
            </table>
        </div>
    </div>

</body>

</html>