<?php
include 'header.php';
?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-3 text-white animated slideInRight">Lomaster registergin</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb animated slideInRight mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">master register</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<div class="container-fluid py-5 my-5 px-0" style="width: 50%;">
    <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="width: 50%;">
        <p class="fw-medium text-uppercase text-primary mb-2">master register</p>
    </div>
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <div class="card" style="width: 60%;">
                <div class="card-body">
                    <center><h5 class="card-title">master register</h5></center>

                    <!-- Vertical Form -->
                    <form class="row g-3" action="/master_reg/" method="post" id="myform" enctype="multipart/form-data">
                    <div class="col-12">
                        <label for="use" class="form-label">Username</label>
                        <input type="text" name="use" class="form-control" id="use" required>
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" name="pas" class="form-control" id="password" required>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary btn-sm" value="Register">
                    </div>
                    </form><!-- Vertical Form -->
                </div>
            </div>
        </div> 
    </div>
</div>

<?php  
include 'footer.php';
?>
