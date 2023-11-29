 <!-- Modal -->
 <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="detailModal" aria-hidden="true">
     <div class="modal-dialog  modal-dialog-scrollable  modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="detailModal">Edit Form Tender</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <!-- form start -->
                 <form id="formTiketTenderEdit">
                     <input type="hidden" name="id_tiket" id="id_tiket" value="<?= $tender['id_tiket'] ?>">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-sm-6">
                                 <div class="form-group">
                                     <label>Tanggal Pengajuan</label>
                                     <?php
                                        $formattedDate = date('Y-m-d', strtotime($tender['tanggal']));
                                        ?>
                                     <input type="date" class="form-control" name="tgl_pengajuan" value="<?= $formattedDate ?>" readonly />
                                 </div>
                                 <div class="form-group">
                                     <label for="user_id">Nama</label>
                                     <input type="text" name="nama_user" class="form-control" id="nama_user" value="<?= $tiket->user_name ?>" readonly>
                                     <input type="hidden" name="user_id" value="<?= $user['OID'] ?>">
                                 </div>
                             </div>
                             <div class="col-sm-6">
                                 <div class="form-group">
                                     <label>Tanggal Diperlukan</label>
                                     <?php
                                        $formattedDate = date('Y-m-d', strtotime($tender['tgl_diperlukan']));
                                        ?>
                                     <input type="date" class="form-control" name="tgl_diperlukan" value="<?= $formattedDate ?>" />
                                 </div>
                                 <div class="form-group">
                                     <label for="exampleInputPassword1">Divisi</label>
                                     <input type="text" name="nama_divisi" class="form-control" id="nama_divisi" value="<?= $tiket->role_name ?>" readonly>
                                     <input type="hidden" name="role_id" value="<?= $division['OID'] ?>">
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="row">
                                 <div class="col-sm-2">
                                     <div class="form-check">
                                         <input type="radio" name="tender_type" class="form-check-input" id="TenderBaru" value="0" <?php echo ($tender['tender_type'] == 0) ? 'checked' : ''; ?>required>
                                         <label class="form-check-label" for="TenderBaru"><strong>Tender Type Baru</strong></label>
                                     </div>
                                 </div>
                                 <div class="col-sm-2">
                                     <div class="form-check">
                                         <input type="radio" name="tender_type" class="form-check-input" id="TenderLama" value="1" <?php echo ($tender['tender_type'] == 1) ? 'checked' : ''; ?> required>
                                         <label class="form-check-label" for="TenderLama"><strong>Tender Type Lama</strong></label>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <!-- baru -->
                         <div id="tenderTypeBaruFields" style="display: <?= ($tender['tender_type'] == 0) ? 'block' : 'none' ?>;">
                             <div class=" form-group">
                                 <label for="deskripsi_tender_baru">Deskripsi Tender Type</label>
                                 <input type="text" name="deskripsi_tender_baru" class="form-control" id="deskripsi_tender_baru" value=" <?= $tender['deskripsi_tender'] ?>" placeholder="Isi Deskripsi Tender Type">
                             </div>
                             <div class="form-group">
                                 <label for="edcbaru">EDC Baru</label>
                                 <div class="form-group">
                                     <div class="row">
                                         <div class="col-sm-2">
                                             <div class="form-check">
                                                 <input type="radio" name="edc_baru" class="form-check-input" id="Ya" value="0" <?php echo ($tender['edc_baru'] == 0) ? 'checked' : ''; ?>>
                                                 <label class="form-check-label" for="Ya"><strong>Ya</strong></label>
                                             </div>
                                         </div>
                                         <div class="col-sm-2">
                                             <div class="form-check">
                                                 <input type="radio" name="edc_baru" class="form-check-input" id="Tidak" value="1" <?php echo ($tender['edc_baru'] == 1) ? 'checked' : ''; ?>>
                                                 <label class="form-check-label" for="Tidak">
                                                     <stromg>Tidak</strong>
                                                 </label>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div id="EDCbaru" style="display: <?= ($tender['edc_baru'] == 0) ? 'block' : 'none' ?>;">
                                     <div class="form-group">
                                         <input type="text" name="ket_edc_baru" class="form-control" id="ket_edc_baru" value=" <?= $tender['ket_edc_baru'] ?>" placeholder="Di isi oleh Finance Dept">
                                     </div>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="tenderTypeBaruField">GL Mapping Tender</label>
                                 <input type="text" name="GL_mapping_tender" class="form-control" id="GL_mapping_tender" value=" <?= $tender['GL_mapping_tender'] ?>" placeholder="Di isi oleh Finance Dept">
                             </div>
                             <div class="form-group">
                                 <label for="kar_tender">Karakteristik Tender</label>
                                 <div class="form-group">
                                     <div class="row">
                                         <div class="col-sm-2">
                                             <div class="form-check">
                                                 <input type="radio" name="karakteristik_tender_baru" class="form-check-input" id="SementaraBaru" value="0" <?php echo ($tender['karakteristik_tender'] == 0) ? 'checked' : ''; ?>>
                                                 <label class="form-check-label" for="SementaraBaru"><strong>Sementara</strong></label>
                                             </div>
                                         </div>
                                         <div class="col-sm-2">
                                             <div class="form-check">
                                                 <input type="radio" name="karakteristik_tender_baru" class="form-check-input" id="PermanenBaru" value="1" <?php echo ($tender['karakteristik_tender'] == 1) ? 'checked' : ''; ?>>
                                                 <label class="form-check-label" for="PermanenBaru"><strong>Permanen</strong></label>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div id="SementaraFieldBaru" style="<?= ($tender['karakteristik_tender'] == 0) ? 'block' : 'none' ?>;">
                                     <label>Tanggal Aktif</label>
                                     <div class="row">
                                         <div class="col-sm-6">
                                             <div class="form-group">
                                                 <?php
                                                    $formattedDate = date('Y-m-d', strtotime($tender['tgl_aktif']));
                                                    ?>
                                                 <input type="date" class="form-control" name="tgl_aktif_baru" value="<?= $formattedDate ?>" />
                                             </div>
                                         </div>
                                         <div class="col-sm-6">
                                             <div class="form-group">
                                                 <input type="text" name="periode_aktif_baru" class="form-control" id="periode_aktifBaru" value=" <?= $tender['periode_aktif'] ?>">
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <!--lama-->
                         <div id="tenderTypeLamaFields" style="display: <?= ($tender['tender_type'] == 1) ? 'block' : 'none' ?>;">
                             <div class="form-group">
                                 <label for="kode_tender">Kode Tender Type</label>
                                 <input type="text" name="kode_tender" class="form-control" id="kode_tender" value=" <?= $tender['kode_tender'] ?>" placeholder=" Isi Kode Tender Type">
                             </div>
                             <div class="form-group">
                                 <label for="deskripsi_tender_lama">Deskripsi Tender Type</label>
                                 <input type="text" name="deskripsi_tender_lama" class="form-control" id="deskripsi_tender_lama" value=" <?= $tender['deskripsi_tender'] ?>" placeholder="Isi Deskripsi Tender Type">
                             </div>
                             <div class="form-group">
                                 <label for="kar_tender">Karakteristik Tender</label>
                                 <div class="form-group">
                                     <div class="row">
                                         <div class="col-sm-2">
                                             <div class="custom-control custom-checkbox">
                                                 <input type="radio" name="karakteristik_tender_lama" class="form-check-input" id="SementaraLama" value="0" <?php echo ($tender['karakteristik_tender'] == 0) ? 'checked' : ''; ?>>
                                                 <label class="form-check-label" for="SementaraLama">Sementara</label>
                                             </div>
                                         </div>
                                         <div class="col-sm-2">
                                             <div class="custom-control custom-checkbox">
                                                 <input type="radio" name="karakteristik_tender_lama" class="form-check-input" id="PermanenLama" value="1" <?php echo ($tender['karakteristik_tender'] == 1) ? 'checked' : ''; ?>>
                                                 <label class="form-check-label" for="Permanenlama">Permanen</label>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div id="SementaraFieldLama" style="<?= ($tender['karakteristik_tender'] == 0) ? 'display:block;' : 'display:none;' ?>;">
                                     <label>Tanggal Aktif</label>
                                     <div class="row">
                                         <div class="col-sm-6">
                                             <div class="form-group">
                                                 <?php
                                                    $formattedDate = ($tender['karakteristik_tender'] == 0) ? date('Y-m-d', strtotime($tender['tgl_aktif'])) : null;
                                                    ?>
                                                 <input type="date" class="form-control" name="tgl_aktif_lama" value="<?= $formattedDate ?>" />
                                             </div>
                                         </div>
                                         <div class="col-sm-6">
                                             <div class="form-group">
                                                 <?php
                                                    $periodeAktifValue = ($tender['karakteristik_tender'] == 0) ? $tender['periode_aktif'] : null;
                                                    ?>
                                                 <input type="text" name="periode_aktif_lama" class="form-control" id="periode_aktifLama" value=" <?= $tender['periode_aktif'] ?>">
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
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-primary" id="tombolUpdate">Save changes</button>
             </div>
         </div>
     </div>
 </div>