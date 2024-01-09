<?= $this->extend('template/dashboard'); ?>
<?= $this->section('page-content'); ?>

<section class="content">
    <div class="container-fluid">
        <!-- DataTables -->
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h3 class="card-title">Master Store</h3>
                </div>
                <div class="float-right">
                    <button class="btn btn-primary" onclick="addDataMasterStore()">
                        <i class="fas fa-plus"></i> Add Data
                    </button>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-hover" id="masterstoreTablebody">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Company</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Storeregion</th>
                            <th>TenderRegion</th>
                            <th>StoreDC</th>
                            <th>ReturnDay</th>
                            <th>OptimisticLockField</th>
                            <th>GCRecord</th>
                            <th>BusinessDate</th>
                            <th>StoreType</th>
                            <th>Expired</th>
                            <th>IsActive</th>
                            <th>EInvoice</th>
                            <th>StoreRegionalOID</th>
                            <th>TInvoice</th>
                            <th>StoreTiering</th>
                            <th>Action</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

    </div>
</section>

<!-- Modal Form-->
<div class="modal fade" id="MasterStoreModal" tabindex="-1" aria-labelledby="MasterStoreModal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="MasterStoreModal">Form Store</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formMasterStore">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
                                <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" class="form-control" name="code" id="code" maxlength="4" required>
                                </div>
                                <div class="form-group">
                                    <label>GC Record</label>
                                    <input type="text" class="form-control" name="gcrecord" id="gcrecord">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Return Day</label>
                                    <input type="text" class="form-control" name="returnday" id="returnday">
                                </div>
                                <div class="form-group">
                                    <label>OptimisticLockField</label>
                                    <input type="text" class="form-control" name="optimisticlockfield" id="optimisticlockfield">
                                </div>
                                <div class="form-group">
                                    <label>Bussiness Date</label>
                                    <input type="date" class="form-control datetimepicker-input" name="bussinessdate" id="bussinessdate">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input type="checkbox" name="storetype" class="form-check-input" id="storetype" value="1">
                                        <label class="form-check-label" for=""><strong>Store Type</strong></label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input type="checkbox" name="expired" class="form-check-input" id="expired" value="1">
                                        <label class="form-check-label" for=""><strong>Expired</strong></label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input type="checkbox" name="tinvoice" class="form-check-input" id="tinvoice" value="1">
                                        <label class="form-check-label" for=""><strong>TInvoice</strong></label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input type="checkbox" name="isactived" class="form-check-input" id="isactived" value="1">
                                        <label class="form-check-label" for=""><strong>IsActived</strong></label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input type="checkbox" name="einvoice" class="form-check-input" id="einvoice" value="1">
                                        <label class="form-check-label" for=""><strong>EInvoice</strong></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Company</label>
                                    <select class="form-control" id="company" name="company">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Store Region</label>
                                    <select class="form-control" id="storeregion" name="storeregion">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tender Region</label>
                                    <select class="form-control" id="tenderregion" name="tenderregion">
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Store DC</label>
                                    <select class="form-control" id="storedc" name="storedc">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Store Regional</label>
                                    <select class="form-control" id="storeregional" name="storeregional">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Store Tiering</label>
                                    <select class="form-control" id="storetiering" name="storetiering">
                                    </select>
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
<div class="modal fade" id="masterStoreEditModal" tabindex="-1" aria-labelledby="masterStoreEditModal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="masterStoreEditModal">Form Store</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formMasterStoreEdit">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
                                <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" class="form-control" name="code" id="code" maxlength="4" required>
                                </div>
                                <div class="form-group">
                                    <label>GC Record</label>
                                    <input type="text" class="form-control" name="gcrecord" id="gcrecord">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Return Day</label>
                                    <input type="text" class="form-control" name="returnday" id="returnday">
                                </div>
                                <div class="form-group">
                                    <label>OptimisticLockField</label>
                                    <input type="text" class="form-control" name="optimisticlockfield" id="optimisticlockfield">
                                </div>
                                <div class="form-group">
                                    <label>Bussiness Date</label>
                                    <input type="date" class="form-control datetimepicker-input" name="bussinessdate" id="bussinessdate">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input type="checkbox" name="storetype" class="form-check-input" id="storetype" value="1">
                                        <label class="form-check-label" for=""><strong>Store Type</strong></label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input type="checkbox" name="expired" class="form-check-input" id="expired" value="1">
                                        <label class="form-check-label" for=""><strong>Expired</strong></label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input type="checkbox" name="tinvoice" class="form-check-input" id="tinvoice" value="1">
                                        <label class="form-check-label" for=""><strong>TInvoice</strong></label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input type="checkbox" name="isactived" class="form-check-input" id="isactived" value="1">
                                        <label class="form-check-label" for=""><strong>IsActived</strong></label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input type="checkbox" name="einvoice" class="form-check-input" id="einvoice" value="1">
                                        <label class="form-check-label" for=""><strong>EInvoice</strong></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Company</label>
                                    <select class="form-control" id="company" name="company">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Store Region</label>
                                    <select class="form-control" id="storeregion" name="storeregion">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tender Region</label>
                                    <select class="form-control" id="tenderregion" name="tenderregion">
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Store DC</label>
                                    <select class="form-control" id="storedc" name="storedc">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Store Regional</label>
                                    <select class="form-control" id="storeregional" name="storeregional">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Store Tiering</label>
                                    <select class="form-control" id="storetiering" name="storetiering">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="submitmasteruseredit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->


<?= $this->endSection(); ?>


<!-- /.content -->