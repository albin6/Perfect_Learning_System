<?php
ob_start();
include 'header.php';
include 'session.php';
include '../connection.php';
$st_id = $_SESSION['student']['log_id'];
?>
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-4">Change Password</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Change Password</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid py-5 my-5 px-0" style="width: 50%;">
    <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="width: 50%;">
        <p class="fw-medium text-uppercase text-primary mb-2">Change Password</p>
    </div>
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <div class="card" style="width: 60%;">
                <div class="card-body">
                    <center><h5 class="card-title">Change Password</h5></center>

                    <!-- Vertical Form -->
                    <form class="row g-3" action="" method="post" id="myForm">
                    <div class="col-12">
                        <label for="use" class="form-label">Current Password</label>
                        <input type="password" name="cpassword" class="form-control" id="cpassword" required>
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">Confirm Password</label>
                        <input type="password" name="cpass" class="form-control" id="cpassw" required>
                    </div>
                    <div class="text-center">
                        <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Submit">
                    </div>
                    </form><!-- Vertical Form -->
                </div>
            </div>
        </div> 
    </div>
</div>
<?php
if(isset($_POST['submit']))
    {
        $cpassword=$_POST['cpassword'];
        $password=$_POST['password'];

        $sql=mysqli_query($con,"select * from tb_login where log_id='$st_id'");
        $r=mysqli_fetch_array($sql);

        if($r['password'] == $cpassword){
            mysqli_query($con,"update tb_login set password='$password' where log_id='$st_id'");
            echo '<script>alert("Your Password has been Reset successfully");window.location="change_password.php";</script>';

        }
        else{
            echo '<script>alert("Enter valid current Password");window.location="change_password.php";</script>';
        }
    }
?>
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
    $("#myForm").validate({
    ignore: [],
    rules: {
                
            password: {
                        required: true,
                         regex : /^[A-Za-z0-9@#*]+$/,
                         minlength: 5,
                        maxlength: 15,
        
                    },
                cpass: {
                    required: true,
                       regex : /^[A-Za-z0-9@#*]+$/,
                       minlength: 5,
                      maxlength: 15,
                  equalTo: "#password"
    
                },
                
                
              },
              messages: {

                password: "Please Enter Valid Password Name(8-15 digit alphanumeric  password  and must include @#*!%^& special character,any Number",
                cpassw: "Please Enter Valid Password Name(5-15 digit alphanumeric confirm password and same as above password and @#* also allowed",
                
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

<?php  include 'footer.php'; ?>

