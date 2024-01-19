<?php
ob_start();
include 'header.php';
include 'session.php';
include '../connection.php';
$st_id = $_SESSION['student']['log_id'];
?>
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-4">Student Assignment</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Student Assignment</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid py-5 my-5 px-0">
    <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
        <p class="fw-medium text-uppercase text-primary mb-2">Student Assignment</p>
    </div> 
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <section class="section dashboard">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                        <?php
                            $sql = mysqli_query($con,"select u.date,u.assignment,u.ua_id,a.as_id,a.deadline,a.description,d.department,s.semester,sb.subject,t.name from tb_assignment as a inner join tb_upload_assignment as u on a.as_id=u.as_id inner join tb_semester as s on s.sm_id=a.sm_id inner join tb_departments as d on d.dep_id=a.dep_id inner join tb_subject as sb on sb.sb_id=a.sb_id inner join tb_teacher_register as t on a.tr_id=t.log_id where u.st_id='$st_id'");
                            $n = mysqli_num_rows($sql);
                            if($n>0){ ?>
                            <div class="col-12">
                                <div class="card top-selling overflow-auto">
            
                                <div class="card-body pb-0">
                                    <h5 class="card-title">Student Assignment</span></h5>
            
                                    <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sl.No</th>
                                            <th scope="col">Class</th>
                                            <th scope="col">Teacher</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Upload Date</th>
                                            <th scope="col">Assignment</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
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
                                        <td><?php echo $r['date']; ?></td>
                                        <td>
                                            <a href="../media/<?php echo $r['assignment']; ?>">Assignment</a>
                                            
                                        </td>
                                        <td><form action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" value="<?php echo $r['ua_id']; ?>" name="ua_id">
                                            <input type="file" class="form-control"  id="assignment" name="assignment" required><br>
                                            <input type="submit" name="submit" value="Edit" class="btn btn-primary">
                                        </form></td>

                                        <td><a href="view_assign.php?ua_id=<?php echo $r['ua_id']; ?>" class="btn-sm btn-danger">Delete</a></td>
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

    $ua_id = $_POST['ua_id'];
    $today = date("Y-m-d");
    
    $assignment = $_FILES['assignment']['name'];
    $new_name = time().$assignment;
    move_uploaded_file($_FILES['assignment']['tmp_name'],"../media/".$new_name);
    $qr = mysqli_query($con,"update tb_upload_assignment set assignment='$new_name',date='$today' where ua_id='$ua_id'");
      
    if($qr){

        echo '<script>alert("Uploaded Successfully");window.location="view_assign.php"</script>';
    }
    else{

    echo '<script>alert("error"); window.location="view_assign.php"</script>';
    }  
}


if (isset($_GET['ua_id'])){
$ua_id=$_GET['ua_id']; 
$d = mysqli_query($con,"delete from tb_upload_assignment where ua_id='$ua_id'");
if($d)
{
    echo '<script>alert("Deleted Successfully");window.location="view_assign.php"</script>';
}
else
{
    echo '<script>alert("Error");</script>;window.location="view_assign.php"';
}
}

include 'footer.php'; ?>
