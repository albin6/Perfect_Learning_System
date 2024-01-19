<?php
ob_start();
include 'header.php';
include 'session.php';
include '../connection.php';
$tr_id = $_SESSION['teacher']['log_id'];
?>
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-3 text-white animated slideInRight">Assignment</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb animated slideInRight mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Assignment</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<div class="container-fluid py-5 my-5 px-0">
    <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
        <p class="fw-medium text-uppercase text-primary mb-2">Assignment</p>
    </div> 
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <div class="card" style="width: 40%;">
                <div class="card-body">
                    <center><h5 class="card-title">Assignment</h5></center>
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
            <div class="col-6">
                <label for="deadline" class="form-label">Deadline</label>
                <input type="date" class="form-control" id="deadline" name="deadline" required>
            </div>
            <div class="col-12">
                <label for="description" class="form-label">Assignment Description</label>
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
            $sql = mysqli_query($con,"select a.*,d.department,c.semester,s.subject from tb_assignment as a inner join tb_departments as d on a.dep_id=d.dep_id inner join tb_semester as c on a.sm_id=c.sm_id inner join tb_subject as s on a.sb_id=s.sb_id where a.tr_id='$tr_id'");
            $n = mysqli_num_rows($sql);
            if($n>0){ ?>
                            <div class="col-12">
                                <div class="card top-selling overflow-auto">
            
                                <div class="card-body pb-0">
                                    <h5 class="card-title">Assignment <span>| Details</span></h5>
            
                                    <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sl.No</th>
                                            <th scope="col">Department</th>
                                            <th scope="col">Semester</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Deadline</th>
                                            <th scope="col">Description</th>
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
                                        <td><?php echo $r['deadline']; ?></td>
                                        <td><?php echo $r['description']; ?></td>
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
    $deadline = $_POST['deadline'];

    $qr = mysqli_query($con,"insert into tb_assignment (dep_id,sm_id,sb_id,deadline,description,tr_id) values ('$dep_id','$sm_id','$sb_id','$deadline','$description','$tr_id')");
    if($qr){

        echo '<script>alert("Submitted Successfully");window.location="add_assignment.php"</script>';
    }
    else{

    echo '<script>alert("error");window.location="add_assignment.php"</script>';
    }
    
}
?>
<?php include 'footer.php'; ?>