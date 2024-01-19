<?php
ob_start();
include 'header.php';
include '../connection.php';
include 'session.php';
?>
<div class="pagetitle">
    <h1>Home</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Home</li>
      </ol>
    </nav>
</div><!-- End Page Title -->
<br><br>
<center><h3 style="color: rgb(96, 135, 170);"><b>Welcome To Admin Panel<?php $m = $_SESSION['master']['role']; echo $m ?></b></h3></center>
<!-- <section class="section dashboard"> 
    
      Left side columns 
            <div class="row">
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                            <h6>Select</h6>
                            </li>
        
                            <li><a class="dropdown-item" href="/category">Add Category</a></li>
                            <li><a class="dropdown-item" href="/item">Add Item</a></li>
                            <li><a class="dropdown-item" href="/stock_borma">Stock Update</a></li>
                        </ul>
                        </div>

                    <div class="card-body">
                        <h5 class="card-title">Add Product <span>| Category</span></h5>

                        <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-journal-text"></i>
                        </div>
                        <div class="ps-3">
                            <a href="/category"><h5>Add Product Category</h5></a>

                        </div>
                        </div>
                    </div>

                    </div>
                </div>

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Add Product <span>| type</span></h5>

                        <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-box"></i>
                        </div>
                        <div class="ps-3">
                            <a href="/bakery_list"><h5>Add Product type</h5></a>
                        </div>
                        </div>
                    </div>

                    </div>
                </div>

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Add Product <span>| Price</span></h5>

                        <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-box"></i>
                        </div>
                        <div class="ps-3">
                            <a href="/bakery_list"><h5>Add Product Price</h5></a>
                        </div>
                        </div>
                    </div>

                    </div>
                </div>

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Contractor <span>| List</span></h5>

                        <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <a href="/baker_oredr"><h5>Contractor List</h5></a>
                        </div>
                        </div>
                    </div>

                    </div>
                </div>

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Add <span>| Employee</span></h5>

                        <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-card-list"></i>
                        </div>
                        <div class="ps-3">
                            <a href="/view_b_feedback"><h5>Add Employee</h5></a>
                        </div>
                        </div>
                    </div>

                    </div>
                </div>

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Feedback <span>| </span></h5>

                        <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-card-list"></i>
                        </div>
                        <div class="ps-3">
                            <a href="/view_b_feedback"><h5>Feedback</h5></a>
                        </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        
    
</section> -->
  
<?php  
include 'footer.php';
?>