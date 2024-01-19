<?php
ob_start();
include 'header.php';
include '../connection.php';

?>
<div class="pagetitle">
    <h1>Update Department</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Update Department</li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Update Department</h5>
            <!-- Vertical Form -->
            <form method="post" action="" class="row g-3">
            <div class="col-12">
                <?php 
                $dep_id = $_GET['dep_id'];
                $sql = mysqli_query($con,"SELECT * FROM tb_departments WHERE dep_id='$dep_id'");
                while($r = mysqli_fetch_array($sql)){ ?>
                <input type="hidden" name="dep_id" value="<?php echo $r['dep_id']; ?>">
                <label for="department" class="form-label">Department</label>
                <input type="text" name="department" value="<?php echo $r['department']; ?>" class="form-control" id="department" required>
                <?php } ?>
            </div>
            <div class="text-center">
                <input type="submit" name="submit" class="btn btn-primary" value="Update">
            </div>
            </form>
        </div>
    </div>
</div>

<?php 
if (isset($_POST['submit'])){
    $dep_id = $_POST['dep_id'];
    $department = $_POST['department'];

    mysqli_query($con,"update tb_departments set department='$department' where dep_id='$dep_id'");
    echo '<script>alert("Updated Successfully");window.location="department.php"</script>';
}
 
include 'footer.php';
?>