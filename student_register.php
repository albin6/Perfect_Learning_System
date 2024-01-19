<?php
ob_start();
include 'header.php';
include 'connection.php'
?>

<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-4">Student Register</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Student Register</li>
            </ol>
        </nav>
    </div>
</div>


<div class="container-fluid py-5 my-5 px-0">
    <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
        <p class="fw-medium text-uppercase text-primary mb-2">Student Register</p>
    </div>
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <div class="card" style="width: 45%;">
                <div class="card-body">
                    <center><h5 class="card-title">Student Register</h5></center>

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
                        <input type="number" name="phone" class="form-control" id="phone" required>
                    </div>
                    <div class="col-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Department</label>
                        <select name="dep_id" class="form-select" id="dep_id" required>
                            <option value="">--Select--</option>
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
                    <div class="col-6">
                        <label for="sm_id" class="form-label">Semester</label>
                        <select name="sm_id" class="form-select" id="sm_id" required>
                            <option value="">--Select--</option>
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
                    </div>          
                    <div class="col-6">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username" required>
                        <span id="cb" name="cb"></span>
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
    </div>
</div>


<?php 
if (isset($_POST['submit'])){

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dep_id = $_POST['dep_id'];
    $sm_id = $_POST['sm_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql=mysqli_query($con,"select * from tb_login where username='$username'");
    $n=mysqli_num_rows($sql);

    if($n==0){
        mysqli_query($con,"insert into tb_login (username,password,role,status) values ('$username','$password','student',0)");
        $log_id = mysqli_insert_id($con);
        mysqli_query($con,"insert into tb_student_register (name,address,contact_no,email,dep_id,sm_id,log_id) values ('$name','$address','$phone','$email','$dep_id','$sm_id','$log_id')");
        
        echo '<script>alert("Registered Successfully");window.location="student_register.php"</script>';
    }   
    else{
    echo '<script>alert("Username already exist");window.location="student_register.php"</script>';
    }
    
}
?>


<script src="static/Validation/jquery-1.11.1.min.js"></script>
<script src="static/Validation/jquery_validate.js"></script>
<script src="static/Validation/additional_validate.js"></script>


     
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