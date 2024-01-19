<?php
ob_start();
include 'header.php';
include 'session.php';
include '../connection.php';
$st_id = $_SESSION['student']['log_id'];
?>
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-4">Teachers</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Teachers</li>
            </ol>
        </nav>
    </div>
</div>


<div class="container-fluid py-5 my-5 px-0">
    <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
        <p class="fw-medium text-uppercase text-primary mb-2">Teachers</p>
    </div> 
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <section class="section dashboard">
                <div class="row">
                    <div class="col-lg-12" style="width:90%;margin:auto;">
                        <div class="row">
                        <?php
            $sql = mysqli_query($con,"select t.*,d.department,s.subject from tb_teacher_register as t inner join tb_departments as d on t.dep_id=d.dep_id inner join tb_subject as s on t.sb_id=s.sb_id");
            $n = mysqli_num_rows($sql);
            if($n>0){ ?>
                            <div class="col-12">
                                <div class="card top-selling overflow-auto">
            
                                <div class="card-body pb-0">
                                    <h5 class="card-title">View <span>| Order</span></h5>
            
                                    <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                        <th scope="col">Sl.No</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Contact Number</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Ask</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $c = 1;
                                        while($r=mysqli_fetch_array($sql)) { ?>
                                        <tr>
                                        <td><?php echo $c ?></td>
                                        <td><?php echo $r['department']; ?></td>
                                        <td><?php echo $r['subject']; ?></td>
                                        <td><?php echo $r['name']; ?></td>
                                        <td><?php echo $r['contact_no']; ?></td>
                                        <td><?php echo $r['email']; ?></td>
                                        <td><a href="doubt.php?tr_id=<?php echo $r['log_id']; ?>" class="btn btn-primary btn-sm">Ask doubt</a></td>
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