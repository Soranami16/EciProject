<?= $this->extend('template/dashboard'); ?>
<?= $this->section('page-content'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row p-sm-2">
            <!-- <h1>bjir jg</h1> -->
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Request Fasilitas IT</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="formFasilitas">
                        <div class="card-body">
                            <!-- carBodyStart -->
                            <div class="container">
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
                                            <input type="text" name="nik_user" class="form-control" id="nik_user" value>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_user">Nama</label>
                                            <input type="text" name="nama_user" class="form-control" id="nama_user" value="<?= $name ?>">
                                            <input type="hidden" name="user_id" value="<?= $user['OID'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="store">Store</label>
                                            <select class="form-select form-control" id="store" name="store" aria-label="Default select example">
                                                <option selected="true" disabled="disabled" value="0">Store</option>
                                                <?php foreach ($stores as $store) : ?>
                                                    <option value="<?= $store['OID']; ?>"><?= $store['Name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class=" form-group">
                                            <label for="dept_user">Dept</label>
                                            <input type="text" name="dept_user" class="form-control" id="dept_user" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_divisi">Jabatan</label>
                                            <input type="text" name="nama_divisi" class="form-control" id="nama_divisi" value="<?= $division['Name'] ?>">
                                            <input type="hidden" name="role_id" value="<?= $division['OID'] ?>">
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
                                                    <label class="form-check-label" for="Desktop">
                                                        Desktop
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-check">
                                                <div class="div col-3">

                                                    <input class="form-check-input radioType" type="radio" name="radio_type" id="device_type" value="Laptop">
                                                    <label class="form-check-label" for="Laptop">
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
                                                    Internal
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input radioAkses" type="radio" name="radio_akses" id="keluar" value="Keluar">
                                                <label class="form-check-label" for="keluar">
                                                    Keluar
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
                                        <option value="fileserver">File Server</option>
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
                </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- fix for small devices only -->
        <!-- <div class="clearfix hidden-md-up"></div> -->
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
<!-- Your HTML code remains unchanged -->


<?= $this->endSection(); ?>