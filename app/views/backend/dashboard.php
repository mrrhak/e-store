<?php require_once 'layouts/header.php' ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-box-open"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">All Products</span>
                            <span class="info-box-number">1000</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-th"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">All Categories</span>
                            <span class="info-box-number">40</span>
                        </div>
                    </div>
                </div>

                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">All Orders</span>
                            <span class="info-box-number">760</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i
                                class="fas fa-users text-light"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">All Users</span>
                            <span class="info-box-number">7</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<?php require_once 'layouts/footer.php' ?>