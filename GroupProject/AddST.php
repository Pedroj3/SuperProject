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
        <link rel="stylesheet" type="text/css" href="AddStyle.css">

    </head> 

    <body>
        <!--Navigation Bar-->
        <div id="nav">
            <ul>
                <li><a href="Home.php">Home</a></li>
                <li><a href="index.php">Staff Page</a></li>
                <li><a href="AddS.php">Add Student</a></li>
                <li><a class="active" href="AddST.php">Add Staff</a></li>
                <li><a href="AddG.php">Add Group</a></li>
            </ul>      
        </div>
        <!--Header-->
        <header>
            <h1>Add Staff</h1>
        </header>
        
        <form>
        <h1>Name</h1>
        <input type="text" name="Name" value="" size="20" />
        
        <h1>Number</h1>
        <input type="text" name="Number" value="" size="20" />
        
        <input type="submit" value="Submit" name="Submit" />
        </form>
                <?php
                
                //if submit button is pressed
                if (isset($_POST['Submit'])){
 
                //DB details
                $servername = "lamp.scim.brad.ac.uk";
                $username = "lpcovaje";
                $password = "Alegria3";
                $dbname = "lpcovaje";

                // Create connection
                    $db = mysqli_connect($servername, $username, $password, $dbname);
                    
                    // Check connection
                    if ($db->connect_error) {
                    die("Connection failed: " . $db->connect_error);
                    } 
                    echo "Connected successfully";
                    
                        
                    //get data from textbox
                    $name = $_POST['Name'];
                    $number = $_POST['Number'];
                    
                    //prevent sql injection
                    $name = mysql_real_escape_string($name);
                    $ub = mysql_real_escape_string($ub);
                    $group = mysql_real_escape_string($group);
                    
                    //get article id
                    $articleid = $_GET['id'];
                    
                    //check if id is a number
                    if( ! is_numeric($articleid)) die('invalid article id');

                    //insert into database
                    $sql = "INSERT INTO 'GP_Staff'('Number', 'Name') VALUES ('$number','$name')";
                    
                    //execute query
                    mysql_query($query);

                    //confirm/error
                    if ($db->query($sql) === TRUE) {
                        echo "New record added successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $db->error;
                    }
                    
                    //close connection    
                    mysqli_close($db);
                }
                                        ?>  
        
    </body>
</html>