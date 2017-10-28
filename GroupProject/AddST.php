<html> 
        <head>
        <title>Add Staff</title>
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
                <li><a class="active" href="AddST.php">Staff</a></li>
                <li><a href="AddG.php">Groups</a></li>
            </ul>      
        </div>
        <!--Header-->
        <header>
            <h1>Staff</h1>
        </header>
        
        <a href="VST.php">View all Staff</a>
        
        <h1>Add</h1>
        
        <form action="InsST.php" method="post">
        <h1>Name</h1>
        <input type="text" name="Name" value="" size="20" />
        
        <h1>Number</h1>
        <input type="text" name="Number" value="" size="20" />
        
        <input type="submit" value="Submit" name="Submit" />
        </form>
        
        <h1>Delete</h1>
        <form action="DelST.php" method="post">
        
        <h1>Number</h1>
        <input type="text" name="Number2" value="" size="20" />
        
        <input type="submit" value="Submit" name="Submit" />
        </form>
               
    </body>
</html>