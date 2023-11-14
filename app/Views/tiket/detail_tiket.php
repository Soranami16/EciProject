<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="invoice p-3 mb-3">

                        <div class="row">
                            <div class="col-12 text-center" style="margin-bottom: 15px; margin-top: 15px;">
                                <h4>Form Pengajuan Pengaktifan Tender Type <?= $tiket->id_tiket; ?></h4>
                            </div>
                        </div>

                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <p for="tglpengajuan">Tanggal Pengajuan : <b><?= $tiket->tanggal; ?></b></p>
                                <p for="nama">Nama : <b><?= $tiket->user_name; ?></b></p>
                            </div>

                            <div class="col-sm-4 invoice-col">
                                <p for="divisi">Divisi : <b><?= $tiket->role_name; ?></b></p>
                                <p for="tgldiperlukan">Tanggal Diperlukan : <b><?= $tiket->tgl_diperlukan ?></b></p>
                            </div>

                            <div class="col-sm-4 invoice-col">

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12" style="margin-bottom: 10px; margin-top: 15px">
                                <table class="table table-bordered" id="tableTenderBaru">
                                    <tbody>
                                        <?php if ($tiket->tender_type == 0) : ?>
                                            <legend>Tender Type Baru</legend>
                                            <tr>
                                                <td>Deskripsi Tender Type</td>
                                                <td>:</td>
                                                <td><?= $tiket->deskripsi_tender; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Perlu EDC Baru</td>
                                                <td>:</td>
                                                <td> <?php if ($tiket->edc_baru == 0) : ?>
                                                        Iya
                                                    <?php elseif ($tiket->edc_baru == 1) : ?>
                                                        Tidak
                                                    <?php endif; ?></td>
                                            </tr>
                                            <?php if ($tiket->edc_baru == 0) : ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?= $tiket->ket_edc_baru; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>GL Mapping Tender Type</td>
                                                    <td>:</td>
                                                    <td><?= $tiket->GL_mapping_tender; ?></td>
                                                </tr>
                                            <?php endif; ?>
                                            <tr>
                                                <td>Karakteristik Tender Type</td>
                                                <td>:</td>
                                                <td>
                                                    <?php if ($tiket->karakteristik_tender == 0) : ?>
                                                        Sementara
                                                    <?php elseif ($tiket->karakteristik_tender == 1) : ?>
                                                        Permanen
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php if ($tiket->karakteristik_tender == 0) : ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td><b><?= $tiket->tgl_aktif; ?></b> <?= $tiket->periode_aktif; ?></td>
                                                </tr>
                                            <?php endif; ?>

                                        <?php elseif ($tiket->tender_type == 1) : ?>
                                            <legend>Tender Type Lama Diaktifkan Kembali</legend>
                                            <tr>
                                                <td>Kode Tender Type</td>
                                                <td>:</td>
                                                <td><?= $tiket->kode_tender ?></td>
                                            </tr>
                                            <tr>
                                                <td>Deskripsi Tender Type</td>
                                                <td>:</td>
                                                <td><?= $tiket->deskripsi_tender ?></td>
                                            </tr>
                                            <tr>
                                                <td>Karakteristik Tender Type</td>
                                                <td>:</td>
                                                <td>
                                                    <?php if ($tiket->karakteristik_tender == 0) : ?>
                                                        Sementara
                                                    <?php elseif ($tiket->karakteristik_tender == 1) : ?>
                                                        Permanen
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php if ($tiket->karakteristik_tender == 0) : ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td><b><?= $tiket->tgl_aktif; ?></b> <?= $tiket->periode_aktif; ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Atasan Langsung</span>
                                        <span class="info-box-number text-center text-muted mb-0"><?= $atasan ?></span>
                                        <span class="info-box-number text-center text-muted mb-0"><?= $tiket->user_name ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Finance Dept</span>
                                        <span class="info-box-number text-center text-muted mb-0"><?= $finance ?></span>
                                        <span class="info-box-number text-center text-muted mb-0"><?= $tiket->user_name ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">IT support</span>
                                        <span class="info-box-number text-center text-muted mb-0"><?= $it_support ?></span>
                                        <span class="info-box-number text-center text-muted mb-0"><?= $tiket->user_name ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>