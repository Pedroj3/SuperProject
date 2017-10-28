<html>
<body>
 
 
<?php
$con = mysqli_connect("lamp.scim.brad.ac.uk","lpcovaje","Alegria3");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
 
mysqli_select_db($con, "lpcovaje");
 
$sql="INSERT INTO GP_Groups (Name, Year)
VALUES
('$_POST[Name]',$_POST[Year])";
 
if (!mysqli_query($con, $sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record added";

//redirect to index page
header('Location: index.php?action=added');
exit;
 
mysqli_close($con)
?>
    
</body>
</html>