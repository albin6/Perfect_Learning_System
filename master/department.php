<?php
ob_start();
include 'header.php';
include '../connection.php';
?>
<div class="pagetitle">
    <h1>Department</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Add Department</li>
      </ol>
    </nav>
</div><!-- End Page Title -->
<br><br>
   
<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Department</h5>
            <!-- Vertical Form -->
            <form method="post" action="" class="row g-3">
            <div class="col-12">
                <label for="Department" class="form-label">Department</label>
                <input type="text" name="department" class="form-control" id="department" required>
            </div>
            <div class="text-center">
                <input type="submit" name="submit" class="btn btn-primary" value="Add">
            </div>
            </form><!-- Vertical Form -->
        </div>
    </div>
</div>
<?php 
if (isset($_POST['submit'])){
    $department = $_POST['department'];

    mysqli_query($con,"insert into tb_departments (department) values ('$department')");
    echo '<script>alert("Added Successfully");window.location="department.php"</script>';
}
?>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card top-selling overflow-auto">

                    <div class="card-body pb-0">
                        <h5 class="card-title">Department <span>| Department</span></h5>

                        <table class="table table-borderless">
                        <thead>
                            <tr>
                            <th scope="col">Sl.No</th>
                            <th scope="col">Department</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            $sql = mysqli_query($con,"select * from tb_departments");
                            
                            while($r=mysqli_fetch_array($sql)){ ?>
                            <tr>
                            <td><?php echo $r['department']; ?></td>
                            <td><?php echo $r['department']; ?></td>
                            <td><a href="update_department.php?dep_id=<?php echo $r['dep_id']; ?>" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a></td>
                            <td><a href="delete_department.php?dep_id=<?php echo $r['dep_id']; ?>" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        </table>

                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>   
<?php  
include 'footer.php';
?>