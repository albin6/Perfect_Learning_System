<?php
ob_start();
include 'header.php';
include '../connection.php';
?>
<div class="pagetitle">
    <h1>Update Semester</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Semester</li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Semester</h5>
            <form class="row g-3"method='post' action="" enctype="multipart/form-data">
            <div class="col-12">
            <?php 
                $sm_id = $_GET['sm_id'];
                $sql = mysqli_query($con,"SELECT * FROM tb_semester WHERE sm_id='$sm_id'");
                while($r = mysqli_fetch_array($sql)){ ?>
                <label for="item" class="form-label">Semester</label>
                <input type="hidden" value="<?php echo $r['sm_id']; ?>" name="sm_id" class="form-control">
                <input type="text" name="semester" value="<?php echo $r['semester']; ?>" class="form-control" id="item" required>
                <?php } ?>
            
            </div>
            <div class="text-center">
                <input type="submit" name="submit" class="btn btn-primary" value="Update">
            </div>
            </form><!-- Vertical Form -->
        </div>
    </div>
</div>
<?php 
if (isset($_POST['submit'])){
    $sm_id = $_POST['sm_id'];
    $semester = $_POST['semester'];

    mysqli_query($con,"update tb_semester set semester='$semester' where sm_id='$sm_id'");
    echo '<script>alert("Updated Successfully");window.location="semester.php"</script>';
} 

include 'footer.php';
?>