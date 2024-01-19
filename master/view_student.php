<?php
ob_start();
include 'header.php';
include '../connection.php';
?>
<div class="pagetitle">
    <h1>Student List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Student List</li>
      </ol>
    </nav>
</div><!-- End Page Title -->
        

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
            <?php
            $sql = mysqli_query($con,"select l.status,t.*,d.department,s.semester from tb_student_register as t inner join tb_login as l on l.log_id=t.log_id inner join  tb_departments as d on t.dep_id=d.dep_id inner join tb_semester as s on t.sm_id=s.sm_id order by l.status");
            $n = mysqli_num_rows($sql);
            if($n>0){ ?>
                <div class="col-12">
                    <div class="card top-selling overflow-auto">
                    <div class="card-body pb-0">
                        <h5 class="card-title">Student <span>| Details</span></h5>

                        <table class="table table-borderless">
                        <thead>
                            <tr>
                            <th scope="col">Sl.No</th>
                            <th scope="col">Academic details</th>
                            <th scope="col">Student details</th>
                            <th scope="col">Approve</th>
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
                            <td>Name :<?php echo $r['name']; ?> <br>
                                Address :<?php echo $r['address']; ?> <br>
                                Contact number :<?php echo $r['contact_no']; ?> <br>
                                Email :<?php echo $r['email']; ?>
                            </td>
                            <td>
                                <?php if( $r['status'] == 0){ ?>
                                <a href="view_student.php?log_id=<?php echo $r['log_id']; ?>" class="btn btn-primary btn-sm">Approve</a>
                                <?php } else { ?>
                                <h6 style="color:rgb(31, 132, 247)">Approved</h6>
                                <?php } ?>
                            </td>
                            <td><a href="delete_student.php?log_id=<?php echo $r['log_id']; ?>" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a></td>
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
<?php
    if(isset($_GET['log_id']))
    {
        $log_id = $_GET['log_id'];
        $sql = mysqli_query($con,"update tb_login set status=1 where log_id='$log_id'");

        if($sql)
            {
                echo '<script>alert("Approved the student");window.location="view_student.php"</script>';
            }
            else
            {
                echo '<script>alert("Error");</script>;window.location="view_student.php"';
            }
    }
    ?>     
<?php  
include 'footer.php';
?>