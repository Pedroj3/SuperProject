
<?php
//connect and select database
$link = mysqli_connect('lamp.scim.brad.ac.uk', 'lpcovaje', 'Alegria3');
mysqli_select_db($link, 'lpcovaje');
?>
<html> 
        <head>
        <title>Add Group</title>
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
                <li><a href="index.php">Staff Page</a></li>
                <li><a href="AddS.php">Students</a></li>
                <li><a href="AddST.php">Staff</a></li>
                <li><a class="active" href="AddG.php">Groups</a></li>
            </ul>      
        </div>
        <!--Header-->
        <header>
            <h1>Groups</h1>
        </header>
        
        <a href="VG.php">View all groups</a>
        
        <h1>Add</h1>
        
        <form action="InsG.php" method="post">
        <h1>Name</h1>
        <input type="text" name="Name" value="" size="20" />
        
        <h1>Tutor</h1>
        <!--Drop down list from database-->
        <select name="tutor">
           <?php
                //Query
                $res= mysqli_query($link, "select Name from GP_Staff order by Name asc");
                while($row= mysqli_fetch_array($res))
                {
                ?>
                <option>
                    <?php echo $row["Name"]; ?>
                </option>
                
                <?php
                }
                ?>
        </select><br><br>
        
        <h1>Stage</h1>
        <!--Drop down list-->
        <select name="Year">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>PHd</option>
        </select><br><br>
        
        <input type="submit" value="Submit" name="Submit" />
        </form>
        
        <h1>Delete</h1>
           
        <form action="DelG.php" method="post">
        
        <h1>Name</h1>
        <!--Drop down list from database-->
        <select name="name2">
           <?php
                //Query
                $res= mysqli_query($link, "select Name from GP_Groups order by Name asc");
                while($row= mysqli_fetch_array($res))
                {
                ?>
                <option>
                    <?php echo $row["Name"]; ?>
                </option>
                
                <?php
                }
                ?>
        </select><br><br>
        
        <input type="submit" value="Submit" name="Submit" />
        </form>
        
              
    </body>
</html>

