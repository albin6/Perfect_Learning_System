<?php
include '../connection.php';
$log_id=$_GET['log_id']; 
mysqli_query($con,"delete from tb_student_register where log_id='$log_id'");
$d = mysqli_query($con,"delete from tb_login where log_id='$log_id'");

if($d)
{
    echo '<script>alert("Deleted Successfully");window.location="view_student.php"</script>';
}
else
{
    echo '<script>alert("Error");</script>;window.location="view_student.php"';
}
?>