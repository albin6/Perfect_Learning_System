<?php
ob_start();
include 'header.php';
include '../connection.php';
?>
<div class="pagetitle">
    <h1>Teacher Register</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Teacher Register</li>
      </ol>
    </nav>
</div><!-- End Page Title -->


<div class="row justify-content-center">
    <div class="card" style="width: 60%;">
        <div class="card-body">
            <center><h5 class="card-title">Teacher Register</h5></center>

            <!-- Vertical Form -->
            <form class="row g-3" action="" method="post" id="myform" enctype="multipart/form-data">
            
            <div class="col-6">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="col-6">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" style="height: 100px" id="address" name="address" required></textarea>
            </div>
            <div class="col-6">
                <label for="phone" class="form-label">Contact Number</label>
                <input type="number"  name="phone" class="form-control" id="phone" required>
            </div>
            <div class="col-6">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email" required>
            </div>
            <div class="col-6">
                <label class="form-label">Department</label>
                <select name="dep_id" class="form-select" id="dp" required>
                    <option value="">--Select--</option>
                    <?php
                    $sql = mysqli_query($con,"select * from tb_departments");
                    while($r=mysqli_fetch_array($sql)) { ?>
                    <option value="<?php echo $r['dep_id']; ?>"><?php echo $r['department']; ?></option>
                    <?php } ?>
                  </select>
            </div>
            <div class="col-6">
                <label for="item" class="form-label">Subject</label>
                <select name="sb_id" class="form-select" id="sb" required>
                    <option value="">--Select--</option>
                    <?php
                    $sql = mysqli_query($con,"select * from tb_subject");
                    while($r=mysqli_fetch_array($sql)) { ?>
                    <option value="<?php echo $r['sb_id']; ?>"><?php echo $r['subject']; ?></option>
                    <?php } ?>
                </select>
            </div>     
            <div class="col-6">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" required>
                <span id="cb" name="cb"></span>
            </div>
            <div class="col-6">
            </div>     
            <div class="col-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="col-6">
                <label for="cpas" class="form-label">Confirm Password</label>
                <input type="password" name="cpas" class="form-control" id="cpas" required>
            </div>
            <div class="text-center">
                <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Register">
            </div>
            </form><!-- Vertical Form -->
        </div>
    </div>
</div>

<?php 
if (isset($_POST['submit'])){

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dep_id = $_POST['dep_id'];
    $sb_id = $_POST['sb_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql=mysqli_query($con,"select * from tb_login where username='$username'");
    $n=mysqli_num_rows($sql);

    if($n==0){
        mysqli_query($con,"insert into tb_login (username,password,role,status) values ('$username','$password','teacher',1)");
        $log_id = mysqli_insert_id($con);
        mysqli_query($con,"insert into tb_teacher_register (name,address,contact_no,email,dep_id,sb_id,log_id) values ('$name','$address','$phone','$email','$dep_id','$sb_id','$log_id')");
        
        echo '<script>alert("Registered Successfully");window.location="teacher_register.php"</script>';
    }   
    else{
    echo '<script>alert("Username already exist");window.location="teacher_register.php"</script>';
    }
    
}
?>


<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
            <?php
            $sql = mysqli_query($con,"select t.*,d.department,s.subject from tb_teacher_register as t inner join tb_departments as d on t.dep_id=d.dep_id inner join tb_subject as s on t.sb_id=s.sb_id");
            $n = mysqli_num_rows($sql);
            if($n>0){ ?>
                <div class="col-12">
                    <div class="card top-selling overflow-auto">

                    <div class="card-body pb-0">
                        <h5 class="card-title">Teachers <span>| List</span></h5>

                        <table class="table table-borderless">
                        <thead>
                            <tr>
                            <th scope="col">Sl.No</th>
                            <th scope="col">Department</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                           $c = 1;
                           while($r=mysqli_fetch_array($sql)) { ?>
                            <tr>
                            <td><?php echo $c ?></td>
                            <td><?php echo $r['department']; ?></td>
                            <td><?php echo $r['subject']; ?></td>
                            <td><?php echo $r['name']; ?></td>
                            <td><?php echo $r['address']; ?></td>
                            <td><?php echo $r['contact_no']; ?></td>
                            <td><?php echo $r['email']; ?></td>
                            <td><a href="delete_teacher.php?log_id=<?php echo $r['log_id']; ?>" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a></td>
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


<script src="../static/Validation/jquery-1.11.1.min.js"></script>
<script src="../static/Validation/jquery_validate.js"></script>
<script src="../static/Validation/additional_validate.js"></script>

<script>
    (function ($, W, D)
    {
    var JQUERY4U = {};
    JQUERY4U.UTIL =
    {
    setupFormValidation: function ()
    {
    $.validator.addMethod(
    "regex",
    function(value, element, regexp) {
    var check = false;
    return this.optional(element) || regexp.test(value);
    },
    "Not a valid Input."
    );
    
    //form validation rules
    $("#myform").validate({
    ignore: [],
    rules: {
                name: {
                  required: true,
                  regex : /^[A-Za-z ]+$/,
                  minlength: 3,
    
                },
               
                phone: {
                    required: true,
                    digits:true,
                       minlength: 10,
                       maxlength: 10,
                       regex : /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[6789]\d{9}$/
                },
                
                address: {
                  required: true,
                  minlength: 3,
                },
    
                
                username: {
                    required: true,
                    regex : /^[A-Za-z0-9@]+$/,
                    minlength: 5,
                    maxlength: 15,
    
                },
                password: {
                    required: true,
                     regex : /^[A-Za-z0-9@#*]+$/,
                     minlength: 5,
                    maxlength: 15,
    
                },
                cpas: {
                    required: true,
                       regex : /^[A-Za-z0-9@#*]+$/,
                       minlength: 5,
                      maxlength: 15,
                  equalTo: "#password"
    
                },
               
                
              },
              messages: {
    
                phone: "Please Enter Valid 10 digit Phone Number - Starting from 6, 7 or 8 or 9",
                username: "Please Enter Valid User Name(5-15 digit alphanumeric username",
                password: "Please Enter Valid Password Name(5-15 digit alphanumeric  password  and @#* also allowed",
                cpas: "Please Enter Valid Password Name(5-15 digit alphanumeric confirm password and same as above password and @#* also allowed",
                uname:"User name is not available",
    },
    submitHandler: function (form) {
    form.submit();
    }
    });
    }
    }
    //when the dom has loaded setup form validation rules
    $(D).ready(function ($) {
    JQUERY4U.UTIL.setupFormValidation();
    });
    })(jQuery, window, document);
    </script>


<?php  
include 'footer.php';
?>