<?php
ob_start();
include 'header.php';
include 'session.php';
include '../connection.php';
$st_id = $_SESSION['student']['log_id'];
?>
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-3 text-white animated slideInRight">Profile</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb animated slideInRight mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row justify-content-center">
    <div class="card" style="width: 40%;">
        <div class="card-body">
            <center><h5 class="card-title">Profile</h5></center>
            <form action="" method="post" id="myform">
            <?php
                    $sql = mysqli_query($con,"select * from tb_student_register where log_id='$st_id'");
                    while($r=mysqli_fetch_array($sql)) { ?>
            <div class="col-12">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" value="<?php echo $r['name']; ?>" id="name" name="name" required>
            </div>
            <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" style="height: 100px" id="address"  name="address" required><?php echo $r['address']; ?></textarea>
            </div>
            <div class="col-12">
                <label for="phone" class="form-label">Contact Number</label> 
                <input type="number"  name="phone" class="form-control" value="<?php echo $r['contact_no']; ?>" id="phone" required>
            </div>
            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email" value="<?php echo $r['email']; ?>" required>
            </div><br>
            <div class="text-center">
                <input type="submit" name="submit" class="btn btn-primary btn-sm" value="update">
            </div><br>
            <?php } ?>
            <div class="text-center">
                <a href="change_password.php" class="btn btn-primary btn-sm">Change password</a>
            </div>
        </form>
        </div>  
    </div>
</div>


<?php 
if (isset($_POST['submit'])){

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    
    mysqli_query($con,"update tb_student_register set name='$name',address='$address',contact_no='$phone',email='$email' where log_id='$st_id'");
    
    echo '<script>alert("Updated Successfully");window.location="profile.php"</script>';
    
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
    
                
              },
                  messages: {
        
                    phone: "Please Enter Valid 10 digit Phone Number - Starting from 6, 7 or 8 or 9",
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