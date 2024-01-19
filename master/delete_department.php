<?php
include '../connection.php';
$dep_id=$_GET['dep_id']; 
$d = mysqli_query($con,"delete from tb_departments where dep_id='$dep_id'");
if($d)
{
    echo '<script>alert("Deleted Successfully");window.location="department.php"</script>';
}
else
{
    echo '<script>alert("Error");</script>;window.location="department.php"';
}
?>