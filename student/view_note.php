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
        <h1 class="display-4 text-white animated slideInDown mb-4">View Uploaded | Notes</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">View Uploaded | Notes</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid py-5 my-5 px-0">
    <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
        <p class="fw-medium text-uppercase text-primary mb-2">View Uploaded | Notes</p>
    </div> 
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <section class="section dashboard">
                <div class="row">
                    <div class="col-lg-12" style="width:90%;margin:auto;">
                        <div class="row">
                        <?php
            $sql = mysqli_query($con,"select u.upl_date,u.description,u.note,d.department,s.semester,sb.subject from tb_upload_note as u inner join tb_semester as s on s.sm_id=u.sm_id inner join tb_departments as d on d.dep_id=u.dep_id inner join tb_subject as sb on sb.sb_id=u.sb_id where u.dep_id='$dep_id' and u.sm_id='$sm_id' order by sb.subject");
            $n = mysqli_num_rows($sql);
            if($n>0){ ?>
                            <div class="col-12">
                                <div class="card top-selling overflow-auto">
            
                                <div class="card-body pb-0">
                                    <h5 class="card-title">View Uploaded | Notes</span></h5>
            
                                    <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sl.No</th>
                                            <th scope="col">Class</th>
                                            <th scope="col">Subject</th>
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
                                        <td>Department :<?php echo $r['department']; ?> <br>
                                            Semester :<?php echo $r['semester']; ?>
                                        </td>
                                        <td><?php echo $r['subject']; ?></td>
                                        <td>Upload date :<?php echo $r['upl_date']; ?><br>
                                            Description :<?php echo $r['description']; ?>
                                        </td>
                                        <td><b><a href="../media/<?php echo $r['note']; ?>" style="color: blue;">Download</a></b></td>
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
<?php include 'footer.php'; ?>