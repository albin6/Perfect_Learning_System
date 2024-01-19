<?php
ob_start();
include 'header.php';
include 'connection.php';
session_start();
?>

<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-4">Login</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Login</li>
            </ol>
        </nav>
    </div>
</div>



<div class="container-fluid py-5 my-5 px-0" style="width: 50%;">
    <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="width: 50%;">
        <p class="fw-medium text-uppercase text-primary mb-2">Login</p>
    </div>
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <div class="card" style="width: 60%;">
                <div class="card-body">
                    <center><h5 class="card-title">Login</h5></center>

                    <!-- Vertical Form -->
                    <form class="row g-3"  method="post" action="" id="myform">
                    
                    <div class="col-12">
                        <label for="use" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="use" required>
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <div class="text-center">
                        <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Login">
                    </div>
                    </form><!-- Vertical Form -->

                    <?php
    

    if(isset($_POST['submit']))
    {

        
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sql=mysqli_query($con,"select * from tb_login where username='$username' and password='$password'");
        
        $r=mysqli_fetch_array($sql);

        if ($r['role']=='admin'){
            $_SESSION['master']=$r;
            
            header('location:master/home.php');
        }
        else if($r['role']=='student'){
            if($r['status'] == 1){

            $_SESSION['student']=$r;
            header('location:student/home.php');
            }
            else{
                echo '<script>alert("Admin approval required");window.location="login.php";</script>';
            }
        }
        else if($r['role']=='teacher'){
            $_SESSION['teacher']=$r;
            header('location:teacher/home.php');

        }
        
        
        else
        {
            echo '<script>alert("Invalid username or password!!");window.location="login.php";</script>';
        }
            
    }
    mysqli_close($con);
?>
                </div>
            </div>
        </div> 
    </div>
</div>






<?php  
include 'footer.php';
?>

