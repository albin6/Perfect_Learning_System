<?php
ob_start();
include 'header.php';
include '../connection.php';
?>
<div class="pagetitle">
    <h1>Feedback</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Feedback</li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
            <?php
            $sql = mysqli_query($con,"select c.name,f.* from tb_teacher_register as c inner join tb_feedback as f on c.log_id=f.log_id");
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
                                    <td><?php echo $r['name']; ?></td>
                                    <td><?php echo $r['feedback_date']; ?></td>
                                    <td><?php echo $r['feedback']; ?></td>
                                    <td>
                                    <?php if($r['reply']==0) { ?>
                                        <form action="" method="post">
                                            <input type="hidden" value="<?php echo $r['fd_id']; ?>" name="fd_id">
                                            <textarea class="form-control" style="height: 100px" name="reply" placeholder="Reply" required></textarea>
                                            <input type="submit" name="submit" value="reply" class="btn btn-primary btn-sm">
                                        </form>
                                    <?php } else { echo $r['reply']; } ?>
                                    </td>
                                    </tr>
                                    <?php $c+=1; } ?>
                                </tbody>
                                </table>
                        </div>
                    </div>
                </div>
                <?php } else{ ?>
                <div class="col-12">Not Found Any Data</div>
                <?php
                } ?>
            </div>
        </div>
    </div>
</section>   
<?php  
if (isset($_POST['submit'])){
    $fd_id = $_POST['fd_id'];
    $reply = $_POST['reply'];

    mysqli_query($con,"update tb_feedback set reply='$reply' where fd_id='$fd_id'");
    echo '<script>alert("Submitted Successfully");window.location="feedback.php"</script>';
}

include 'footer.php';
?>