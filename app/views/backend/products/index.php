<?php 
require_once APPROOT.'/views/backend/layouts/header.php';

 ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="card card-primary">
            <!-- /.card-header -->
            <div class=" w-100 d-flex justify-content-between py-2 px-3 bg-gray ">
                <h2 class="">Product List</h2>
                <a href="<?=URLROOT?>/products/create"
                    class="btn btn-success justify-content-center d-flex align-items-center">
                    Add New
                </a>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>
                                <button class="btn btn-warning py-1 px-3 mx-2 text-white">Edit</button>
                                <button class="btn btn-danger py-1 px-3 mx-2">Delete</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <!-- /.card -->

        </div>
</div>

</section>
<section>
    <div class="modal fade" id="CategoryModal" tabindex="-1" role="dialog" aria-labelledby="CategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once APPROOT.'/views/backend/layouts/footer.php'; ?>