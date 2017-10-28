<html>
<body>
 
 
<?php
$con = mysqli_connect("lamp.scim.brad.ac.uk","lpcovaje","Alegria3");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
 
mysqli_select_db($con, "lpcovaje");
 
$sql="INSERT INTO GP_Students (UB, Name, Year, Group_name) VALUES
('$_POST[UB]','$_POST[Name]','$_POST[Year]', '$POST_[G_name]')";

 
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