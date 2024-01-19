<?php
include 'header.php';
?>

<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="static/user/img/l1.jpeg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-10">
                                <h5 class="text-light text-uppercase mb-3 animated slideInDown">Welcome to PERFECT LEARNING SYSTEM</h5>
                                <h1 class="display-2 text-light mb-3 animated slideInDown">Be educated so that you can change the world.</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="static/user/img/l2.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-10">
                                <h5 class="text-light text-uppercase mb-3 animated slideInDown">Welcome to PERFECT LEARNING SYSTEM</h5>
                                <h1 class="display-2 text-light mb-3 animated slideInDown">An educated mind is better than an empty one.</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<?php  
include 'footer.php';
?>