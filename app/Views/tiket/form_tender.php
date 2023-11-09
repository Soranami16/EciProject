<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'dashboard'; ?>">Home</a></li>
            <li class="breadcrumb-item active">Form Pengajuan Pengaktifan Tender Type</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Pengaktifan Tender Type</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="formTiketTender">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Tanggal Pengajuan</label>
                      <div class="input-group date" id="tgl_pengajuan" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#tgl_pengajuan" value="<?= session()->get('login_date') ?>" />
                        <div class="input-group-append" data-target="#tgl_pengajuan" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="user_id">Nama</label>
                      <input type="text" name="user_id" class="form-control" id="user_id" value="<?= $name ?>">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Tanggal Diperlukan</label>
                      <div class="input-group date" id="tgl_diperlukan" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#tgl_diperlukan" />
                        <div class="input-group-append" data-target="#tgl_diperlukan" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Divisi</label>
                      <input type="text" name="role_id" class="form-control" id="role_id" value="<?= $division['Name'] ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form-group">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="TenderBaru" class="custom-control-input" id="TenderBaru">
                        <label class="custom-control-label" for="TenderBaru">Tender Type Baru</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="TenderLama" class="custom-control-input" id="TenderLama">
                        <label class="custom-control-label" for="TenderLama">Tender Type Lama</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div id="tenderTypeBaruFields" style="display:none;">
                  <div class="form-group">
                    <label for="deskripsi_tender">Deskripsi Tender Type</label>
                    <input type="text" name="deskripsi_tender" class="form-control" id="deskripsi_tender" placeholder="Deskripsi Tender Type">
                  </div>
                  <div class="form-group">
                    <label for="edcbaru">EDC Baru</label>
                    <div class="row">
                      <div class="col-sm-2">
                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="Ya" class="custom-control-input" id="Ya">
                            <label class="custom-control-label" for="Ya">Ya</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="Tidak" class="custom-control-input" id="Tidak">
                            <label class="custom-control-label" for="Tidak">Tidak</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="EDCbaru" style="display:none;">
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
                    <label for="KarakteristikTenderType">Karakteristik Tender Type</label>
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="Sementara" class="custom-control-input" id="Sementara">
                            <label class="custom-control-label" for="Sementara">Sementara</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="Permanen" class="custom-control-input" id="Permanen">
                            <label class="custom-control-label" for="Permanen">Permanen</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="SementaraTypeBaruField" style="display:none;">
                      <div class="form-group">
                        <label>Tanggal Aktif</label>
                        <div class="input-group date" id="tgl_aktif" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" data-target="#tgl_aktif" />
                          <div class="input-group-append" data-target="#tgl_aktif" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <input type="text" name="periode_aktif" class="form-control" id="period_eaktif">
                      </div>
                    </div>
                  </div>
                </div>

                <div id="tenderTypeLamaFields" style="display:none;">
                  <div class="form-group">
                    <label for="kode_tender">Kode Tender Type</label>
                    <input type="text" name="kode_tender" class="form-control" id="kode_tender" placeholder=" Isi Kode Tender Type">
                  </div>
                  <div class="form-group">
                    <label for="deskripsi_tender">Deskripsi Tender Type</label>
                    <input type="text" name="deskripsi_tender" class="form-control" id="deskripsi_tender" placeholder="Isi Deskripsi Tender Type">
                  </div>
                  <div class="form-group">
                    <label for="KarakteristikTenderType">Karakteristik Tender Type</label>
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="Sementara" class="custom-control-input" id="Sementara">
                            <label class="custom-control-label" for="Sementara">Sementara</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="Permanen" class="custom-control-input" id="Permanen">
                            <label class="custom-control-label" for="Permanen">Permanen</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="SementaraTypeLamaField" style="display:none;">
                      <div class="form-group">
                        <label>Tanggal Aktif</label>
                        <div class="input-group date" id="tgl_aktif" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" data-target="#tgl_aktif" />
                          <div class="input-group-append" data-target="#tgl_aktif" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <input type="text" name="periode_aktif" class="form-control" id="periode_aktif">
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
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>