function editFunction(tiketID) {
  // $("#formTiketTenderEdit")[0].reset();
  var tenderTypeBaruFields = document.getElementById("tenderTypeBaruFields");
  var tenderTypeLamaFields = document.getElementById("tenderTypeLamaFields");
  var EDCbaru = document.getElementById("EDCbaru");
  var SementaraFieldBaru = document.getElementById("SementaraFieldBaru");
  var SementaraFieldLama = document.getElementById("SementaraFieldLama");
  $.ajax({
    url: "/listtiket/editTender/" + tiketID,
    type: "GET",
    dataType: "JSON",
    success: function (data) {
      $("#editModal").modal("show");

      $('[name="id_tiket"]').val(data.tender["id_tiket"]);
      $('[name="tgl_pengajuan"]').val(data.tender["tanggal"]);
      $('[name="nama_user"]').val(data.tiket["user_name"]);
      $('[name="user_id"]').val(data.user["OID"]);
      $('[name="tgl_diperlukan"]').val(data.tender["tgl_diperlukan"]);
      $('[name="nama_divisi"]').val(data.tiket["role_name"]);
      $('[name="role_id"]').val(data.division["OID"]);

      if (data.tender["tender_type"] == 0) {
        $("#TenderBaru").prop("checked", true);
        $("#TenderLama").prop("checked", false);
        tenderTypeBaruFields.style.display = "block";
        tenderTypeLamaFields.style.display = "none";
      } else if (data.tender["tender_type"] == 1) {
        $("#TenderBaru").prop("checked", false);
        $("#TenderLama").prop("checked", true);
        tenderTypeBaruFields.style.display = "none";
        tenderTypeLamaFields.style.display = "block";
      }

      //baruu
      $('[name="deskripsi_tender_baru"]').val(data.tender["deskripsi_tender"]);
      if (data.tender["edc_baru"] == 0) {
        $("#Ya").prop("checked", true);
        $("#Tidak").prop("checked", false);
        EDCbaru.style.display = "block";
      } else if (data.tender["edc_baru"] == 1) {
        $("#Ya").prop("checked", false);
        $("#Tidak").prop("checked", true);
        EDCbaru.style.display = "none";
      } else {
        EDCbaru.style.display = "none";
      }
      $('[name="ket_edc_baru"]').val(data.tender["ket_edc_baru"]);
      $('[name="GL_mapping_tender"]').val(data.tender["GL_mapping_tender"]);
      if (data.tender["karakteristik_tender"] == 0) {
        $("#SementaraBaru").prop("checked", true);
        $("#PermanenBaru").prop("checked", false);
        SementaraFieldBaru.style.display = "block";
      } else if (data.tender["karakteristik_tender"] == 1) {
        $("#SementaraBaru").prop("checked", false);
        $("#PermanenBaru").prop("checked", true);
        SementaraFieldBaru.style.display = "none";
      }
      $('[name="tgl_aktif_baru" ]').val(data.tender["tgl_aktif"]);
      $('[name="periode_aktif_baru"]').val(data.tender["periode_aktif"]);

      //lama
      $('[name="kode_tender"]').val(data.tender["kode_tender"]);
      $('[name="deskripsi_tender_lama"]').val(data.tender["deskripsi_tender"]);
      if (data.tender["karakteristik_tender"] == 0) {
        $("#SementaraLama").prop("checked", true);
        $("#PermanenLama").prop("checked", false);
        SementaraFieldLama.style.display = "block";
      } else if (data.tender["karakteristik_tender"] == 1) {
        $("#SementaraLama").prop("checked", false);
        $("#PermanenLama").prop("checked", true);
        SementaraFieldLama.style.display = "none";
      }
      $('[name="tgl_aktif_lama" ]').val(data.tender["tgl_aktif"]);
      $('[name="periode_aktif_lama"]').val(data.tender["periode_aktif"]);
    },
    error: function (error) {
      console.error("Error fetching modal content:", error);
    },
  });
}
function editFunctionFasilitas(tiketID) {
  $.ajax({
    url: "/listtiket/editFasilitas/" + tiketID,
    type: "GET",
    dataType: "JSON",
    success: function (data) {
      // alert(data.fasilitas["store"]);
      $("#editModalFasilitas").modal("show");
      $('[name="id_tiket"]').val(data.fasilitas["id_tiket"]);
      $('[name="dept_user"]').val(data.fasilitas["dept"]);
      $('[name="nik_user"]').val(data.fasilitas["nik"]);
      $('[name="nama_user"]').val(data.fasilitas["nama"]);
      $('[name="nama_divisi"]').val(data.fasilitas["jabatan"]);
      $('[name="tgl_pengajuan"]').val(data.fasilitas["tanggal"]);
      if (data.fasilitas["komputer"] == 1) {
        $("#komputer_ya").prop("checked", true);
        $(
          "input[type=radio][value='Desktop'], input[type=radio][value='Laptop']"
        ).prop("disabled", false);

        if (data.fasilitas["type_device"] == "Desktop") {
          $('input[name="radio_type"][value="Desktop"]').prop("checked", true);
        } else {
          $('input[name="radio_type"][value="Laptop"]').prop("checked", true);
        }
        if (data.fasilitas["device_type"] == "Desktop") {
          $("input[name='radio_type']").prop("checked", true);
        } else if (data.fasilitas["device_type"] == "Laptop") {
          $("input[value='Laptop']").prop("checked", true);
        }

        $("#komputer_tidak").prop("checked", false);
      } else if (data.fasilitas["komputer"] == 0) {
        $("#komputer_tidak").prop("checked", true);
        $("input[name='radio_type']").prop("checked", false);
        $("#device_type").prop("checked", false);

        $("#komputer_ya").prop("checked", false);
        $("input[name='radio_type']").prop("checked", false);
        $(
          "input[type=radio][value='Desktop'], input[type=radio][value='Laptop']"
        ).prop("checked", false);
      }
      //keterangan
      $("#keterangan1").val(data.fasilitas["keterangan1"]);
      $("#keterangan2").val(data.fasilitas["keterangan2"]);
      $("#keterangan3").val(data.fasilitas["keterangan3"]);

      //radio-button
      if (data.fasilitas["email"] == 1) {
        $('input[name="radio_email"][value="1"]').prop("checked", true);
        $("radio_email").val(data.fasilitas["email"]);
      } else {
        $('input[name="radio_email"][value="0"]').prop("checked", true);
      }
      if (data.fasilitas["aksesUsb"] == 1) {
        $('input[name="radio_usb"][value="1"]').prop("checked", true);
      } else {
        $('input[name="radio_usb"][value="0"]').prop("checked", true);
      }
      if (data.fasilitas["aksesInternet"] == 1) {
        $('input[name="radio_internet"][value="1"]').prop("checked", true);
      } else {
        $('input[name="radio_internet"][value="0"]').prop("checked", true);
      }
      if (data.fasilitas["wifi"] == 1) {
        $('input[name="radio_wifi"][value="1"]').prop("checked", true);
      } else {
        $('input[name="radio_wifi"][value="0"]').prop("checked", true);
      }
      if (data.fasilitas["vpn"] == 1) {
        $('input[name="radio_vpn"][value="1"]').prop("checked", true);
      } else {
        $('input[name="radio_vpn"][value="0"]').prop("checked", true);
      }
      if (data.fasilitas["akses"] == "Internal") {
        $('input[name="radio_akses"][value="Internal"]').prop("checked", true);
      } else {
        $('input[name="radio_akses"][value="Keluar"]').prop("checked", true);
      }
      $("#keterangan3").val(data.fasilitas["keterangan3"]);

      //aplikasi
      if (data.fasilitas["aplikasi"] == "sap") {
        $("#aplikasi").val(data.fasilitas["aplikasi"]);
      } else if (data.fasilitas["aplikasi"] == "pos") {
        $("#aplikasi").val(data.fasilitas["aplikasi"]);
      } else if (data.fasilitas["aplikasi"] == "fileserver") {
        $("#aplikasi").val(data.fasilitas["aplikasi"]);
      }

      //userTYpe
      if (data.fasilitas["type_user"] === "Mutasi User") {
        //ternyata case sensitive... gamau kalo "mutasi user" kapital harus include
        $("#mutasiUser").prop("checked", true);
      } else {
        $("#newUser").prop("checked", true);
      }
      // console.log(data.stores);
      var selectOptions = "";
      $.each(data.stores, function (key, value) {
        // console.log(value.OID);
        // console.log(value.Name);
        // selectOptions +=
        //   '<option value="true" disabled="disabled" value="0">Store</option>';
        selectOptions += '<option value="' + value.OID + '"';
        if (value.OID == data.fasilitas["store"]) {
          selectOptions += " selected";
        }
        selectOptions += ">" + value.Name + "</option>";
      });

      $("#stores").html(selectOptions);
    },
    error: function (error) {
      console.error("Error fetching modal content:", error);
    },
  });
}
