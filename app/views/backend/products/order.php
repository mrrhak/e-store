<?php
require_once APPROOT . '/views/backend/layouts/header.php';

?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Orders</h1>
        </div>
      </div>
    </div>
  </section>

  <!-- end modal delete user -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="order-table" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Customer Name</th>
                    <th>Phone Number</th>
                    <th>Order Date</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th style="width: 160px;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($orders as $key => $value) : ?>
                    <tr>
                      <td><?= $value->username ?></td>
                      <td><?= $value->phone ?></td>
                      <td><?= $value->order_date?></td>
                      <td>$ <?= number_format($value->total_amount,2,'.','') ?></td>
                      <td><i class="<?= $value->status ? 'badge badge-success' : 'badge badge-warning' ?>"><?= $value->status ? 'Completed' : 'Panding' ?></i></td>
                      <td>
                        <button class="btn btn-primary btn-sm px-3 mr-2" data-id="<?= $value->id ?>" onclick="updateStatusOrder(<?= $value->order_id ?>,<?= !$value->status ?>)">Make Complete</button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>                
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php require_once APPROOT . '/views/backend/layouts/footer.php'; ?>

<!-- DataTables  & Plugins -->
<script src="<?= URLROOT ?>/backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= URLROOT ?>/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= URLROOT ?>/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= URLROOT ?>/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= URLROOT ?>/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= URLROOT ?>/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= URLROOT ?>/backend/plugins/jszip/jszip.min.js"></script>
<script src="<?= URLROOT ?>/backend/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= URLROOT ?>/backend/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= URLROOT ?>/backend/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= URLROOT ?>/backend/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= URLROOT ?>/backend/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  let Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: true,
    timer: 8000
  })
  $('#order-table').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "responsive": true,
  });
  function updateStatusOrder(id,status){
    //alert(status);
    //alert("id : "+id+" value :"+value);
    $.ajax({
      type: 'PUT',
      url: "<?= URLROOT ?>/orders/updateStatusOrder/"+id+"/"+status,
      contentType: false,
      data : {},
      processData: false,
      success: (response) => {
        refresh(0);
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