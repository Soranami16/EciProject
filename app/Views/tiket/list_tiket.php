<?= $this->extend('template/dashboard'); ?>
<?= $this->section('page-content'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Form Pengaktifan Tender Type</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
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
                            <tbody>
                                <?php $no = 1;
                                ?>

                                <?php foreach ($tiket as $row) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['tanggal'] ?></td>
                                        <td><?= $row['user_name'] ?></td>
                                        <td><?= $row['role_name'] ?></td>
                                        <td><?= $row['tgl_diperlukan'] ?></td>
                                        <td><?= $row['status'] ?></td>
                                        <td>
                                            <a href="<?= base_url('listtiket/detailtiket/' . $row['id_tiket']) ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                            <a href="<?= base_url(route_to('edit-formTender', $row['id_tiket'])) ?>" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url(route_to('delete-formTender', $row['id_tiket'])) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection(); ?>