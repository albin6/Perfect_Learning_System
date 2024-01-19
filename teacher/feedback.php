<?php
ob_start();
include 'header.php';
include 'session.php';
include '../connection.php';
$tr_id = $_SESSION['teacher']['log_id'];
?>
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-3 text-white animated slideInRight">Feedback</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb animated slideInRight mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Feedback</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid py-5 my-5 px-0" style="width: 50%;">
    <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="width: 50%;">
        <p class="fw-medium text-uppercase text-primary mb-2">Feedback</p>
    </div>
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <div class="card" style="width: 60%;">
                <div class="card-body">
                    <center><h5 class="card-title">Feedback</h5></center>

                    <!-- Vertical Form -->
                    <form class="row g-3" action="" method="post" id="myform">
                    <div class="col-12">
                        <label for="feedback" class="form-label">Feedback</label>
                        <textarea class="form-control" style="height: 100px" id="feedback" name="feedback" required></textarea>
                    </div>
                    <div class="text-center">
                        <input type="submit" name="submit" class="btn btn-primary btn-sm" value="send">
                    </div>
                    </form><!-- Vertical Form -->
                </div>
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
                    $sql = mysqli_query($con,"select t.name,f.* from tb_teacher_register as t inner join tb_feedback as f on t.log_id='$tr_id'");
                    $n = mysqli_num_rows($sql);
                    if($n>0){ ?>
                    <div class="col-12">
                                <div class="card top-selling overflow-auto">
            
                                <div class="card-body pb-0">
                                    <h5 class="card-title">Feedback and <span>| Reply</span></h5>
            
                                    <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                        <th scope="col">Sl.No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Feedback</th>
                                        <th scope="col">Reply</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $c = 1;
                                        while($r=mysqli_fetch_array($sql)) { ?>
                                        <tr>
                                        <td><?php echo $c ?></td>
                                        <td><?php echo $r['name']; ?> <br></td>
                                        <td><?php echo $r['feedback_date']; ?> <br></td>
                                        <td><?php echo $r['feedback']; ?> <br></td>
                                        <td>
                                        <?php if ($r['reply']=='0'){ ?>   
                                        <b style="color: blue;">Waiting for reply..</b>
                                        <?php } else { echo $r['reply']; }?>
                                        </td>
                                        </tr>
                                        <?php $c+=1; } ?>
                                    </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                        <?php } else{ ?>
                                <div class="col-12"></div>
                                <?php
                                } ?>
                    </div>
                </div>
            </section> 
        </div> 
    </div>
    <?php 
if (isset($_POST['submit'])){

    $qr = mysqli_query($con,"select * from tb_login where role='admin'");
    $r=mysqli_fetch_array($qr);
    $rec_id = $r['log_id'];
    $feedback = $_POST['feedback'];
    $today = date("Y-m-d");

    mysqli_query($con,"insert into tb_feedback (log_id,rec_id,feedback,feedback_date,reply) values ('$tr_id','$rec_id','$feedback','$today','0')");
    echo '<script>alert("Sended Successfully");window.location="feedback.php"</script>';
}

include 'footer.php';
?>