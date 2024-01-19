<?php
ob_start();
include 'header.php';
include 'session.php';
include '../connection.php';
$st_id = $_SESSION['student']['log_id'];
$qr = mysqli_query($con,"select * from tb_student_register where log_id='$st_id'");
$r = mysqli_fetch_array($qr);
$dep_id = $r['dep_id'];
$sm_id = $r['sm_id'];
?>
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-4">Assignment</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Assignment</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid py-5 my-5 px-0">
    <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
        <p class="fw-medium text-uppercase text-primary mb-2">Assignment</p>
    </div> 
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <section class="section dashboard">
                <div class="row">
                    <div class="col-lg-12" style="width:90%;margin:auto;">
                        <div class="row">
                        <?php
                            $sql = mysqli_query($con,"select a.as_id,a.deadline,a.description,d.department,s.semester,sb.subject,t.name from tb_assignment as a inner join tb_semester as s on s.sm_id=a.sm_id inner join tb_departments as d on d.dep_id=a.dep_id inner join tb_subject as sb on sb.sb_id=a.sb_id inner join tb_teacher_register as t on a.tr_id=t.log_id where a.dep_id='$dep_id' and a.sm_id='$sm_id'");
                            $n = mysqli_num_rows($sql);
                            if($n>0){ ?>
                            <div class="col-12">
                                <div class="card top-selling overflow-auto">
            
                                <div class="card-body pb-0">
                                    <h5 class="card-title">Assignment</span></h5>
            
                                    <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sl.No</th>
                                            <th scope="col">Class</th>
                                            <th scope="col">Teacher</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Upload Assignment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $c = 1;
                                        while($r=mysqli_fetch_array($sql)) { ?>
                                        <tr>
                                        <td><?php echo $c ?></td>
                                        <td>Department :<?php echo $r['department']; ?> <br>
                                            Semester :<?php echo $r['semester']; ?>
                                        </td>
                                        <td><?php echo $r['name']; ?></td>
                                        <td><?php echo $r['subject']; ?></td>
                                        <td>Deadline :<?php echo $r['deadline']; ?><br>
                                            Description :<?php echo $r['description']; ?>
                                        </td>
                                        <td>
                                        <?php 
                                            $ai = $r['as_id'];
                                            $q = mysqli_query($con,"select * from tb_upload_assignment where as_id='$ai' and st_id='$st_id'");
                                            $n = mysqli_num_rows($q);
                                            if ($n>0){ echo 'Uploaded'; } else { ?>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" value="<?php echo $r['as_id']; ?>" name="as_id">
                                            <input type="file" class="form-control"  id="assignment" name="assignment" required><br>
                                            <input type="submit" name="submit" value="upload" class="btn btn-primary">
                                        </form>
                                        <?php } ?>
                                        </td>
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

    $as_id = $_POST['as_id'];
    $today = date("Y-m-d");
    
    $assignment = $_FILES['assignment']['name'];
    $new_name = time().$assignment;
    move_uploaded_file($_FILES['assignment']['tmp_name'],"../media/".$new_name);

    $qr = mysqli_query($con,"insert into tb_upload_assignment (as_id,st_id,date,assignment) values ('$as_id','$st_id','$today','$new_name')");
    if($qr){

        echo '<script>alert("Uploaded Successfully");window.location="view_assignment.php"</script>';
    }
    else{

    echo '<script>alert("error"); window.location="view_assignment.php"</script>';
    }  
}

include 'footer.php'; ?>