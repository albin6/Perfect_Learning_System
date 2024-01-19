<?php
include 'header.php';
include '../connection.php'
?>
<div class="pagetitle">
    <h1>Update Subject</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Update Subject</li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Update Subject</h5>
            
            <form class="row g-3"method='post' action="" enctype="multipart/form-data">
                
            <div class="col-12">
            <?php 
                $sb_id = $_GET['sb_id'];
                $sql = mysqli_query($con,"SELECT * FROM tb_subject WHERE sb_id='$sb_id'");
                while($r = mysqli_fetch_array($sql)){ ?>
                <label for="item" class="form-label">Subject</label>
                <input type="text" name="subject" value="<?php echo $r['subject']; ?>" class="form-control" id="item">
                <input type="hidden" value="<?php echo $r['sb_id']; ?>" name="sb_id">
                <?php } ?>
            </div>
            <div class="text-center">
                <input type="submit" name="submit" class="btn btn-primary" value="Update">
            </div>
            
        </div>
    </div>
</div>
            
<?php 
if (isset($_POST['submit'])){
    $sb_id = $_POST['sb_id'];
    $subject = $_POST['subject'];

    mysqli_query($con,"update tb_subject set subject='$subject' where sb_id='$sb_id'");
    echo '<script>alert("Updated Successfully");window.location="subject.php"</script>';
} 

include 'footer.php';
?>