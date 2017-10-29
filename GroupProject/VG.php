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
        <title>Groups List</title>
    </head>
    <body>

        <div id="wrapper">

            <!--Navigation Bar-->
            <div id="nav">
                <ul>
                <li><a href="index.php">Staff Page</a></li>
                <li><a href="AddS.php">Students</a></li>
                <li><a href="AddST.php">Staff</a></li>
                <li><a class="active" href="AddG.php">Groups</a></li>

                </ul>      
            </div>

            <!--Header-->
            <header>
                <h1>Groups List</h1>
            </header>
            
            <form method="post" >
                <label>
                <select name="Filter" id="Filter">
                  <option value="All" selected="selected">All</option>
                  <option value="1st Year">1st Year</option>
                  <option value="2nd Year">2nd Year</option>
                  <option value="3rd Year">3rd Year</option>
                  <option value="PhD">PhD</option>
                </select>
                </label>
                <label>
                <input type="submit" name="Submit" value="Submit" />
                </label>
            </form>
            
            

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
                    
                    $query = "SELECT Name, Tutor, Members, Year FROM GP_Groups ORDER BY Year ASC";
                    
                    if (isset($_POST['Filter'])){
                        
                        if ($_POST['Filter'] == 'All')
                        {
                        $query = "SELECT Name, Tutor, Members, Year FROM GP_Groups ORDER BY Year ASC";
                        }
                        elseif ($_POST['Filter'] == '1st Year')
                        {
                        $query = "SELECT Name, Tutor, Members, Year FROM GP_Groups WHERE Year='1' ORDER BY Name ASC";
                        }
                        elseif ($_POST['Filter'] == '2nd Year')
                        {
                        $query = "SELECT Name, Tutor, Members, Year FROM GP_Groups WHERE Year='2' ORDER BY Name ASC";
                        }
                        elseif ($_POST['Filter'] == '3rd Year')
                        {
                        $query = "SELECT Name, Tutor, Members, Year FROM GP_Groups WHERE Year='3' ORDER BY Name ASC";
                        }
                        elseif ($_POST['Filter'] == 'PhD')
                        {
                        $query = "SELECT Name, Tutor, Members, Year FROM GP_Groups WHERE Year='PhD' ORDER BY Name ASC";
                        }
                    }

                        $sql = mysqli_query($db, $query);
                    
                        echo "<table border='1'>
                        <tr>
                        <th>Name</th>
                        <th>Tutor</th>
                        <th>Members</th>
                        <th>Year</th>
                        </tr>";

                            while($row = mysqli_fetch_array($sql))
                            {
                            echo "<tr>";
                            echo "<td>" . $row['Name'] . "</td>";
                            echo "<td>" . $row['Tutor'] . "</td>";
                            echo "<td>" . $row['Members'] . "</td>";
                            echo "<td>" . $row['Year'] . "</td>";
                            echo "</tr>";
                            }
                            echo "</table>";

                        mysqli_close($db);
                    ?>                          

        </div>

    </body>
</html>