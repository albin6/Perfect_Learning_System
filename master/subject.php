<?php
ob_start();
include 'header.php';
include '../connection.php';
?>
<div class="pagetitle">
    <h1>Subject</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Subject</li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Subject</h5>

            <!-- Vertical Form -->
            <form class="row g-3"method='post' action="" enctype="multipart/form-data">
            <div class="col-12">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" name="subject" class="form-control" id="subject">
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

    $subject = $_POST['subject'];

    mysqli_query($con,"insert into tb_subject (subject) values ('$subject')");
    echo '<script>alert("Added Successfully");window.location="subject.php"</script>';
}
?>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
            <?php
            $sql = mysqli_query($con,"select * from tb_subject");
            $n = mysqli_num_rows($sql);
            if($n>0){ ?>
                <div class="col-12">
                    <div class="card top-selling overflow-auto">
                    <div class="card-body pb-0">
                        <h5 class="card-title">Subjects<span>| List</span></h5>

                        <table class="table table-borderless">
                        <thead>
                            <tr>
                            <th scope="col">Sl.No</th>
                            <th scope="col">Subject</th>
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
                            <td><?php echo $r['subject']; ?></td>
                            <td><a href="update_subject.php?sb_id=<?php echo $r['sb_id']; ?>" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a></td>
                            <td><a href="delete_subject.php?sb_id=<?php echo $r['sb_id']; ?>" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a></td>
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