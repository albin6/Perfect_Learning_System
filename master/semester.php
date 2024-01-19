<?php
ob_start();
include 'header.php';
include '../connection.php';
?>
<div class="pagetitle">
    <h1>Semester</h1>
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
            <h5 class="card-title">Add Semester</h5>

            <!-- Vertical Form -->
            <form class="row g-3"method='post' action="" enctype="multipart/form-data">
            <div class="col-12">
                <label for="semester" class="form-label">Semester</label>
                <input type="text" name="semester" class="form-control" id="semester">
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

    $semester = $_POST['semester'];

    mysqli_query($con,"insert into tb_semester (semester) values ('$semester')");
    echo '<script>alert("Added Successfully");window.location="semester.php"</script>';
}
?>



<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
            <?php
            $sql = mysqli_query($con,"select * from tb_semester");
            $n = mysqli_num_rows($sql);
            if($n>0){ ?>
                <div class="col-12">
                    <div class="card top-selling overflow-auto">
                    <div class="card-body pb-0">
                        <h5 class="card-title">Semester<span>| List</span></h5>

                        <table class="table table-borderless">
                        <thead>
                            <tr>
                            <th scope="col">Sl.No</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php 
                           $c = 1;
                           while($r=mysqli_fetch_array($sql)) { ?>
                            <tr>
                            <td><?php echo $c ?></td>
                            <td><?php echo $r['semester']; ?></td>
                            <td><a href="update_sem.php?sm_id=<?php echo $r['sm_id']; ?>" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a></td>
                            <td><a href="delete_sem.php?sm_id=<?php echo $r['sm_id']; ?>" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a></td>
                            </tr>
                           <?php $c+=1; } ?>
                        </tbody>
                        </table>

                    </div>

                    </div>
                </div>
                <?php } else{ ?>
                <div class="col-12"></div>
                <?php
                } ?>
            </div>
        </div>
    </div>
</section>   
<?php  
include 'footer.php';
?>