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
                <h2 class="">Categories List</h2>
                <button type="button" data-toggle="modal" data-target="#modalAddCategory"
                    class="px-3 btn btn-warning text-white font-bold">
                    <i class="fa fa-plus mr-2" style="font-size: 14px;"></i>
                    Add New
                </button>
            </div>
            <div class="col-12 mt-4 pb-4 px-4">
                <table class="table w-100" id="category-table">
                    <thead class="w-100 bg-gray border-0">
                        <tr>
                            <th scope="col">#No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created By</th>
                            <th scope="col">Created_at</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="col-100">
                        <?php
                        foreach ($data["categories"] as $key => $value) :
                    ?>
                        <tr class="">
                            <th class="pt-4">
                                <?= $key ?>
                            </th>
                            <td class="pt-4"><?= $value->category_name ?></td>
                            <td class="pt-4"> <?= $value->username ?></td>
                            <td class="pt-4"> <?= $value->created_at ?></td>

                            <td class="pt-4">
                                <button class=" btn btn-warning py-1 px-3 mx-2 text-white update"
                                    onClick="changeButtonEdit()" id="<?= $value->cate_id ?>">Edit</button>
                                <button class="btn btn-danger py-1 px-3 mx-2  delete" onClick="changeButtonDelete()"
                                    id="<?= $value->cate_id ?>">Delete</button>
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
    <div class="modal fade" id="modalAddCategory" tabindex="-1" role="dialog" aria-labelledby="modalAddCategory"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-bold">New Category</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formModalAddCategory" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name <span class="text-red ml-1">*</span></label>
                            <input type="text" id="category_name" name="category_name" class="form-control"
                                placeholder="Enter  category name">
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
    <div class="modal fade" id="modalUpdateCategory" tabindex="-1" role="dialog" aria-labelledby="modalUpdateCategory"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-bold">Update Category</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formModalUpdateCategory" action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name <span class="text-red ml-1">*</span></label>
                            <input type="text" name="edit_category_name" id="edit_category_name" class="form-control"
                                placeholder="Enter product name">
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
    <div class="modal fade" id="modalDeleteCategory" tabindex="-1" role="dialog" aria-labelledby="modalDeleteCategory"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-bold">Delete Category</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formModalDeleteCategory" action="" method="DELETE">
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

$('#category-table').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "responsive": true,
});

//Handle click  button add product
$("#formModalAddCategory").submit(function(e) {

    e.preventDefault();
    var category_name = $("#category_name").val();
    $.ajax({
        url: '<?= URLROOT ?>/categories/create',
        method: "POST",
        dataType: "json",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function(data) {

            $('#formModalAddCategory')[0].reset();
            $("#modalAddCategory").modal("hide");
            Toast.fire({
                icon: 'success',
                title: 'Category' + data.category_name + ' added successfully.'
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
var cate_id;
$(document).on("click", `${[".update" , ".delete" ]}`, function(event) {
    cate_id = $(this).attr("id");
    $.ajax({
        url: '<?= URLROOT ?>/categories/categoryDetail/' + cate_id,
        method: "POST",
        data: {},
        dataType: "json",
        success: function(data) {
            if (btnChange === "edit") {
                $("#modalUpdateCategory").modal("show");
                $("#edit_category_name").val(data.category_name);
            } else {
                $("#modalDeleteCategory").modal("show");
                $("#status_delete").text("Do you want to delete " + data.category_name + "?")
                    .addClass(
                        "text-red")

            }
        }

    })
})
$("#formModalUpdateCategory").submit(function(event) {
    event.preventDefault();
    $.ajax({
        url: '<?= URLROOT ?>/categories/updateCategory/' + Number(cate_id),
        method: "POST",
        dataType: "json",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function(response) {
            $("#modalUpdateCategory").modal("hide");
            Toast.fire({
                icon: "success",
                title: 'Category ' + response.category_name + ' updated successfully.'
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
$("#formModalDeleteCategory").submit(function(event) {
    event.preventDefault();
    $.ajax({
        url: '<?= URLROOT ?>/categories/deleteCategory/' + cate_id,
        type: "DELETE",
        dataType: "json",
        data: {},
        contentType: false,
        processData: false,
        success: function(response) {
            $("#modalDeleteCategory").modal("hide");
            Toast.fire({
                icon: "success",
                title: "Category deteted",
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