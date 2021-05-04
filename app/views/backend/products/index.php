<?php 
require_once APPROOT.'/views/backend/layouts/header.php';
 ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!--table show data-->
    <section class="content">
        <div class="card card-primary">
            <!-- /.card-header -->
            <div class=" w-100 d-flex justify-content-between py-2 px-4 bg-primary ">
                <h2 class="">Product List</h2>
                <button type="button" data-toggle="modal" data-target="#modalAddProducts"
                    class="px-3 btn btn-warning text-white font-bold">
                    <i class="fa fa-plus mr-2" style="font-size: 14px;"></i>
                    Add New
                </button>
            </div>
            <div class="col-12 mt-4 pb-4 px-4">
                <table class="table w-100" id="product-table">
                    <thead class="w-100 bg-gray border-0">
                        <tr>
                            <th scope="col">#No</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="col-100">
                        <?php
                        foreach ($data["products"] as $key => $value) :
                    ?>
                        <tr class="">
                            <th class="pt-4">
                                <?= $key ?>
                            </th>
                            <td>
                                <img style="width:100px ; height:100px; ; object-fit:cover ; border-radius:10px"
                                    src="<?= URLROOT ?>/public/uploads/<?=$value->image ?>">
                            </td>
                            <td class="pt-4"><?= $value->name ?></td>
                            <td class="pt-4"><?= $value->qty ?></td>
                            <td class="pt-4"> <?= $value->price ?></td>
                            <td class="pt-4"><?= $value->category_name?></td>
                            <td class="pt-4">
                                <button class=" btn btn-warning py-1 px-3 mx-2 text-white update"
                                    onClick="changeButtonEdit()" id="<?= $value->id ?>">Edit</button>
                                <button class="btn btn-danger py-1 px-3 mx-2  delete" onClick="changeButtonDelete()"
                                    id="<?= $value->id ?>">Delete</button>
                            </td>
                        </tr>
                        <?php
                           endforeach
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<!--end Content Wrapper. Contains page content -->

<!--add data of product-->
<section>
    <div class="modal fade" id="modalAddProducts" tabindex="-1" role="dialog" aria-labelledby="modalAddProducts"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-bold">New Product</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formModalAddProduct" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name <span class="text-red ml-1">*</span></label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="Enter product name">
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-form-label">Price<span class="text-red ml-1">*</span> </label>
                            <input type="number" id="price" class="form-control" name="price" placeholder="Enter price">
                        </div>
                        <div class="form-group">
                            <label for="qty" class="col-form-label">Qty <span class="text-red ml-1">*</span></label>
                            <input type="number" id="qty" class="form-control" name="qty" placeholder="Enter qty">
                        </div>
                        <div class="form-group">
                            <label for="category">Select Category</label>
                            <div class="input-group mb-3">
                                <select class="form-control pr-5" name="category_id" id="category_id">
                                    <?php foreach ($categories as $key): ?>
                                    <option value="<?php echo $key->cate_id ?>">
                                        <?php
                                         echo $key->category_name
                                       ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <!--<span class="input-group-append">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#CategoryModal" data-whatever="+">+</button>
                                </span>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="file-upload" class="custom-file-upload">Image<span
                                    class="text-red ml-1">*</span> </label>
                            <div class="input-group">
                                <label for="file-upload" class="custom-file-upload border px-2 w-100 mt-1"
                                    style="padding:6px 0px ; border-radius:5px">
                                    <i class="fa fa-upload"></i> Upload Image
                                </label>
                                <input id="file-upload" class="file_upload" name='image' type="file"
                                    style="display:none;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Desciption</label>
                            <textarea class="form-control" id="description" name="description">

                            </textarea>
                        </div>

                    </div>
                    <div class="modal-footer w-100 d-flex justify-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!--update data of product -->

<section>
    <div class="modal fade" id="modalUpdateProduct" tabindex="-1" role="dialog" aria-labelledby="modalUpdateProduct"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-bold">Update product</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formModalUpdateProduct" action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name <span class="text-red ml-1">*</span></label>
                            <input type="text" name="name" id="edit_name" class="form-control"
                                placeholder="Enter product name">
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-form-label">Price<span class="text-red ml-1">*</span></label>
                            <input type="number" class="form-control" name="price" id="edit_price"
                                placeholder="Enter price">
                        </div>
                        <div class="form-group">
                            <label for="qty" class="col-form-label">Qty <span class="text-red ml-1">*</span></label>
                            <input type="number" class="form-control" name="qty" id="edit_qty" placeholder="Enter qty">
                        </div>
                        <div class="form-group">
                            <label for="category">Select Category</label>
                            <div class="input-group mb-3">
                                <select class="form-control pr-5" name="category_id" id="edit_category_id">
                                    <?php foreach ($categories as $key): ?>
                                    <option value="<?php echo $key->cate_id ?>">
                                        <?php
                                         echo $key->category_name
                                       ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <!--<span class="input-group-append">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#CategoryModal" data-whatever="+">+</button>
                                </span>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="file-upload" class="custom-file-upload">Image <span
                                    class="text-red ml-1">*</span></label>
                            <div class="input-group">
                                <label for="edit_file_upload" class="custom-file-upload border px-2 w-100 mt-1"
                                    style="padding:6px 0px ; border-radius:5px">
                                    <i class="fa fa-upload" id="temp_edit_image"></i> Upload Image
                                </label>
                                <input name='image' id="edit_file_upload" type="file" style="display:none;"
                                    class="edit_file_upload">
                                <input type="text" name="title_image" id="title_image" class="d-none">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Desciption</label>
                            <textarea class="form-control" name="description" id="edit_description">

                            </textarea>
                        </div>

                    </div>
                    <div class="modal-footer w-100 d-flex justify-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!--delete product data -->

<section>
    <div class="modal fade" id="modalDeleteProduct" tabindex="-1" role="dialog" aria-labelledby="modalDeleteProduct"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-bold">Delete product</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formModalDeleteProduct" action="" method="DELETE">
                    <label class="modal-body" id="status_delete"></label>
                    <div class="modal-footer w-100 d-flex justify-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require_once APPROOT.'/views/backend/layouts/footer.php'; ?>
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

<!--script run-->
<script>
//toast message
var Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000
})

$('#product-table').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "responsive": true,
});

//Handle click  button add product
$("#formModalAddProduct").submit(function(e) {

    e.preventDefault();
    var name = $("#name").val();
    var price = $("#price").val();
    var category_id = $("#category_id").val();
    var qty = $("#qty").val();
    var description = $("#description").val();
    var extension = $("#file-upload").val().split(".").pop().toLowerCase();

    if (extension != '') {
        if (jQuery.inArray(extension, ['gif', 'png', 'jpg', "jpeg"]) == -1) {
            alert("Invalid Image file");
            $("#file-upload").val('');
            return false;
        }

    }
    $.ajax({
        url: '<?= URLROOT ?>/products/create',
        method: "POST",
        dataType: "json",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function(data) {

            $('#formModalAddProduct')[0].reset();
            $("#modalAddProducts").modal("hide");
            Toast.fire({
                icon: 'success',
                title: 'Products ' + data.name + ' added successfully.'
            });
            location.reload();

        },
        error: function(response) {
            var errors = response.responseJSON?.errors;
            $.each(errors, function(key, value) {
                toastr.error(value);
            });
        }

    })
})

//temp value change button
var btnChange = "edit"
var changeButtonDelete = function(event) {
    btnChange = "delete"
}
var changeButtonEdit = function(event) {
    btnChange = "edit"
}

////Handle click button update product
var product_id;
$(document).on("click", `${[".update" , ".delete" ]}`, function(event) {
    product_id = $(this).attr("id");
    $.ajax({
        url: '<?= URLROOT ?>/products/productDetail/' + product_id,
        method: "POST",
        data: {},
        dataType: "json",
        success: function(data) {
            if (btnChange === "edit") {
                $("#modalUpdateProduct").modal("show");
                $("#edit_name").val(data.name);
                $("#edit_price").val(data.price);
                $("#edit_qty").val(data.qty);
                $("#title_image").val(data.image);
                $("#edit_file_upload").prev('label').clone();
                $("#edit_file_upload").prev('label').text(data.image);
                $("#edit_description").val(data.description);
                $("#edit_category_id option[value='" + data.category_id + "']").prop('selected',
                    true);
            } else {
                $("#modalDeleteProduct").modal("show");
                $("#status_delete").text("Do you want to delete " + data.name + "?").addClass(
                    "text-red")

            }
        }

    })
})
$("#formModalUpdateProduct").submit(function(event) {
    event.preventDefault();
    $.ajax({
        url: '<?= URLROOT ?>/products/updateProduct/' + Number(product_id),
        method: "POST",
        dataType: "json",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function(response) {
            $("#modalUpdateProduct").modal("hide");
            Toast.fire({
                icon: "success",
                title: 'Products ' + response.name + ' updated successfully.'
            })
            location.reload()
        },
        error: function(response) {
            var errors = response.responseJSON?.errors;
            $.each(errors, function(key, value) {
                toastr.error(value);
            });
        }
    })
})

////Handle click button  delete product
$("#formModalDeleteProduct").submit(function(event) {
    event.preventDefault();
    $.ajax({
        url: '<?= URLROOT ?>/products/deleteProduct/' + product_id,
        type: "DELETE",
        dataType: "json",
        data: {},
        contentType: false,
        processData: false,
        success: function(response) {
            $("#modalDeleteProduct").modal("hide");
            Toast.fire({
                icon: "success",
                title: "Product deteted",
            })
            location.reload()
        },
        error: function(response) {
            var errors = response.responseJSON?.errors;
            $.each(errors, function(key, value) {
                toastr.error(value);
            });
        }
    })

})


//function select file file image
$('.file_upload').change(function() {
    var i = $(this).prev('label').clone();
    var file = $('.file_upload')[0].files[0].name;
    $(this).prev('label').text(file);
});

//
$('#edit_file_upload').change(function() {
    var i = $(this).prev('label').clone();
    var file = $('#edit_file_upload')[0].files[0].name;
    $("#title_image").val("");
    $(this).prev('label').text(file);
});
</script>