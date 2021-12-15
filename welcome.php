<?php
session_start();

// echo $_SESSION["user_id"];

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
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
    <title>Home</title>
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
    <!-- Navbar -->
    <div>
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
        <div class="flex-table">
            <div>
                <button>Add Employee</button>

                <table id="customers">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Operations</th>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Alfreds Futterkiste</td>
                        <td>Maria Anders</td>
                        <td>Germany</td>
                        <td><button>Edit</button><button>Delete</button></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Berglunds snabbköp</td>
                        <td>Christina Berglund</td>
                        <td>Sweden</td>
                        <td><button>Edit</button><button>Delete</button></td>

                    </tr>
                </table>
            </div>
            <div>
                <button>Add Project</button>

                <table id="customers">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Cost</th>
                        <th>Start Date</th>
                        <th>Operations</th>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Alfreds Futterkiste</td>
                        <td>Maria Anders</td>
                        <td>Germany</td>
                        <td><button>Edit</button><button>Delete</button></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Berglunds snabbköp</td>
                        <td>Christina Berglund</td>
                        <td>Sweden</td>
                        <td><button>Edit</button><button>Delete</button></td>

                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>