<?php
ob_start();
include 'header.php';
include 'session.php';
include '../connection.php';
?>
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-4">Students list</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Students list</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-xxl py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fw-medium text-uppercase text-primary mb-2">Student list</p>
        </div>
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <form action="" method="post">
            <div class="row" >
                    <div class="col-12">
                    <select name="sm_id" class="form-select" id="sm_id" onchange="show(this.value)" required style="float: right;width: 30%;">
                                <option value="">--Select semester--</option>
                                <?php
                                $sql =  mysqli_query($con, "select *from tb_semester");
                                while ($r = mysqli_fetch_array($sql))
                                {
                                ?>
                                <option value="<?php echo $r['sm_id'];?>"><?php echo $r['semester'];?></option>  
                                <?php 
                                }
                                ?>
                        </select>
                        <select name="dep_id" class="form-select" id="dep_id" required style="float: right;width: 30%;">
                            <option value="">--Select department--</option>
                            <?php 
                            $sql =  mysqli_query($con, "select *from tb_departments");
                            while ($r =  mysqli_fetch_array($sql))
                            {
                            ?>
                            <option value="<?php echo $r['dep_id'];?>"><?php echo $r['department'];?></option>  
                            <?php 
                            }
                            ?>
                        </select>
                           
                    </div>
            </div>
            </form>
        </div>
        <section class="section">
            <div class="row" id="tb">
                
            </div>
        </section>
    </div>
</div>

<script>
function show(sm_id) {
    dep_id = document.getElementById("dep_id").value;
  if (sm_id == "") {
    document.getElementById("tb").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("tb").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","students_list.php?sm_id="+sm_id+"&dep_id="+dep_id,true);
    xmlhttp.send();
  }
}
</script>
<?php  
include 'footer.php';
?>