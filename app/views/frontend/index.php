<?php
  /*
  * Home Page
  */

  // Past to header
  //echo $data['title'];

  // Start Header
  require_once APPROOT.'/views/layouts/header.php';
  // End Header
?>

<?php
   $menu = array("Clothes", "Eletronic", "Toys", "Machince");
?>
<!-- Begin page content -->
<main class="flex-shrink-0">

    <!--Slide body-->
    <div class="container py-3 m-auto header-filter-button"
        style="overflow-x:scroll; display: block; overflow-x: auto; white-space: nowrap">
        <?php
           foreach ($menu as $key => $value) : ?>
        <button class="btn-menu px-4 py-2 bg-red mx-2">
            <?php
               echo $value
            ?>
        </button>
        <?php
            endforeach
         ?>
    </div>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100"
                    src="https://ae01.alicdn.com/kf/H047ca541cfb1434abc11f14c40e82ebck.jpg_Q90.jpg_.webp">
            </div>
            <div class="carousel-item">
                <img src="https://ae01.alicdn.com/kf/H81c0e86bf41247f99abee482aa870605A.png_.webp" class="d-block w-100"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://ae01.alicdn.com/kf/H047ca541cfb1434abc11f14c40e82ebck.jpg_Q90.jpg_.webp"
                    class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="w-100 d-block ">
        <?php
         for ($i=0; $i < 3; $i++) :
      ?>
        <div class="d-block">
            <h3 class="justify-content-center py-5 d-flex align-items-start">BROWSE TOP SELLING PRODUCTS</h3>
            <div class="container pb-3 m-auto header-filter-button"
                style="overflow-x:scroll; display: block; overflow-x: auto; white-space: nowrap">
                <?php
           for ($i=0; $i < 5; $i++) : ?>
                <button class="btn-menu px-4 py-2 bg-red mx-2">
                    Clothes
                </button>
                <?php
            endfor
         ?>
            </div>
            <div id="promotionItemsSlide" class="carousel slide container m-auto " data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#promotionItemsSlide" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#promotionItemsSlide" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#promotionItemsSlide" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner d-block">

                    <div class="carousel-item active container-fluid">
                        <div class="row overflow-hidden vh-100">
                            <?php
                         for ($i=0; $i < 4 ; $i++):
                        ?>
                            <div class="col-3 overflow-hidden">
                                <div class="card w-100 position-relative">
                                    <button class="position-absolute btn-menu px-3 py-2" style="top:15px; right:5px">
                                        <i class="fas fa-shopping-bag me-1"></i>
                                        Add Cart
                                    </button>
                                    <button class="position-absolute btn-menu px-3 py-2" style="top:60px; right:5px">
                                        <i class="fas fa-eye me-1"></i>
                                        View</button>
                                    <img src="https://preview.colorlib.com/theme/divisima/img/product/4.jpg"
                                        class="card-img-top" alt="...">

                                    <div class="card-body w-100 d-flex justify-content-between">
                                        <p class="card-text col-2 w-75">$35,00Black and White Stripes</p>
                                        <span class="text-danger">$66 </span>
                                    </div>
                                </div>
                            </div>
                            <?php
                           endfor
                        ?>
                        </div>
                    </div>



                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
        <?php
       endfor
    ?>
    </div>



</main>


<!-- Start Footer -->
<?php require_once APPROOT.'/views/layouts/footer.php'; ?>
<!-- End Footer -->