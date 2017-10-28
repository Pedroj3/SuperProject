<html>
<body>
 
 
<?php
$con = mysqli_connect("lamp.scim.brad.ac.uk","lpcovaje","Alegria3");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
 
mysqli_select_db($con, "lpcovaje");
$number=$_POST['Number2']; 

$sql="DELETE FROM GP_Staff WHERE Number=$number";

 
if (!mysqli_query($con, $sql))
  {
  die('Error: ' . mysqli_error($con));
  }

//redirect to index page
header('Location: index.php?action=added');
exit;
 
mysqli_close($con)
?>
    
</body>
</html>