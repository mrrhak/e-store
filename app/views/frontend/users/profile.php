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
  <div class="container">
  <!-- modal edit user -->
  <div class="modal fade" id="modalEditUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Info</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="user-edit-form" action="" method="post">
          <div class="modal-body">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input id="edit_phone" name="phone" type="text" class="form-control" placeholder="Phone (Optional)">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-address-card"></i></span>
              </div>
              <input id="edit_address1" name="address1" type="text" class="form-control" placeholder="Address 1 (Optional)">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-address-card"></i></span>
              </div>
              <input id="edit_address2" name="address2" type="text" class="form-control" placeholder="Address 2 (Optional)">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input id="edit_password" name="password" type="password" class="form-control" placeholder="Leave password empty if not change" autocomplete="new-password">
            </div>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
        
      </div>
    </div>
  </div>
      
      <!-- end modal edit user -->

      <!--  -->
    <div class="main-body">
    
      <!-- Breadcrumb -->
      <h2 class="text-center m-4" style="font-size: 40px;">My Account</h2>
      <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h3 class="text-uppercase"><?= $user->username ?></h3>
                      <p class="text-secondary mb-1"><?= $user->role ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <a class="btn btn-danger" href="<?= URLROOT ?>/users/logout">Logout</a>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $user->username ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $user->email ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $user->phone ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address 1</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $user->address1 ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address 2</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $user->address2 ?>
                    </div>
                  </div>
                </div>
              </div>
              <button type="button" class="btn btn-primary w-100" data-id="<?= $user->id ?>" data-bs-toggle="modal" data-bs-target="#modalEditUser">Update</button>
              <div class="row gutters-sm">
                <div class="col-12">
                <h3 class="text-center mt-4">Checkout History <?= $orderHistory ?></h3>
                  <div class="card mb-4">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3">Date: 01/01/2021</h6>
                      <small>Checkout 1</small>
                    </div>
                  </div>
                  <div class="card mb-4">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3">Date: 01/01/2021</h6>
                      <small>Checkout 2</small>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
    </div>
</main>

<!-- Start Footer -->
<?php require_once APPROOT.'/views/layouts/footer.php'; ?>
<!-- End Footer -->

<script>
$(function() {
  var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

  // Handle Button Edit
    var userUpdateId;
    $('#modalEditUser').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      userUpdateId = button.data('id');
      // Load data for edit
      $.ajax({
          type: 'GET',
          url: '<?= URLROOT ?>/users/ajaxDetail/' + userUpdateId,
          data: {},
          contentType: false,
          processData: false,
          success: (response) => {
              console.log(response);
              $('#edit_phone').val(response.phone);
              $('#edit_address1').val(response.address1);
              $('#edit_address2').val(response.address2);
          },
          error: function(response) {
              var errors = response.responseJSON.errors;
              $.each(errors, function(key, value) {
                  toastr.error(value);
              });
          }
      });
    });
    $('#user-edit-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "<?= URLROOT ?>/users/ajaxFrontendUpdate/" + userUpdateId,
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: (response) => {
                // console.log(response);
                Toast.fire({
                    icon: 'success',
                    title: 'User ' + response.username + ' updated successfully.'
                });
                $('#modal-edit-user').modal('hide');
                refresh(1000);
            },
            error: function(response) {
                var errors = response.responseJSON.errors;
                $.each(errors, function(key, value) {
                    toastr.error(value);
                });
            }
        });
    });

    function refresh(time) {
        setTimeout(function() {
            location.reload()
        }, time);
    }
  });
</script>