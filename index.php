<?php
//include config
require_once('config.php');

//show message from add / edit page
if (isset($_GET['delpost'])) {

    $stmt = $db->prepare('DELETE FROM posts WHERE postID = :postID');
    $stmt->execute(array(':postID' => $_GET['delpost']));

    header('Location: index.php?action=deleted');
    exit;
}
?>
<!doctype html>
<html lang="en">
    <head>
        <!--Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="Astyle.css">


        <meta charset="utf-8">
        <title>Admin Page</title>

        <script language="JavaScript" type="text/javascript">
            function delpost(id, title)
            {
                if (confirm("Are you sure you want to delete '" + title + "'"))
                {
                    window.location.href = 'index.php?delpost=' + id;
                }
            }
        </script>
    </head>
    <body>

        <div id="wrapper">

            <!--Navigation Bar-->
            <div id="nav">
                <ul>
                    <li><a class="active" href="Home.php">Log Out</a></li>
                    <li><a href='Home.php'>Home</a></li>

                </ul>      
            </div>

            <!--Header-->
            <header>
                <h3><br><br>The Bradford</h3>
                <h1>gEECS</h1>
                <h2>Magazine</h2>
            </header>

            <?php
            //show message from add / edit page
            if (isset($_GET['action'])) {
                echo '<h2>Post ' . $_GET['action'] . '.</h2>';
            }
            ?>

            <table>
                <tr>
                    <th>Title</th>
                    <th style="text-align: left">Date</th>
                    <th style="text-align: left">Action</th>
                </tr>
                <?php
                try {

                    $stmt = $db->query('SELECT postID, postTitle, postDate FROM posts ORDER BY postID DESC');
                    while ($row = $stmt->fetch()) {

                        echo '<tr>';
                        echo '<td>' . $row['postTitle'] . '</td>';
                        echo '<td>' . date('jS M Y', strtotime($row['postDate'])) . '</td>';
                        ?>

                        <td>
                            <a href="edit-post.php?id=<?php echo $row['postID']; ?>">Edit</a> | 
                            <a href="javascript:delpost('<?php echo $row['postID']; ?>','<?php echo $row['postTitle']; ?>')">Delete</a>
                        </td>

                        <?php
                        echo '</tr>';
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
                ?>
            </table>

            <p><a href='add-post.php'>Add Post</a></p>

        </div>

    </body>
</html>
