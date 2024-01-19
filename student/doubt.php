<?php
ob_start();
include 'header.php';
include 'session.php';
include '../connection.php';
$st_id = $_SESSION['student']['log_id'];
?>
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-4">Doubt</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Doubt</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid py-5 my-5 px-0" style="width: 50%;">
    <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="width: 50%;">
        <p class="fw-medium text-uppercase text-primary mb-2">Doubt</p>
    </div>
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <div class="card" style="width: 60%;">
                <div class="card-body">
                    <center><h5 class="card-title">Doubt</h5></center>
                    
                    <form class="row g-3" action="" method="post" id="myform" enctype="multipart/form-data">
                    <?php
                    $tr_id = $_GET['tr_id'];
                    $sql = mysqli_query($con,"select * from tb_teacher_register where log_id='$tr_id'");
                    while($r=mysqli_fetch_array($sql)) { ?>
                    <div class="col-12">
                        <label for="name" class="form-label">Teacher</label>
                        <input type="text" value="<?php echo $r['name']; ?>" readonly class="form-control" id="name" required>
                        <input type="hidden" value="<?php echo $r['log_id']; ?>" name="tr_id">
                    </div>
                    <div class="col-12">
                        <label for="doubt" class="form-label">Doubt</label>
                        <textarea class="form-control" style="height: 100px" id="doubt" name="doubt" required></textarea>
                    </div>
                    <?php } ?>
                    <div class="text-center">
                        <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Send">
                    </div>
                    </form><!-- Vertical Form -->
                </div>
            </div>
        </div> 
    </div>
</div>
<?php 
if (isset($_POST['submit'])){

    $tr_id = $_POST['tr_id'];
    $doubt = $_POST['doubt'];
    $today = date("Y-m-d");
    
    $qr = mysqli_query($con,"insert into tb_doubt (doubt,st_id,tr_id,date,reply) values ('$doubt','$st_id','$tr_id','$today','0')");
    if($qr){

        echo '<script>alert("Submitted Successfully");window.location="teachers.php"</script>';
    }
    else{

    echo '<script>alert("error");window.location="teachers.php"</script>';
    }
    
}

include 'footer.php'; ?>
