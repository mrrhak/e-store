<?php
  /*
  * product Details Page
  */

  // Start Header
  require_once APPROOT.'/views/layouts/header.php';
  // print_r($product);
  // End Header
?>

  <h1 class="text-center pt-4"><?= $title ?></h1>
  <section class="section product-detail">
    <?php if($product != null):?>
      <div class="details container">
        <div class="left">
          <div class="main">
            <img src="<?= URLROOT.'/public/img/'.$product->image ?>">
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
          <h3>Product Detail</h3>
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
                  
                <!--product-box-1---------->
                  <div class="product-box">
                      <!--product-img------------>
                      <div class="product-img">
                          <!--add-cart---->
                          <a href="#" class="add-cart">
                              <i class="fas fa-shopping-cart"></i>
                            </a>
                          <!--img------>
                        <img src="https://lh3.googleusercontent.com/proxy/JcA9zxEK5ApCDy40-iQfKUl8JrFjhZlPaE128LrV-qm4RSzmkTc4ZuwRv0jkz5SzVPiMjGXBECZDfjKtq7SYVgg3ugn5C2VCBQvFwQRRIeMR8WRKYev2bJscqbk">
                      </div>
                      <!--product-details-------->
                      <div class="product-details">
                          <a href="#" class="p-name">TOYOTA</a>
                          <span class="p-price">$52000.00</span>
                      </div>
                  </div>
                    <!--product-box-2---------->
                    <div class="product-box">
                        <!--product-img------------>
                        <div class="product-img">
                            <!--add-cart---->
                          <a href="#" class="add-cart"><i class="fas fa-shopping-cart"></i></a>
                          <!--img------>
                          <img src="https://img.sm360.ca/ir/w640h333c/images/newcar/ca/2021/land-rover/range-rover-phev/hse/suv/exteriorColors/12725_cc0640_032_1aa.png">
                        </div>
                        <!--product-details-------->
                        <div class="product-details">
                            <a href="#" class="p-name">RANGE ROVER</a>
                            <span class="p-price">$220000.00</span>
                        </div>
                    </div>
                  <!--product-box-3---------->
                  <div class="product-box">
                    <!--product-img------------>
                    <div class="product-img">
                        <!--add-cart---->
                        <a href="#" class="add-cart"><i class="fas fa-shopping-cart"></i></a>
                        <!--img------>
                      <img src="https://s.aolcdn.com/commerce/autodata/images/USC90BMC681A021001.jpg">
                    </div>
                    <!--product-details-------->
                    <div class="product-details">
                        <a href="#" class="p-name">BMW</a>
                        <span class="p-price">$500000.00</span>
                    </div>
                </div>
                  <!--product-box-4---------->
                  <div class="product-box">
                    <!--product-img------------>
                    <div class="product-img">
                        <!--add-cart---->
                        <a href="#" class="add-cart"><i class="fas fa-shopping-cart"></i></a>
                        <!--img------>
                      <img src="https://cdn.hum3d.com/wp-content/uploads/Lamborghini/041_Lamborghini_Urus_2019/Lamborghini_Urus_2019_600_0001.jpg">
                    </div>
                    <!--product-details-------->
                    <div class="product-details">
                        <a href="#" class="p-name">LAMBORGHINI</a>
                        <span class="p-price">$600000.00</span>
                    </div>
                </div>
              </div>
          </section>
<!-- Start Footer -->
<?php require_once APPROOT.'/views/layouts/footer.php'; ?>
<!-- End Footer -->