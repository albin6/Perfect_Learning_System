<?php
ob_start();
include 'header.php';
include 'session.php';
include '../connection.php';
$st_id = $_SESSION['student']['log_id'];
?>
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-4">View Doubt</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">View Doubt</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid py-5 my-5 px-0">
    <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
        <p class="fw-medium text-uppercase text-primary mb-2">View Doubt</p>
    </div> 
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <section class="section dashboard">
                <div class="row">
                    <div class="col-lg-12" style="width:90%;margin:auto;">
                        <div class="row">
                        <?php
                            $sql = mysqli_query($con,"select t.name,t.contact_no,d.* from tb_teacher_register as t inner join tb_doubt as d on t.log_id=d.tr_id where d.st_id='$st_id'");
                            $n = mysqli_num_rows($sql);
                            if($n>0){ ?>
                            <div class="col-12">
                                <div class="card top-selling overflow-auto">
            
                                <div class="card-body pb-0">
                                    <h5 class="card-title">View Doubt| And Reply</span></h5>
            
                                    <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                        <th scope="col">Sl.No</th>
                                        <th scope="col">Teacher</th>
                                        <th scope="col">Doubt</th>
                                        <th scope="col">Reply</th>
                                        <th scope="col">Delete</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $c = 1;
                                        while($r=mysqli_fetch_array($sql)) { ?>
                                        <tr>
                                        <td><?php echo $c ?></td>
                                            <td>Name :<?php echo $r['name']; ?> <br>
                                            Contact number :<?php echo $r['contact_no']; ?>
                                        </td>
                                        <td>Date :<?php echo $r['date']; ?><br>
                                            Doubt :<?php echo $r['doubt']; ?>
                                        </td>
                                        <td><?php if ($r['reply'] == '0'){ ?><b style="color:red;">Waiting for reply.</b>
                                            <?php } else { echo $r['reply']; } ?>
                                        </td>
                                        <td><a href="delete_doubt.php?db_id=<?php echo $r['db_id']; ?>" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a></td>
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