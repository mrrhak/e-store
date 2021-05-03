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
           foreach ($data["categories"] as $key => $value) : ?>

        <a href="<?php
           echo URLROOT."/product/category/".$value->cate_id
        ?>" class="btn-menu px-4 py-2 bg-red mx-2 text-decoration-none">
            <?php
               echo $value->category_name
            ?>
        </a>
        <?php
            endforeach;
         ?>
    </div>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner mt-5">

            <!--<div class="carousel-item active">
                <img class="d-block w-100" src="public/img/<?php echo $data["banners"][0]->image ?>">
            </div>-->
            <?php
                 foreach ($data["banners"] as $key => $value) :
              ?>
            <?php if( $value->category_name === "Fashions"): ?>
            <div class="carousel-item<?php
             if($key===0) :
            ?> active <?php
                endif
            ?>">
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

    <!--  -->

    <section class="pt-3 pb-5">
        <div class="container">
            <h1 class="text-center pb-4">PRODUCTS FEATURE</h1>
            <div class="row mb-md-2">
                <?php
                foreach ($products as $key => $product) :
                ?>

            	<div class="col-md-6 col-lg-4">
                    <a href="<?php echo URLROOT."/products/details/".$product->id?>">
                    <div class="card shadow-sm border-light mb-4">
                        <img src="public/img/<?=$product->image ?>" class="card-img-top" style="object-fit: cover" alt="<?= $product->name ?>">
                        <div class="card-body">
                                <h5 class="font-weight-normal text-primary"><?= mb_strimwidth($product->name, 0, 70, "...") ?></h5>
                            <div class="post-meta"><span class="small lh-120 text-secondary"><?= mb_strimwidth($product->description, 0, 100, "...") ?></span></div>
                            <div class="d-flex my-4">
                                <i class="star fas fa-star text-warning"></i>
                                <i class="star fas fa-star text-warning"></i>
                                <i class="star fas fa-star text-warning"></i>
                                <i class="star fas fa-star text-warning"></i>
                                <i class="star fas fa-star text-warning"></i>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="col pl-0"><span class="text-muted font-small d-block mb-2">Price</span> <span class="h5 text-dark font-weight-bold">$<?= $product->price ?></span></div>
                                <div class="col"><span class="text-muted font-small d-block mb-2">Category</span> <span class="h5 text-dark font-weight-bold"><?= mb_strimwidth($product->category_name, 0, 10, "...") ?></span></div>
                                <div class="col pr-0"><span class="text-muted font-small d-block mb-2">Available</span> <span class="h5 text-dark font-weight-bold"><?= $product->qty ?></span></div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

                <?php
                endforeach
                ?>
            </div>
        </div>
    </section>            

    
    <!--  -->

    <div class="container">
        <h3 class="text-center py-3">PARTNER</h3>
        <div class="row mb-md-2">
            <?php
              foreach ($banners as $key => $banner) :
            ?>
            <div class="col-md-3 col-lg-2">
                <!-- <a href="#"> -->
                <div class="card shadow-sm border-light mb-4">
                    <img src="public/img/<?=$banner->image ?>" class="card-img-top" style="height: 130px; object-fit: cover;" alt="<?= $banner->title ?>">
                    <div class="card-body">
                        <h6 class="font-weight-normal text-primary text-center"><?= mb_strimwidth($banner->title, 0, 25, "...") ?></h6>
                    </div>
                </div>
                <!-- </a> -->
            </div>

            <?php endforeach ?>
        </div>
    </div>

</main>


<!-- Start Footer -->
<?php require_once APPROOT.'/views/layouts/footer.php'; ?>
<!-- End Footer -->


<script>
let test = "<?php $data["banners"]?>"

// console.log("test", <?php
//  echo $data["banners"][0]->image
// ?>)
const groupBy = (key, arr) => arr.reduce((cache, products) => ({
    ...cache,
    [products[key]]: products[key] in cache ?
        cache[products[key]].concat(products) : [products]
}), {})

//console.log("banners:::", groupBy("color", ))
</script>