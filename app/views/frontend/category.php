<?php

//  var_dum($data["products"])
  require_once APPROOT.'/views/layouts/header.php';

?>

<main class="flex-shrink-0 mt-1">

    <!--Slide body-->
    <div class="container py-3 m-auto header-filter-button"
        style="overflow-x:scroll; display: block; overflow-x: auto; white-space: nowrap">
        <?php
           foreach ($data["categories"] as $key => $value) : ?>
        <a href="<?php
           echo URLROOT."/products/category/".$value->cate_id
        ?>" class="px-4 py-2 mx-2 text-decoration-none btn-menu">
            <?php
               echo $value->category_name
            ?>
        </a>
        <?php
            endforeach;
         ?>
    </div>
    
    <section class="new-arrival">
              <!--products----------------------->
              <div class="product-container">
              
              <?php
                  foreach ($data["products"] as $key => $value) :
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
                            <img src="<?= URLROOT.'/public/img/'.$value->image ?>">
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
    
    
    
    
    </main>







<?php require_once APPROOT.'/views/layouts/footer.php'; ?>