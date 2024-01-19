<?php
ob_start();
include 'header.php';
include 'session.php';
include '../connection.php';
$tr_id = $_SESSION['teacher']['log_id'];
?>
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-3 text-white animated slideInRight">Upload Note</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb animated slideInRight mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Upload Note</li>
            </ol>
        </nav>
    </div>
</div>


<div class="container-fluid py-5 my-5 px-0">
    <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
        <p class="fw-medium text-uppercase text-primary mb-2">Upload Note</p>
    </div> 
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <div class="card" style="width: 40%;">
                <div class="card-body">
                    <center><h5 class="card-title">Upload Note</h5></center>
            <form class="row g-3"method='post' action="" enctype="multipart/form-data">
                
            <div class="col-6">
                <label class="form-label">Department</label>
                <select name="dep_id" class="form-select" id="dep_id" required>
                    <option value="">--Select department--</option>
                    <?php 
                    $sql =  mysqli_query($con, "select *from tb_departments");
                    while ($r =  mysqli_fetch_array($sql))
                    {
                    ?>
                    <option value="<?php echo $r['dep_id'];?>"><?php echo $r['department'];?></option>  
                    <?php 
                    }
                    ?>
                </select>
            </div>
            <div class="col-6">
                <label for="item" class="form-label">Semester</label>
                <select name="sm_id" class="form-select" id="sm_id">
                    <option value="">--Select semester--</option>
                    <?php
                    $sql =  mysqli_query($con, "select *from tb_semester");
                    while ($r = mysqli_fetch_array($sql))
                    {
                    ?>
                    <option value="<?php echo $r['sm_id'];?>"><?php echo $r['semester'];?></option>  
                    <?php 
                    }
                    ?>
            </select>
            </div>
            <div class="col-6">
                <label for="notes" class="form-label">Upload Note</label>
                <input type="file" class="form-control"  id="notes" name="notes" required>
            </div>
            <div class="col-6">
                <label for="item" class="form-label">Subject</label>
                <select name="sb_id" class="form-select" id="sb_id" required>
                    <option value="">--Select subject--</option>
                    <?php
                    $sql =  mysqli_query($con, "select *from tb_subject");
                    while ($r = mysqli_fetch_array($sql))
                    {
                    ?>
                    <option value="<?php echo $r['sb_id'];?>"><?php echo $r['subject'];?></option>  
                    <?php 
                    }
                    ?>
                </select>
            </div>
            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" style="height: 100px" id="description" name="description" required></textarea>
            </div>
            <div class="text-center">
                <input type="submit" name="submit" class="btn btn-primary" value="Upload">
            </div>
            </form>
                </div>
            </div>
        </div> 
    </div>
    
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <section class="section dashboard">
                <div class="row">
                    <div class="col-lg-12" style="width:90%;margin:auto;">
                        <div class="row">
                        <?php
            $sql = mysqli_query($con,"select u.*,d.department,c.semester,s.subject from tb_upload_note as u inner join tb_departments as d on u.dep_id=d.dep_id inner join tb_semester as c on u.sm_id=c.sm_id inner join tb_subject as s on u.sb_id=s.sb_id where u.tr_id='$tr_id'");
            $n = mysqli_num_rows($sql);
            if($n>0){ ?>
                            <div class="col-12">
                                <div class="card top-selling overflow-auto">
            
                                <div class="card-body pb-0">
                                    <h5 class="card-title">Upload Notes <span>| Details</span></h5>
            
                                    <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sl.No</th>
                                            <th scope="col">Department</th>
                                            <th scope="col">Semester</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Upload Date</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $c = 1;
                                        while($r=mysqli_fetch_array($sql)) { ?>
                                        <tr>
                                        <td><?php echo $c ?></td>
                                        <td><?php echo $r['department']; ?></td>
                                        <td><?php echo $r['semester']; ?></td>
                                        <td><?php echo $r['subject']; ?></td>
                                        <td><?php echo $r['upl_date']; ?></td>
                                        <td><?php echo $r['description']; ?></td>
                                        <td><b><a href="../media/<?php echo $r['note']; ?>" style="color: blue;">view</a></b></td>
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
        </div> 
    </div>
</div>

<?php 
if (isset($_POST['submit'])){


    $dep_id = $_POST['dep_id'];
    $sm_id = $_POST['sm_id'];
    $sb_id = $_POST['sb_id'];
    $description = $_POST['description'];
    $today = date("Y-m-d");
    
    $notes = $_FILES['notes']['name'];
    $new_note = time().$notes;
    move_uploaded_file($_FILES['notes']['tmp_name'],"../media/".$new_note);

    $qr = mysqli_query($con,"insert into tb_upload_note (dep_id,sm_id,sb_id,description,note,upl_date,tr_id) values ('$dep_id','$sm_id','$sb_id','$description','$new_note','$today','$tr_id')");
    if($qr){

        echo '<script>alert("Uploaded Successfully");window.location="note_upload.php"</script>';
    }
    else{

    echo '<script>alert("error");window.location="note_upload.php"</script>';
    }
    
}
?>

<?php include 'footer.php'; ?>
