<?php
ob_start();
include 'header.php';
include 'session.php';
include '../connection.php';
$tr_id = $_SESSION['teacher']['log_id'];
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
                    $sql = mysqli_query($con,"select ua.date,ua.assignment,a.deadline,a.description,d.department,s.semester,sb.subject,st.name,st.contact_no from tb_upload_assignment as ua inner join tb_assignment as a on ua.as_id=a.as_id inner join tb_student_register as st on ua.st_id=st.log_id inner join tb_departments as d on d.dep_id=a.dep_id inner join tb_semester as s on s.sm_id=a.sm_id inner join tb_subject as sb on sb.sb_id=a.sb_id where a.tr_id='$tr_id'");
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
                                            <th scope="col">Subject</th>
                                            <th scope="col">Student details</th>
                                            <th scope="col">Assignment details</th>
                                            <th scope="col">Upload Date</th>
                                            <th scope="col">Assignment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $c = 1;
                                        while($r=mysqli_fetch_array($sql)) { ?>
                                        <tr>
                                        <td><?php echo $c ?></td>
                                        <td><?php echo $r['department']; ?> <br>
                                            <?php echo $r['semester']; ?></td>
                                        <td><?php echo $r['subject']; ?></td>
                                        <td>Name :<?php echo $r['name']; ?> <br>
                                            Contact number: <?php echo $r['contact_no']; ?>
                                        </td>
                                        <td>
                                        Deadline :<?php echo $r['deadline']; ?> <br>
                                        Description :<?php echo $r['description']; ?></td>
                                        
                                        <td><?php echo $r['date']; ?></td>
                                        <td><a href="../media/<?php echo $r['assignment']; ?>">Assignment</a></td>
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