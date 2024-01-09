<?= $this->extend('template/dashboard'); ?>
<?= $this->section('page-content'); ?>

<section class="content">
    <div class="container-fluid">
        <!-- DataTables -->
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h3 class="card-title">Master User</h3>
                </div>
                <div class="float-right">
                    <button class="btn btn-primary" onclick="addData()">
                        <i class="fas fa-plus"></i> Add Data
                    </button>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-hover" id="masteruserTablebody">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>RoleOID</th>
                            <th>Action</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

    </div>
</section>

<!-- Modal Form-->
<div class="modal fade" id="MasterUserModal" tabindex="-1" aria-labelledby="MasterUserModal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModal">Form User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formMasterUser">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" class="form-control" name="code" id="code" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" id="role" name="role">

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="submitmasteruser">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<!-- Modal Form Edit -->
<div class="modal fade" id="masterUserEditModal" tabindex="-1" aria-labelledby="masterUserEditModal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="masterUserEditModal">Edit Form User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formMasterUserEdit">
                    <input type="hidden" name="oid" id="oid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" class="form-control" name="codes" id="codes" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="emails" id="emails" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="names" id="names" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" id="roles" name="roles" required>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input type="password" class="form-control" name="passwords" id="passwords" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" name="new_password" id="new_password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="submiteditMasterUser">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->


<?= $this->endSection(); ?>


<!-- /.content -->