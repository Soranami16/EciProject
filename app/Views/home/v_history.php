<?= $this->extend('template/dashboard'); ?>
<?= $this->section('page-content'); ?>
<!-- Main content -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
<section class="content">
    <div class="container-fluid">
        <!-- DataTables -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">History Ticket</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="historyTableBody">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Divisi</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>


<!-- /.content -->
<?= $this->endSection(); ?>