<?php
ob_start();
include 'header.php';
include '../connection.php';
include 'session.php';
$st_id = $_SESSION['student']['log_id'];
$qr = mysqli_query($con,"select * from tb_student_register where log_id='$st_id'");
$r = mysqli_fetch_array($qr);
?>
<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="../static/user/img/l1.jpeg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-10">
                                <h5 class="text-light text-uppercase mb-3 animated slideInDown">Welcome to PERFECT LEARNING SYSTEM</h5>
                                <h5 class="text-light text-uppercase mb-3 animated slideInDown">Student Home</h5>
                               
                                <h1 class="display-2 text-light mb-3 animated slideInDown">Welcome <?php echo $r['name']; ?></h1>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  include 'footer.php'; ?>