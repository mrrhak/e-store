<?php 
require_once APPROOT.'/views/backend/layouts/header.php';

 ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="card card-primary">
            <!-- /.card-header -->
            <div class=" w-100 d-flex justify-content-between py-2 px-3 bg-gray ">
                <h2 class=""><?php
                  echo $title
                ?></h2>
                <a href="products" class="btn btn-primary justify-content-center d-flex align-items-center">
                    Back
                </a>
            </div>

            <form class="container-fluid" action="<?php echo URLROOT ?>/products/create" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter product name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="number" name="price" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter product price">
                    </div>
                    <div class="form-group col-12 row">
                        <div class="col-6">
                            <label for="exampleInputFile">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                        file</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="exampleInputEmail1">Select Category</label>
                            <div class="input-group mb-3">
                                <select class="form-control pr-5" name="category_id">
                                    <?php foreach ($categories as $key): ?>
                                    <option value="<?php echo $key->id ?>">
                                        <?php
                                         echo $key->category_name
                                       ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#CategoryModal" data-whatever="+">+</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Desciption</label>
                        <textarea class="form-control" name="description" rows="3"
                            placeholder=" Description ..."></textarea>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
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