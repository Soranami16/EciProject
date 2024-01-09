<?= $this->extend('template/dashboard'); ?>
<?= $this->section('page-content'); ?>

<section class="content">
    <div class="container-fluid">
        <!-- DataTables -->
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h3 class="card-title">Master Store Location</h3>
                </div>
                <div class="float-right">
                    <button class="btn btn-primary" onclick="addDataStoreLocation()">
                        <i class="fas fa-plus"></i> Add Data
                    </button>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-hover" id="masterstorelocationTablebody">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Store</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Action</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

    </div>
</section>

<!-- Modal Form-->
<div class="modal fade" id="MasterStoreLocationModal" tabindex="-1" aria-labelledby="MasterStoreLocationModal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="MasterStoreLocationModal">Form Store Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formMasterStorelocation">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Store</label>
                                    <select class="form-control" id="storeoid" name="storeoid" required>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" name="code" id="code" class="form-control" maxlength="4" required>
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
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="submitmasterstorelocation">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<!-- Modal Form Edit -->
<div class="modal fade" id="masterStoreLocationEditModal" tabindex="-1" aria-labelledby="masterStoreLocationEditModal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="masterStoreLocationEditModal">Edit Form Store Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formMasterStoreLocationEdit">
                    <input type="hidden" name="oid" id="oid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Store</label>
                                    <select class="form-control" id="storeOID" name="storeOID"></select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" name="code" id="code" class="form-control" maxlength="4">
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