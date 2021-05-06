<?php require_once 'layouts/header.php' ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $productCount ?></h3>

                        <p>All Products</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $orderCount ?></h3>

                        <p>All Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $categoryCount ?></h3>

                        <p>All Categories</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $userCount ?></h3>

                        <p>All Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-4">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest 5 Orders</h3>

                <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Customer</th>
                      <th>Phone</th>
                      <th>Amount</th>
                      <th>Status</th>
                      <th>Created Date</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach($latestOrders as $key => $order) : ?>
                        <tr>
                          <td class="text-primary"><?= $order->order_id ?></td>
                          <td><?= $order->username ?></td>
                          <td><?= $order->phone ?></td>
                          <td>$<?= $order->total_amount ?></td>
                          <td><i class="badge <?= $order->status ? 'badge-success' : 'badge-warning' ?>"><?= $order->status ? 'Completed' : 'Panding' ?></i></td>
                          <td><?= $order->order_date ?></td>
                          <td>
                            <button class="btn btn-primary btn-sm px-3 mr-2" data-id="<?= $order->id ?>" onclick="updateStatusOrder(<?= $order->order_id ?>,<?= !$order->status ?>)" <?= $order->status ? 'disabled' : ''?>>Make Complete</button>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="orders" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
        </div>

    </section>
</div>

<?php require_once 'layouts/footer.php' ?>


<script>
  let Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: true,
    timer: 8000
  })

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
      }
    })
  }
</script>