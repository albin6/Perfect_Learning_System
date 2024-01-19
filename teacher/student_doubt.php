<?php
ob_start();
include 'header.php';
include 'session.php';
include '../connection.php';
$tr_id = $_SESSION['teacher']['log_id'];
?>
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-4">Student doubt</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Student doubt</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid py-5 my-5 px-0">
    <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
        <p class="fw-medium text-uppercase text-primary mb-2">Student doubt</p>
    </div> 
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <section class="section dashboard">
                <div class="row">
                    <div class="col-lg-12" style="width:90%;margin:auto;">
                        <div class="row">
                        <?php
                    $sql = mysqli_query($con,"select db.*,st.name,st.contact_no,d.department,s.semester from tb_doubt as db inner join tb_student_register as st on db.st_id=st.log_id inner join tb_departments as d on st.dep_id=d.dep_id inner join tb_semester as s on st.sm_id=s.sm_id where db.tr_id='$tr_id'");
                    $n = mysqli_num_rows($sql);
                    if($n>0){ ?>
                            <div class="col-12">
                                <div class="card top-selling overflow-auto">
            
                                <div class="card-body pb-0">
                                    <h5 class="card-title">Student <span>| doubt</span></h5>
            
                                    <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                        <th scope="col">Sl.No</th>
                                        <th scope="col">Student Details</th>
                                        <th scope="col">Doubt</th>
                                        <th scope="col">Reply</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $c = 1;
                                        while($r=mysqli_fetch_array($sql)) { ?>
                                        <tr>
                                        <td><?php echo $c ?></td>
                                        <td>Name :<?php echo $r['name']; ?> <br>
                                            Contact number: <?php echo $r['contact_no']; ?>
                                        </td>
                                        <td>Date :<?php echo $r['date']; ?> <br>
                                            Doubt: <?php echo $r['doubt']; ?>
                                        </td>
                                            
                                        <td>
                                            <?php if ($r['reply'] == '0'){ ?>
                                            <div id="bdiv"><button onclick="disp()" class="btn-sm btn-primary">Reply</button></div>
                                            <div id="fdiv" style="display: none;">
                                            <form action="" method="post">
                                                <input type="hidden" value="<?php echo $r['db_id']; ?>" name="db_id">
                                                <textarea class="form-control" style="height: 100px" name="reply" placeholder="Reply" required></textarea>
                                                <input type="submit" name="submit" value="reply" class="btn btn-primary btn-sm">
                                            </form>
                                            </div>
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
<script>
    function disp(){
        var x = document.getElementById("fdiv");
        var y = document.getElementById("bdiv");

        y.style.display = "none";
        x.style.display = "block";
    }
</script>
<?php
if (isset($_POST['submit'])){
    $db_id = $_POST['db_id'];
    $reply = $_POST['reply'];

    mysqli_query($con,"update tb_doubt set reply='$reply' where db_id='$db_id'");
    echo '<script>alert("Submitted Successfully");window.location="student_doubt.php"</script>';
}


include 'footer.php'; ?>