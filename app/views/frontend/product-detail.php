<?php
/*
  * product Details Page
  */

// Start Header
require_once APPROOT . '/views/layouts/header.php';
// print_r($product);
// End Header
?>

<h1 class="text-center pt-4"><?= $title ?></h1>
<section class="section product-detail">
  <?php if ($product != null) : ?>
    <div class="details container">
      <div class="left">
        <div class="main">
          <img src="<?= URLROOT . '/public/img/' . $product->image ?>">
        </div>
      </div>
      <div class="right">
        <h2><?= $product->name ?></h2>
        <div class="product-price">
          <p class="new-price">Price: <span>$<?= $product->price ?></span></p>
          <div class="product-rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i><span style="color: red;">(4.5)</span>
          </div>
        </div>
        <form class="form" name="productForm" method="POST">
          <input type="number" style="width: 100px;" placeholder="1" value="1" />
          <a href="#" onclick="buyNow(event,'<?=$product->id?>')" class="buynow">Buy Now</a>
          <a href="#" onclick="addToCart(event,'<?=$product->id?>')" class="addCart">Add To Cart<i class="fas fa-shopping-cart"></i></a>
        </form>
        <h3>Product Detail</h3>
        <p>
          <?= $product->description ?>
        </p>
      </div>
    </div>
  <?php endif; ?>
</section>
<section class="section related-products">
  <div class="title">
    <h2>Recommented for You</h2>
  </div>
  <div class="product-layout container">
    <div class="product">
      <div class="img-container">
        <img src="https://www.ice-watch.com/sites/default/files/styles/watch_slide/public/montres/018946_01.png?itok=odzz4JG5" alt="" />
        <div class="addCart">
          <i class="fas fa-shopping-cart"></i>
        </div>

        <ul class="side-icons">
          <span><i class="fas fa-search"></i></span>
          <span><i class="far fa-heart"></i></span>
          <span><i class="fas fa-sliders-h"></i></span>
        </ul>
      </div>
      <div class="bottom">
        <a href="">Watch</a>
        <div class="product-price">
          <p class="last-price">Old Price: <span>$400</span></p>
          <p class="new-price">New Price: <span>$360(10%)</span></p>
        </div>
      </div>
    </div>
    <div class="product">
      <div class="img-container">
        <img src="https://static.zajo.net/content/mediagallery/zajo_dcat/image/product/types/X/9088.png" alt="" />
        <div class="addCart">
          <i class="fas fa-shopping-cart"></i>
        </div>

        <ul class="side-icons">
          <span><i class="fas fa-search"></i></span>
          <span><i class="far fa-heart"></i></span>
          <span><i class="fas fa-sliders-h"></i></span>
        </ul>
      </div>
      <div class="bottom">
        <a href="">T-shirt</a>
        <div class="product-price">
          <p class="last-price">Old Price: <span>$150</span></p>
          <p class="new-price">New Price: <span>$120 (20%)</span></p>
        </div>
      </div>
    </div>
    <div class="product">
      <div class="img-container">
        <img src="https://images-na.ssl-images-amazon.com/images/I/71D9ImsvEtL._AC_UL1500_.jpg" alt="" />
        <div class="addCart">
          <i class="fas fa-shopping-cart"></i>
        </div>

        <ul class="side-icons">
          <span><i class="fas fa-search"></i></span>
          <span><i class="far fa-heart"></i></span>
          <span><i class="fas fa-sliders-h"></i></span>
        </ul>
      </div>
      <div class="bottom">
        <a href="">Shoes</a>
        <div class="product-price">
          <p class="last-price">Old Price: <span>$350</span></p>
          <p class="new-price">New Price: <span>$280 (20%)</span></p>
        </div>
      </div>
    </div>
    <div class="product">
      <div class="img-container">
        <img src="http://cdn.shopify.com/s/files/1/0406/6174/5832/products/WDBK1547_BambiTattooAOPMini_3Q_1200x1200.jpg?v=1611625529" alt="" />
        <div class="addCart">
          <i class="fas fa-shopping-cart"></i>
        </div>

        <ul class="side-icons">
          <span><i class="fas fa-search"></i></span>
          <span><i class="far fa-heart"></i></span>
          <span><i class="fas fa-sliders-h"></i></span>
        </ul>
      </div>
      <div class="bottom">
        <a href="">Bambi Print Mini Backpack</a>
        <div class="product-price">
          <p class="last-price">Old Price: <span>$200</span></p>
          <p class="new-price">New Price: <span>$140 (30%)</span></p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Start Footer -->
<?php require_once APPROOT . '/views/layouts/footer.php'; ?>
<!-- End Footer -->
<script>
  function addToCart(e,id){
    $.ajax()
  }
</script>