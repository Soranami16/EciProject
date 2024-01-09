<?= $this->extend('template/dashboard'); ?>
<?= $this->section('page-content'); ?>

<section class="content">
    <div class="container-fluid">
        <!-- DataTables -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" id="judul">List Tender Ticket </h3>
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
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h3 class="card-title">List Form Fasilitas</h3>
                    </div>
                    <div class="col-sm-3 text-right">
                        <a href="<?php echo base_url() . 'formfasilitas'; ?>" class="btn btn-info">Create Fasilitas</a>
                    </div>
                    <!-- TEMPORARY -->
                    <div class="col-sm-3 text-right">
                        <a href="<?php echo base_url() . 'edc'; ?>" class="btn btn-info">Master The EDC</a>
                    </div>
                    <!--  -->
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered" id="listTableBodyFasilitas">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <!-- <th>Store</th> -->
                            <th>Nik</th>
                            <th>Dept</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


<!-- Modal Form Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal">Edit Form Tender</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTiketTenderEdit">
                    <input type="hidden" name="id_tiket" id="id_tiket">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tanggal Pengajuan</label>
                                    <input type="date" class="form-control" name="tgl_pengajuan" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="user_id">Nama</label>
                                    <input type="text" name="nama_user" class="form-control" id="nama_user" readonly>
                                    <input type="hidden" name="user_id">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tanggal Diperlukan</label>
                                    <input type="date" class="form-control" name="tgl_diperlukan" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Divisi</label>
                                    <input type="text" name="nama_divisi" class="form-control" id="nama_divisi" readonly>
                                    <input type="hidden" name="role_id">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input type="radio" name="tender_type" class="form-check-input" id="TenderBaru" value="0" required>
                                        <label class="form-check-label" for="TenderBaru"><strong>Tender Type Baru</strong></label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input type="radio" name="tender_type" class="form-check-input" id="TenderLama" value="1" required>
                                        <label class="form-check-label" for="TenderLama"><strong>Tender Type Lama</strong></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- baru -->
                        <div id="tenderTypeBaruFields">
                            <div class=" form-group">
                                <label for="deskripsi_tender_baru">Deskripsi Tender Type</label>
                                <input type="text" name="deskripsi_tender_baru" class="form-control" id="deskripsi_tender_baru" placeholder="Isi Deskripsi Tender Type">
                            </div>
                            <div class="form-group">
                                <label for="edcbaru">EDC Baru</label>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-check">
                                                <input type="radio" name="edc_baru" class="form-check-input" id="Ya" value="0">
                                                <label class="form-check-label" for="Ya"><strong>Ya</strong></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-check">
                                                <input type="radio" name="edc_baru" class="form-check-input" id="Tidak" value="1">
                                                <label class="form-check-label" for="Tidak">
                                                    <stromg>Tidak</strong>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="EDCbaru">
                                    <div class="form-group">
                                        <input type="text" name="ket_edc_baru" class="form-control" id="ket_edc_baru" placeholder="Di isi oleh Finance Dept">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tenderTypeBaruField">GL Mapping Tender</label>
                                <input type="text" name="GL_mapping_tender" class="form-control" id="GL_mapping_tender" placeholder="Di isi oleh Finance Dept">
                            </div>
                            <div class="form-group">
                                <label for="kar_tender">Karakteristik Tender</label>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-check">
                                                <input type="radio" name="karakteristik_tender_baru" class="form-check-input" id="SementaraBaru" value="0">
                                                <label class="form-check-label" for="SementaraBaru"><strong>Sementara</strong></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-check">
                                                <input type="radio" name="karakteristik_tender_baru" class="form-check-input" id="PermanenBaru" value="1">
                                                <label class="form-check-label" for="PermanenBaru"><strong>Permanen</strong></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="SementaraFieldBaru">
                                    <label>Tanggal Aktif</label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">

                                                <input type="date" class="form-control" name="tgl_aktif_baru" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" name="periode_aktif_baru" class="form-control" id="periode_aktifBaru">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--lama-->
                        <div id="tenderTypeLamaFields">
                            <div class="form-group">
                                <label for="kode_tender">Kode Tender Type</label>
                                <input type="text" name="kode_tender" class="form-control" id="kode_tender" placeholder=" Isi Kode Tender Type">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi_tender_lama">Deskripsi Tender Type</label>
                                <input type="text" name="deskripsi_tender_lama" class="form-control" id="deskripsi_tender_lama" placeholder="Isi Deskripsi Tender Type">
                            </div>
                            <div class="form-group">
                                <label for="kar_tender">Karakteristik Tender</label>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="radio" name="karakteristik_tender_lama" class="form-check-input" id="SementaraLama" value="0">
                                                <label class="form-check-label" for="SementaraLama">Sementara</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="radio" name="karakteristik_tender_lama" class="form-check-input" id="PermanenLama" value="1">
                                                <label class="form-check-label" for="Permanenlama">Permanen</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="SementaraFieldLama">
                                    <label>Tanggal Aktif</label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="date" class="form-control" name="tgl_aktif_lama" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" name="periode_aktif_lama" class="form-control" id="periode_aktifLama">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="submitPengajuanTender">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModalFasilitas" tabindex="-1" aria-labelledby="detailModal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalFasilitas">Edit Form Fasilitas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTiketFasilitasEdit">
                    <input type="hidden" name="id_tiket" id="id_tiket">
                    <div class="card-body">
                        <!-- carBodyStart -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="hidden" id="inputId">
                                    <!-- KALAU SUKSES -->
                                    <div class="alert alert-success sukses" role="alert" style="display: none;">

                                    </div>
                                    <!-- KALAU ERROR -->
                                    <div class="alert alert-danger error" role="alert" style="display: none;">

                                    </div>
                                    <label for="tgl_pengajuan">Tanggal</label>

                                    <div class="input-group date" id="tgl_pengajuan" data-target-input="nearest">
                                        <input type="date" class="form-control " name="tgl_pengajuan" value="<?= date("Y-m-d") ?>" readonly />

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nik_user">NIK</label>
                                    <input type="text" name="nik_user" class="form-control" id="nik_user" value="">
                                </div>
                                <div class="form-group">
                                    <label for="nama_user">Nama</label>
                                    <input type="text" name="nama_user" class="form-control" id="nama_user">
                                    <input type="hidden" name="user_id" value="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="store">Store</label>
                                    <select class="form-select form-control" id="stores" name="stores" aria-label="Default select example">
                                        <option selected="true" disabled="disabled" value="0">Store</option>

                                    </select>
                                </div>
                                <div class=" form-group">
                                    <label for="dept_user">Dept</label>
                                    <input type="text" name="dept_user" class="form-control" id="dept_user" value="">
                                </div>
                                <div class="form-group">
                                    <label for="nama_divisi">Jabatan</label>
                                    <input type="text" name="nama_divisi" class="form-control" id="nama_divisi" value="">
                                    <input type="hidden" name="role_id" value="">
                                </div>
                            </div>
                        </div>
                        <h2 class="my-3">Fasilitas IT</h2>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <label for="radio_komputer">Komputer? *</label>
                                    <!-- <label class="msg ">bjir</label> -->

                                    <div class="form-check">
                                        <div class="div col-3">
                                            <input class="form-check-input inputKomputer" type="checkbox" name="radio_komputer" id="komputer_ya" value="1">
                                            <label class="form-check-label" for="komputer_ya">
                                                Ya
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <div class="div col-3">

                                            <input class="form-check-input inputKomputer" type="checkbox" name="radio_komputer" id="komputer_tidak" value="0">
                                            <label class="form-check-label" for="komputer_tidak">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Type: *</label>
                                    <div class="form-check">
                                        <div class="div col-3">
                                            <input class="form-check-input radioType" type="radio" name="radio_type" id="device_type" value="Desktop">
                                            <label class="form-check-label" for="desktop">
                                                Desktop
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <div class="div col-3">

                                            <input class="form-check-input radioType" type="radio" name="radio_type" id="device_type" value="Laptop">
                                            <label class="form-check-label" for="laptop">
                                                Laptop
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="form_group keterangan1 mb-3">
                            <textarea class="form-control" id="keterangan1" name="keterangan1" rows="" placeholder="Keterangan"></textarea>
                        </div>
                        <!-- Email_VPN -->
                        <div class="row justify-content-between">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="radio_email">Email?</label>
                                    <div class="form-check">
                                        <input class="form-check-input radioEmail" type="radio" name="radio_email" id="email_ya" value="1">
                                        <label class="form-check-label" for="email_ya">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input radioEmail" type="radio" name="radio_email" id="email_tidak" value="0">
                                        <label class="form-check-label" for="email_tidak">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Akses USB?</label>
                                    <div class="form-check">
                                        <input class="form-check-input radioUsb" type="radio" name="radio_usb" id="usb_ya" value="1">
                                        <label class="form-check-label" for="usb_ya">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input radioUsb" type="radio" name="radio_usb" id="usb_tidak" value="0">
                                        <label class="form-check-label" for="usb_tidak">
                                            Tidak
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">

                                    <label for="exampleInputPassword1">Akses Internet?</label>
                                    <div class="form-check">
                                        <input class="form-check-input radioInternet" type="radio" name="radio_internet" id="internet_ya" value="1">
                                        <label class="form-check-label" for="internet_ya">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input radioInternet" type="radio" name="radio_internet" id="internet_tidak" value="0">
                                        <label class="form-check-label" for="internet_tidak">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">

                                    <label for="exampleInputPassword1">Wifi?</label>
                                    <div class="form-check">
                                        <input class="form-check-input radioWifi" type="radio" name="radio_wifi" id="wifi_ya" value="1">
                                        <label class="form-check-label" for="wifi_ya">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input radioWifi" type="radio" name="radio_wifi" id="wifi_tidak" value="0">
                                        <label class="form-check-label" for="wifi_tidak">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">

                                    <label for="exampleInputPassword1">VPN?</label>
                                    <div class="form-check">
                                        <input class="form-check-input radioVpn" type="radio" name="radio_vpn" id="vpn_ya" value="1">
                                        <label class="form-check-label" for="vpn_ya">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input radioVpn" type="radio" name="radio_vpn" id="vpn_tidak" value="0">
                                        <label class="form-check-label" for="vpn_tidak">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">

                                    <label for="exampleInputPassword1">Akses?</label>
                                    <div class="form-check">
                                        <input class="form-check-input radioAkses" type="radio" name="radio_akses" id="internal" value="Internal">
                                        <label class="form-check-label" for="internal">
                                            internal
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input radioAkses" type="radio" name="radio_akses" id="keluar" value="Keluar">
                                        <label class="form-check-label" for="keluar">
                                            keluar
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Email_VPN -->
                        <div class="keterangan2 mb-3">
                            <textarea class="form-control" rows="" id="keterangan2" name="keterangan2" placeholder="Keterangan"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Aplikasi (SAP/POS/File Server)</label>
                            <select class="form-control" id="aplikasi" name="aplikasi">
                                <option value="sap">SAP</option>
                                <option value="pos">POS</option>
                                <option value="fileserver">FileServer</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="user_type" class="custom-control-input" id="newUser" value="New User">
                                        <label class="custom-control-label" for="newUser">New User</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="user_type" class="custom-control-input" id="mutasiUser" value="Mutasi User">
                                        <label class="custom-control-label" for="mutasiUser">Mutasi User</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="keterangan3 mb-3">
                            <textarea class="form-control" rows="" id="keterangan3" name="keterangan3" placeholder="Keterangan"></textarea>
                        </div>
                    </div>
                    <!-- carBodyEnd -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary submit" id="submitFormFasilitas">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Detail Form-->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModal">Detail Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="invoice p-3 mb-3" id="detailTiketPage">
                    <div class="row">
                        <div class="col-12 text-center" style="margin-bottom: 15px; margin-top: 15px;">
                            <h4>Form Pengajuan Pengaktifan Tender Type</h4>
                            <input type="hidden" name="D_id_tiket" id="id_tiket">
                        </div>
                    </div>

                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <p name="D_tgl_pengajuan">Tanggal Pengajuan : <b></b></p>
                            <p name="D_nama_user">Nama : <b></b></p>
                        </div>

                        <div class="col-sm-4 invoice-col">
                            <p name="D_nama_divisi">Divisi : <b></b></p>
                            <p name="D_tgl_diperlukan">Tanggal Diperlukan : <b></b></p>
                        </div>

                        <div class="col-sm-4 invoice-col">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12" style="margin-bottom: 10px; margin-top: 15px">
                            <table class="table table-bordered" id="tableDetail">
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light" id="kotakapprove">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center ">Finance Dept</span>
                                    <span class="info-box-text text-center mb-0" id="nameapprove"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light" id="kotakapprove1">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center ">IT support</span>
                                    <span class="info-box-text text-center  mb-0" id="nameapprove1"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-warning" id="btnTolak">Tolak</button>
                    <button class="btn btn-info" id="btnApprove">Approve</button>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- Modal Detail Form Fasilitas -->
<div class="modal fade" id="detailModalFasilitas" tabindex="-1" aria-labelledby="detailModal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalFasilitas">Detail Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="invoice p-3 mb-3" id="detailTiketPage">
                    <div class="row">
                        <div class="col-12 text-center" style="margin-bottom: 15px; margin-top: 15px;">
                            <h4>Form Pengajuan Fasilitas</h4>
                            <input type="hidden" name="D_id_tiket" id="id_tiket">
                        </div>
                    </div>

                    <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col">
                            <p name="D_tgl_pengajuan">Tanggal Pengajuan : <b></b></p>
                            <p name="D_nik_user">NIK : <b></b></p>
                            <p name="D_nama_user">Nama : <b></b></p>
                        </div>

                        <div class="col-sm-6 invoice-col">
                            <p name="D_store">Store : <b></b></p>
                            <p name="D_dept">Dept : <b></b></p>
                            <p name="D_jabatan">Jabatan : <b></b></p>
                            <!-- <p name="D_tgl_diperlukan">Tanggal Diperlukan : <b></b></p> -->
                        </div>
                        <!-- <div class="col-sm-4 invoice-col">
                        </div> -->
                    </div>
                    <h2 class="my-3">Fasilitas IT</h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">

                                <p name="D_komputer">Komputer : <b></b></p>
                                <!-- <label class="msg ">bjir</label> -->
                            </div>
                            <div class="form-group">
                                <!-- <label for="exampleInputPassword1" >Type: *</label> -->

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <p name="D_type">Type : <b></b></p>

                            </div>
                        </div>


                    </div>
                    <div class="form_group keterangan1 mb-3">
                        <label for="D_keterangan1">Keterangan</label>
                        <textarea class="form-control" id="D_keterangan1" name="D_keterangan1" rows="" placeholder="Keterangan"></textarea>
                    </div>
                    <!-- Email_VPN -->
                    <div class="row justify-content-between">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <p name="D_email">Email : <b></b></p>
                                <p name="D_usb">Akses USB : <b></b></p>
                                <p name="D_internet">Akses Internet : <b></b></p>


                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <p name="D_wifi">Wifi : <b></b></p>
                                <p name="D_vpn">VPN : <b></b></p>
                                <p name="D_akses">Akses : <b></b></p>

                            </div>
                        </div>
                    </div>
                    <!-- Email_VPN -->
                    <div class=" form-group keterangan2 mb-3">
                        <label for="D_keterangan2">Keterangan</label>

                        <textarea class="form-control" rows="" id="D_keterangan2" name="D_keterangan2" placeholder="Keterangan"></textarea>
                    </div>

                    <div class="form-group">
                        <!-- <label>Aplikasi (SAP/POS/File Server)</label> -->
                        <p name="D_aplikasi">Aplikasi (SAP/POS/File Server) : <b></b></p>

                        <!-- <select class="form-control" id="aplikasi" name="aplikasi">
                            <option value="sap">SAP</option>
                            <option value="pos">POS</option>
                            <option value="fileserver">FileServer</option>
                        </select> -->
                    </div>
                    <div class="form-group">
                        <!-- <label>Aplikasi (SAP/POS/File Server)</label> -->
                        <p name="D_userType">User Type : <b></b></p>

                    </div>


                    <div class="form-group keterangan3 mb-3">
                        <label for="D_keterangan3">Keterangan</label>

                        <textarea class="form-control" rows="" id="D_keterangan3" name="D_keterangan3" placeholder="Keterangan"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-12" style="margin-bottom: 10px; margin-top: 15px">
                            <table class="table table-bordered" id="tableDetail">
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Atasan Langsung</span>
                                    <span class="info-box-number text-center text-muted mb-0"></span>
                                    <span class="info-box-number text-center text-muted mb-0"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Finance Dept</span>
                                    <span class="info-box-number text-center text-muted mb-0"></span>
                                    <span class="info-box-number text-center text-muted mb-0"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">IT support</span>
                                    <span class="info-box-number text-center text-muted mb-0"></span>
                                    <span class="info-box-number text-center text-muted mb-0"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" onclick="generatePdfForModal($tiket[id_tiket])">Generate PDF</button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $("#btnTolak").on("click", function() {
        processApproval2("reject");
    });
    $("#btnApprove").on("click", function() {
        processApproval1("approve");
    });

    function processApproval1(action) {
        $.ajax({
            url: "process-approval/" + $("#id_tiket").val(),
            type: "POST",
            data: {
                action: action,
            },
            dataType: "JSON",
            success: function(data) {
                alert("Proses " + action + " berhasil.");

                if (data.success && data.name !== undefined) {
                    if (data.role_id === 22) {
                        $("#kotakapprove").removeClass("bg-light").addClass("bg-success");
                        $("#nameapprove").text(data.name);
                        location.reload();
                    } else if (data.role_id === 1) {
                        $("#kotakapprove1").removeClass("bg-light").addClass("bg-success");
                        $("#nameapprove1").text(data.name);
                        location.reload();
                    }
                }
            },
            error: function(error) {
                console.error("Error processing approval:", error);
            },
        });
    }

    function processApproval2(action) {
        $.ajax({
            url: "process-reject/" + $("#id_tiket").val(),
            type: "POST",
            data: {
                action: action,
            },
            dataType: "JSON",
            success: function(data) {
                alert("Proses " + action + " berhasil.");

                if (data.success && data.name !== undefined) {
                    if (data.role_id === 22) {
                        $("#kotakapprove").removeClass("bg-light").addClass("bg-danger");
                        $("#nameapprove").text(data.name);
                        location.reload();
                    } else if (data.role_id === 1) {
                        $("#kotakapprove1").removeClass("bg-light").addClass("bg-danger");
                        $("#nameapprove1").text(data.name);
                        location.reload();
                    }
                }
            },
            error: function(error) {
                console.error("Error processing approval:", error);
            },
        });
    }
</script>


<?= $this->endSection(); ?>


<!-- /.content -->