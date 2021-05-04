<?php
  /*
  * product Details Page
  */

  // Start Header
  require_once APPROOT.'/views/layouts/header.php';
  // print_r($product);
  // End Header
?>

  <h1 class="text-center pt-4 mb-4 text-primary text-uppercase"><?= $title ?></h1>
  <section class="section product-detail">
    <?php if($product != null):?>
      <div class="details container">
        <div class="left">
          <div class="main">
            <img src="<?= URLROOT.'/public/uploads/'.$product->image ?>">
          </div>
        </div>
        <div class="right">
          <h2><?= $product->name ?></h2>
          <div class="product-price">
              <p class="new-price">Price: <span>$<?= $product->price ?></span></p>  
              <div class = "product-rating">
                  <i class = "fas fa-star"></i>
                  <i class = "fas fa-star"></i>
                  <i class = "fas fa-star"></i>
                  <i class = "fas fa-star"></i>
                  <i class = "fas fa-star-half-alt"></i><span style="color: red;">(4.5)</span>
              </div>   
          </div>
          <form class="form">
            <input type="text" placeholder="1" />
            <a href="#" class = "buynow">Buy Now</a>
            <a href="#" class="addCart">Add To Cart<i class = "fas fa-shopping-cart"></i></a>
          </form>
          <h3>Product Description</h3>
          <p>
            <?= $product->description ?>
          </p>
        </div>
      </div>
     <?php endif; ?>
  </section>
   <!--Recommented For You-------------------------------->
   <section class="new-arrival">
            
            <!--heading-------->
            <div class="arrival-heading">
                <strong>Recommented For You</strong>
            </div>
            
              <!--products----------------------->
              <div class="product-container">
              
              <?php
                  foreach ($data["recomments"] as $key => $value) :
              ?>
               <div class="product-box">
                      <!--product-img------------>
                      <div class="product-img">
                          <!--add-cart---->
                          <a class="text-decoration-none add-cart">
                              <i class="fas fa-shopping-cart"></i>
                            </a>
                          <!--img------>
                          <a  href="<?php echo URLROOT."/products/details/".$value->id?>">
                            <img src="<?= URLROOT.'/public/uploads/'.$value->image ?>">
                          </a>
                      </div>
                      <!--product-details-------->
                      <div class="product-details">
                          <a href="#" class="p-name"><?php echo $value->name ?></a>
                          <span class="p-price">$<?php echo $value->price ?></span>
                      </div>
                  </div>
              
              
              <?php
                 endforeach
              ?>
              </div>
          </section>
<!-- Start Footer -->
<?php require_once APPROOT.'/views/layouts/footer.php'; ?>
<!-- End Footer -->