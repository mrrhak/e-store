<?php 
require_once APPROOT.'/views/backend/layouts/header.php';

 ?>

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

    <!-- modal add user -->
    <div class="modal fade" id="modal-add-user" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="user-add-form" action="" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input name="username" type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input name="email" type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input name="password" type="password" class="form-control" placeholder="Password"
                                autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <label>User Role</label>
                            <select name="role" class="form-control">
                                <option value="admin" selected>Admin</option>
                                <option value="customer">Customer</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal add user -->

    <!-- modal edit user -->
    <div class="modal fade" id="modal-edit-user" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="user-edit-form" action="" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input id="edit_username" name="username" type="text" class="form-control"
                                placeholder="Username">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input id="edit_email" name="email" type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input id="edit_password" name="password" type="password" class="form-control"
                                placeholder="Leave empty if not change" autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <label>User Role</label>
                            <select id="edit_role" name="role" class="form-control">
                                <option value="admin" selected>Admin</option>
                                <option value="customer">Customer</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal edit user -->

    <!-- modal delete user -->
    <div class="modal fade" id="modal-delete-user">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete it?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="btnDeleteUser">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal delete user -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                data-target="#modal-add-user">Add New User</button>
                        </div>
                        <div class="card-body">
                            <table id="users-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $key => $value): ?>
                                    <tr>
                                        <td><?= $value->id ?></td>
                                        <td><?= $value->username ?></td>
                                        <td><?= $value->email ?></td>
                                        <td><?= $value->role ?></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm px-3 mr-2" data-id="<?= $value->id ?>"
                                                data-toggle="modal" data-target="#modal-edit-user">Edit</button>
                                            <button class="btn btn-danger btn-sm px-2 mr-2" data-id="<?= $value->id ?>"
                                                data-toggle="modal" data-target="#modal-delete-user">Delete</button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php require_once APPROOT.'/views/backend/layouts/footer.php'; ?>

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
$(function() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    // Datatable User
    $('#users-table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "responsive": true,
    });

    // Handle Button Add User
    $('#user-add-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '<?= URLROOT ?>/users/ajaxRegister',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: (response) => {
                Toast.fire({
                    icon: 'success',
                    title: 'User ' + response.username + ' added successfully.'
                });
                $('#modal-add-user').modal('hide');
                refresh(1500);
            },
            error: function(response) {
                var errors = response.responseJSON.errors;
                $.each(errors, function(key, value) {
                    toastr.error(value);
                });
            }
        });
    });

    // Handle Button Edit
    var userUpdateId;
    $('#modal-edit-user').on('show.bs.modal', function(event) {
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
                // console.log(response);
                $('#edit_username').val(response.username);
                $('#edit_email').val(response.email);

                $("#edit_role option[value='" + response.role + "']").prop('selected',
                    true);
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
            url: "<?= URLROOT ?>/users/ajaxUpdate/" + userUpdateId,
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
                refresh(1500);
            },
            error: function(response) {
                var errors = response.responseJSON.errors;
                $.each(errors, function(key, value) {
                    toastr.error(value);
                });
            }
        });
    });


    // Handle Button Delete
    var userDeleteId;
    $('#modal-delete-user').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        userDeleteId = button.data('id')
    });
    $('#btnDeleteUser').click(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'DELETE',
            url: '<?= URLROOT ?>/users/ajaxDelete/' + userDeleteId,
            data: {},
            contentType: false,
            processData: false,
            success: (response) => {
                Toast.fire({
                    icon: 'success',
                    title: 'User deleted successfully.'
                });
                $('#modal-delete-user').modal('hide');
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

    // Reset Model form
    $(".modal").on("hidden.bs.modal", function() {
        $(this).find('form').trigger('reset');
    });

    function refresh(time) {
        setTimeout(function() {
            location.reload()
        }, time);
    }

});
</script>