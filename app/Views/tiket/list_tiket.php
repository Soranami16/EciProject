<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'home'; ?>">Home</a></li>
                        <li class="breadcrumb-item active">List Tiket</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

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
                                            <td><?= $row['tgl_pengajuan'] ?></td>
                                            <td><?= $row['user_name'] ?></td>
                                            <td><?= $row['role_name'] ?></td>
                                            <td><?= $row['tgl_diperlukan'] ?></td>
                                            <td><?= $row['status'] ?></td>
                                            <td>
                                                <a href="<?= base_url('listtiket/detailtiket/' . $row['id_tiket']) ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                <a href="<?= base_url('listtiket/deletetiket/' . $row['id_tiket']) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
</div>