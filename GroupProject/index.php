<!doctype html>
<html lang="en">
    <head>
        <!--Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <!--Style Sheet-->
        <link rel="stylesheet" type="text/css" href="AddStyle.css">

        <meta charset="utf-8">
        <title>Staff Page</title>
    </head>
    <body>

        <div id="wrapper">

            <!--Navigation Bar-->
            <div id="nav">
                <ul>
                <li><a href="Home.php">Logout</a></li>
                <li><a class="active" href="index.php">Staff Page</a></li>
                <li><a href="AddS.php">Add Student</a></li>
                <li><a href="AddST.php">Add Staff</a></li>
                <li><a href="AddG.php">Add Group</a></li>

                </ul>      
            </div>

            <!--Header-->
            <header>
                <h1>Staff Page</h1>
            </header>

                <?php
                $servername = "lamp.scim.brad.ac.uk";
                $username = "lpcovaje";
                $password = "Alegria3";
                $dbname = "lpcovaje";

                // Create connection
                    $db = mysqli_connect($servername, $username, $password, $dbname);
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    $stmt = $db->query('SELECT Name, Tutor, Members FROM GP_Groups ORDER BY ID ASC');

                        echo "<table border='1'>
                        <tr>
                        <th>Group Name</th>
                        <th>Tutor</th>
                        <th>Members</th>
                        </tr>";

                            while($row = mysqli_fetch_array($stmt))
                            {
                            echo "<tr>";
                            echo "<td>" . $row['Name'] . "</td>";
                            echo "<td>" . $row['Tutor'] . "</td>";
                            echo "<td>" . $row['Members'] . "</td>";
                            echo "</tr>";
                            }
                            echo "</table>";

                        mysqli_close($db);
                    ?>                          

        </div>

    </body>
</html>
