<?= $this->extend('template/dashboard'); ?>
<?= $this->section('page-content'); ?>

<section class="content">
    <div class="container-fluid">
        <!-- DataTables -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Tender Ticket</h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-hover" id="listTableBody">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tgl Pengajuan</th>
                            <th>Nama</th>
                            <th>Divisi</th>
                            <th>Tgl Diperlukan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

    </div>
</section>


<?= $this->endSection(); ?>


<!-- /.content -->