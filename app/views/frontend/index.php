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
        <div class="carousel-inner mt-5">

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

    <div class="container">
        <h3 class="justify-content-center py-5 d-flex align-items-start">TOP SELLING PRODUCTS</h3>
        <div class="row d-flex flex-wrap">
            <?php
              foreach ($data["products"] as $key => $value) :
            ?>

            <div class="col-12 col-sm-8 col-md-6 col-lg-3 my-3">
                <div class="card">
                    <img class="card-img" src="public/img/<?=$value->image ?>" alt="Vans"
                        style="height:200px; object-fit: cover">
                    <div class="card-body">
                        <h6 class="card-title"><?php
                           echo $value->name
                        ?></h6>
                        <h6 class="mb-2 text-muted"><?php
                         echo $value->category_name
                        ?></h6>
                        <span class="card-text">
                            <?php
                            echo $value->description
                        ?>
                        </span>
                        <div class="buy d-flex justify-content-between align-items-center">
                            <div class="price text-success">
                                <h5 class="mt-4 text-danger">$<?php
                                   echo $value->price
                                ?></h5>
                            </div>
                            <a href="<?php
                               echo URLROOT."/product/".$value->id
                            ?>" class="btn btn-danger mt-3"><i class="fas fa-eye me-1"></i> View</a>
                        </div>
                    </div>
                </div>
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