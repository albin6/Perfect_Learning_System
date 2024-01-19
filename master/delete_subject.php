<?php
include '../connection.php';
$sb_id=$_GET['sb_id']; 
$d = mysqli_query($con,"delete from tb_subject where sb_id='$sb_id'");
if($d)
{
    echo '<script>alert("Deleted Successfully");window.location="subject.php"</script>';
}
else
{
    echo '<script>alert("Error");</script>;window.location="subject.php"';
}
?>