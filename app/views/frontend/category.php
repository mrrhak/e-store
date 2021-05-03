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
    
    
    
    
    </main>







<?php require_once APPROOT.'/views/layouts/footer.php'; ?>