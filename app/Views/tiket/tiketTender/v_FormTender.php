<?= $this->extend('template/dashboard'); ?>
<?= $this->section('page-content'); ?>
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
                  <!-- Kalau Error -->
                  <div class="alert alert-danger error" role="alert" style="display: none;"></div>
                  <div class="form-group">
                    <label>Tanggal Pengajuan</label>
                    <?php
                    $formattedDate = date('Y-m-d', strtotime($userLoginDate));
                    ?>
                    <input type="date" class="form-control" name="tgl_pengajuan" value="<?= $formattedDate ?>" readonly />
                  </div>
                  <div class="form-group">
                    <label for="user_id">Nama</label>
                    <input type="text" name="nama_user" class="form-control" id="nama_user" value="<?= $name ?>" readonly>
                    <input type="hidden" name="user_id" value="<?= $user['OID'] ?>">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Tanggal Diperlukan</label>
                    <input type="date" class="form-control" name="tgl_diperlukan" required />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Divisi</label>
                    <input type="text" name="nama_divisi" class="form-control" id="nama_divisi" value="<?= $division['Name'] ?>" readonly>
                    <input type="hidden" name="role_id" value="<?= $division['OID'] ?>">
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
              <div id="tenderTypeBaruFields" style="display:none;">
                <div class="form-group">
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
                  <div id="SementaraFieldBaru" style="display:none;">
                    <label>Tanggal Aktif</label>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input type="date" class="form-control datetimepicker-input" name="tgl_aktif_baru" id="tgl_aktifBaru">
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
              <div id="tenderTypeLamaFields" style="display:none;">
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
                  <div id="SementaraFieldLama" style="display:none;">
                    <label>Tanggal Aktif</label>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input type="date" class="form-control datetimepicker-input" name="tgl_aktif_lama" id="tgl_aktifLama" />
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


<!-- <script>
  function editFunction(tiketID) {
  $.ajax({
    url: "listtiket/editTender/" + tiketID,
    type: "GET",
    success: function (data) {
      $("body").append(response);
      $("#editModal").modal("show");
      
    },
    error: function (error) {
      console.error("Error fetching modal content:", error);
    },
  });
}
</script> -->

<!-- /.content -->
<?= $this->endSection(); ?>