<?php require('config.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Geecs Magazine</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

        <!--Style Sheet-->
        <link rel="stylesheet" type="text/css" href="Hstyle.css">

    </head> 

    <body>
        <!--Navigation Bar-->
        <div id="nav">
            <ul>
                <li><a class="active" href="Login.php">Login</a></li>
            </ul>      
        </div>
        <!--Header-->
        <header>
            <h3><br><br>The Bradford</h3>
            <h1>gEECS</h1>
            <h2>Magazine</h2>
        </header>

            <div>
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
                    $stmt = $db->query('SELECT Name, Tutor, Members FROM GP ORDER BY ID ASC');

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
