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
           echo URLROOT."/products/category/".$value->cate_id
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

            <div class="carousel-item active">
                <img class="d-block w-100" src="public/img/<?php echo $data["banners"][0]->image ?>">
            </div>
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

    <div class="container">
        <h3 class="justify-content-center py-5 d-flex align-items-start">PRODUCTS FEATURE</h3>
        <div class="row d-flex flex-wrap">
            <?php
              foreach ($data["products"] as $key => $value) :
            ?>

            <div class="col-12 col-sm-8 col-md-3 col-lg-2 my-3 p-0 m-0 rounded-md px-2">
                <a class="text-decoration-none" href="<?php echo URLROOT."/products/details/".$value->id?>">
                    <img class=" card-img" src="public/img/<?=$value->image ?>" alt="Vans"
                        style="height:150px; object-fit: cover">
                    <div class="card-body py-2 m-0  px-1 p-0" style="line-height:1px">
                        <h6 class="text-danger">$ <?php echo $value->price ?></h6>
                        <p class="text-secondary" style="font-size:14px"><?php echo $value->category_name ?></p>
                    </div>
                </a>
            </div>
            <?php
               endforeach
            ?>
        </div>
    </div>
    <div class="container">
        <h3 class="justify-content-center py-5 d-flex align-items-start">PARTNER</h3>
        <div class="row d-flex flex-wrap">
            <?php
              foreach ($data["banners"] as $key => $value) :
            ?>

            <div class="col-12 col-sm-8 col-md-3 col-lg-2 my-3 p-0 m-0 rounded-md px-2">
                <a class="text-decoration-none"
                    href="<?php echo "#"//echo URLROOT."/products/details/".$value->banner_id?>">
                    <img class=" card-img m-auto" src="public/img/<?=$value->image ?>" alt="Vans"
                        style="height:100px; width:100px; border-radius:100% ; object-fit: cover">
                    <div class="card-body text-center py-2 m-0  px-1 p-0" style="line-height:1px">
                        <p class="text-secondary mt-1" style="font-size:14px"><?php echo $value->title ?></p>
                    </div>
                </a>
            </div>
            <?php
               endforeach
            ?>
        </div>
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