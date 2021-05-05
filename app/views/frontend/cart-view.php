<?php
/*
  * Home Page
  */

// Past to header
//echo $data['title'];

// Start Header
require_once APPROOT . '/views/layouts/header.php';
// End Header
?>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <div class="main-body">
      <!-- Breadcrumb -->
      <h2 class="text-center m-4" style="font-size: 40px;">My Carts</h2>
      <!-- <h1>ID : <?= isset($product->name) ?? $product->name ?></h1> -->
      <table id="table" class="table table-striped table-hover">
        <thead class="table-dark">
          <tr>
            <th scope="col">NO</th>
            <th scope="col">PICTURE</th>
            <th scope="col">PRODUCT</th>
            <th scope="col">PRICE</th>
            <th scope="col">QUANTITY</th>
            <th scope="col">SUBTOTAL</th>
            <th scope="col">ACTION</th>
          </tr>
        </thead>
        <tbody>
          <!-- <?= json_encode($carts) ?> -->
          <?php $TotalPrice = 0; ?>
          <form class="qty-form" name="form">
            <?php foreach ($carts as $key => $cart) : ?>
              <tr id="cartTable<?=$cart->cart_id?>" style="vertical-align: middle;">
                <th><?= $key + 1 ?></th>
                <td><img width="50px" src="<?= URLROOT . '/public/uploads/' . $cart->image ?>"></td>
                <td><?= $cart->name ?></td>
                <td><?= $cart->price ?></td>
                <td>
                  <fieldset class="mt-3">
                    <input type="button" value="-" onclick="decreaseValue(<?= $cart->cart_id ?>)" class="decrease btn-increase" />
                    <input type="text" disabled name="qty" style="width: 50px;text-align: center;" id="<?= $cart->cart_id ?>" value="<?= $cart->cart_qty ?>" />
                    <input type="button" value="+"  onclick="increaseValue(<?= $cart->cart_id ?>)" class="increase btn-increase" />
                  </fieldset>
                </td>
                <td><?= '$ ' . number_format($cart->price * $cart->cart_qty, 2, '.', '') ?></td>
                <td><input type="button" value="Remove" onclick="removeCart(<?= $cart->cart_id ?>)" class="btn btn-sm btn-outline-danger"></td>
              </tr>
              <?php (float)$TotalPrice += (float)($cart->price * $cart->cart_qty); ?>
            <?php endforeach; ?>   
            <?php if(count($carts)<1): ?>
              <tr class="text-danger"><td colspan="7" style="text-align: center;">No recored ...!</td></tr>
            <?php endif; ?>
          </form>          
        </tbody>
      </table>      
    </div>
    <?php if(!$TotalPrice == 0):?>
      <div class="col-md-6 mb-5">
        <div class="h-100 p-3 bg-light border rounded-3">        
          <h2>CART TOTALS</h2>
          <hr>
          <div class="d-flex justify-content-between">
            <p style="text-align: left;">Total</p>
            <p><?= $TotalPrice ?></p>
          </div>
          <div class="d-flex justify-content-between">
                <p style="text-align: left;">Shipping Address</p>
                <address style="text-align: right;"><?=$user->address1.'<br>',$user->address2?></address>
          </div>
          <hr>
          <!-- <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p> -->
          <a href="#" class="btn btn-outline-primary" type="button">Checkout Now</a>
        </div>
      </div>
    <?php else:?>
      <a href="<?= URLROOT ?>/">goto homepage</a>
    <?php endif?>
  </div>
</main>

<!-- Start Footer -->
<?php require_once APPROOT . '/views/layouts/footer.php'; ?>
<!-- End Footer -->

<script>
  let Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: true,
    timer: 8000
  })

  function increaseValue(id) {
    var value = parseInt(document.getElementById(id).value);
    value < 1000 ? value ++ : value;    
    document.getElementById(id).value = value; 
    updateQty(id,value)
  }

  function decreaseValue(id) {
    var value = parseInt(document.getElementById(id).value);
    value > 1 ? value-- : value = 1;
    document.getElementById(id).value = value;    
    updateQty(id,value)
  }

  function updateQty(id,value){
    //alert("id : "+id+" value :"+value);
    $.ajax({
      type: 'PUT',
      url: "<?= URLROOT ?>/carts/ajaxUpdateCartQty/"+id+"/"+value,
      contentType: false,
      data : {},
      processData: false,
      success: (response) => {
        if(response.success){
          refresh(0);
        }else{
          refresh(0);
        }
      },
      error: function(response) {
        console.log(response);       
          //console.log(response)
          // var errors = response.responseJSON.errors;
          // $.each(errors, function(key, value) {
          //     toastr.error(value);
          // });
      }
    })
  }

  function removeCart(id){
    if(confirm("Are you sure?"))
      $.ajax({
        type: 'PUT',
        url: "<?= URLROOT ?>/carts/ajaxRemove/"+id,
        contentType: false,
        data : {},
        processData: false,
        success: (response) => {
          if(response.success){
            refreshCartBage();
            //if($('#table tr').length)
            // Toast.fire({
            //   icon: 'success',
            //   title: '&nbsp;&nbsp;'+response.success
            // });
            // $('#cartTable'+id).remove();
            // if($('#table tr').length < 2) refresh(1000);
            refresh(0);
          }else{
            Toast.fire({
              icon: 'error',
              title: '&nbsp;&nbsp;Something went wrong!'
            });
          }
        },
        error: function(response) {
          console.log(response);       
            //console.log(response)
            // var errors = response.responseJSON.errors;
            // $.each(errors, function(key, value) {
            //     toastr.error(value);
            // });
        }
      })
  }
</script>