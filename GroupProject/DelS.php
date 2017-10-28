<html>
<body>
 
 
<?php
$con = mysqli_connect("lamp.scim.brad.ac.uk","lpcovaje","Alegria3");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
 
mysqli_select_db($con, "lpcovaje");
$ub=$_POST['UB2']; 

$sql="DELETE FROM GP_Students WHERE UB=$ub";

 
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