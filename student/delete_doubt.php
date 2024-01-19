<?php
include '../connection.php';
$db_id=$_GET['db_id']; 
$d = mysqli_query($con,"delete from tb_doubt where db_id='$db_id'");
if($d)
{
    echo '<script>alert("Deleted Successfully");window.location="view_doubt.php"</script>';
}
else
{
    echo '<script>alert("Error");</script>;window.location="view_doubt.php"';
}
?>