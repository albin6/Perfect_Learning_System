<?php
include '../connection.php';
$sm_id=$_GET['sm_id']; 
$d = mysqli_query($con,"delete from tb_semester where sm_id='$sm_id'");
if($d)
{
    echo '<script>alert("Deleted Successfully");window.location="semester.php"</script>';
}
else
{
    echo '<script>alert("Error");</script>;window.location="semester.php"';
}
?>