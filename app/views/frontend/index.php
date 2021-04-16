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

<!-- Begin page content -->
<main class="flex-shrink-0">

    <!--Slide body-->
    <div class="container py-3 m-auto header-filter-button"
        style="overflow-x:scroll; display: block; overflow-x: auto; white-space: nowrap">
        <?php
        $menu = array("Clothes", "Eletronic", "Toys", "Machince" ,"Clothes", "Eletronic", "Toys", "Machince" , "Clothes", "Eletronic", "Toys", "Machince");
           foreach ($data["categories"] as $key => $value) : ?>
        <button class="btn-menu px-4 py-2 bg-red mx-2">
            <?php
               echo $value->category_name
            ?>
        </button>
        <?php
            endforeach;
         ?>
    </div>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img class="d-block w-100" src="public/img/<?php echo $data["banners"][0]->image ?>">
            </div>
            <?php
                 foreach ($data["banners"] as $key => $value) :
              ?>
            <?php if($key > 0 && $value->category_name === "Fashions"): ?>
            <div class="carousel-item">
                <img class="d-block w-100" src="public/img/<?php echo $value->image  ?>">
            </div>
            <?php  endif ;?>
            <?php
               endforeach ;
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
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


<script>
let test = "<?php $data["banners"]?>"

console.log("test", <?php
 echo $data["banners"][0]->image
?>)
const groupBy = (key, arr) => arr.reduce((cache, products) => ({
    ...cache,
    [products[key]]: products[key] in cache ?
        cache[products[key]].concat(products) : [products]
}), {})

//console.log("banners:::", groupBy("color", ))
</script>