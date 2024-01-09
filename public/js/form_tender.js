$(document).ready(function () {
  $("#formTiketTender").submit(function (e) {
    e.preventDefault();

    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "/createTender",
      data: formData,
      dataType: "json",
      success: function (response) {
        if (response.success) {
          alert(response.message);
          window.location.href = "/listtiket";
        } else {
          $(".error").show();
          $(".error").html(response.error);
        }
      },
      error: function (xhr, status, error) {
        var errorMessage = xhr.responseText || "Oops! Something went wrong.";
        console.log(errorMessage);
        alert("Error: " + errorMessage);
      },
    });
  });

  $("#formTiketTenderEdit").submit(function (event) {
    event.preventDefault();
    var idTiket = $("#id_tiket").val();
    if (!idTiket) {
      alert("Error: ID Tiket is empty");
      return;
    }
    var dataForm = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "/updateTender/" + idTiket,
      data: dataForm,
      success: function (response) {
        if (response.success) {
          alert(response.message);
          window.location.href = "/listtiket";
        } else {
          alert("Error: " + response.message);
        }
      },
      error: function (error) {
        alert("Terjadi kesalahan saat mengedit data.");
      },
    });
  });
});

$(document).ready(function () {
  $("#TenderBaru").change(function () {
    if (this.checked) {
      $("#tenderTypeBaruFields").show();
      $("#tenderTypeLamaFields").hide();
      $("#TenderLama").prop("checked", false);
      $("#tenderTypeBaruFields :input").prop("required", true);
      $("#tenderTypeLamaFields :input").prop("required", false);
      $("#TenderBaru").prop("required", true);
      $("#TenderLama").prop("required", false);
      $("#SementaraFieldBaru :input").prop("required", false);
      $("#periode_aktifBaru :input").prop("required", false);
      $("#tgl_aktifBaru :input").prop("required", false);
      $("#EDCbaru :input").prop("required", false);
      $("#ket_edc_baru :input").prop("required", false);
    } else {
      $("#TenderBaru").prop("required", false);
      $("#tenderTypeBaruFields").hide();
      $("#tenderTypeBaruFields :input").prop("required", false);
    }
  });

  $("#TenderLama").change(function () {
    if (this.checked) {
      $("#TenderLama").prop("required", true);
      $("#TenderBaru").prop("required", false);
      $("#tenderTypeLamaFields").show();
      $("#tenderTypeBaruFields").hide();
      $("#TenderBaru").prop("checked", false);
      $("#tenderTypeLamaFields :input").prop("required", true);
      $("#tenderTypeBaruFields :input").prop("required", false);
      $("#SementaraFieldLama :input").prop("required", false);
      $("#periode_aktifLama :input").prop("required", false);
      $("#tgl_aktifLama :input").prop("required", false);
    } else {
      $("#TenderLama").prop("required", false);
      $("#tenderTypeLamaFields").hide();
      $("#tenderTypeLamaFields :input").prop("required", false);
    }
  });

  $("#Ya").change(function () {
    if (this.checked) {
      $("Ya").prop("required", true);
      $("#EDCbaru").show();
      $("#EDCbaru :input").prop("required", true);
      $("#Tidak").prop("checked", false);
    } else {
      $("Ya").prop("required", false);
      $("#EDCbaru").hide();
      $("#EDCbaru :input").prop("required", false);
    }
  });

  $("#Tidak").change(function () {
    if (this.checked) {
      $("Ya").prop("required", false);
      $("#Ya").prop("checked", false);
      $("#EDCbaru").hide();
      $("#EDCbaru :input").prop("required", false);
    }
  });

  $("#SementaraLama").change(function () {
    if (this.checked) {
      $("#SementaraLama").prop("checked", true);
      $("#SementaraFieldLama").show();
      $("#SementaraFieldLama :input").prop("required", true);
      $("#periode_aktifLama :input").prop("required", true);
      $("#tgl_aktifLama :input").prop("required", true);
      $("#PermanenLama").prop("checked", false);
    } else {
      $("#SementaraLama").prop("required", false);
      $("#SementaraLama").prop("checked", false);
      $("#SementaraFieldLama").hide();
      $("#SementaraFieldLama :input").prop("required", false);
      $("#periode_aktifLama :input").prop("required", false);
      $("#tgl_aktifLama :input").prop("required", false);
    }
  });

  $("#PermanenLama").change(function () {
    if (this.checked) {
      $("#PermanenLama").prop("checked", true);
      $("#SementaraFieldLama").hide();
      $("#SementaraFieldLama :input").prop("required", false);
      $("#periode_aktifLama :input").prop("required", false);
      $("#tgl_aktifLama :input").prop("required", false);
      $("#SementaraLama").prop("checked", false);
    }
  });

  $("#SementaraBaru").change(function () {
    if (this.checked) {
      $("#SementaraBaru").prop("required", true);
      $("#SementaraFieldBaru").show();
      $("#SementaraFieldBaru :input").prop("required", true);
      $("#PermanenBaru").prop("checked", false);
    } else {
      $("#SementaraBaru").prop("required", false);
      $("#SementaraFieldBaru :input").hide();
      $("#SementaraFieldBaru").prop("required", false);
    }
  });

  $("#PermanenBaru").change(function () {
    if (this.checked) {
      $("#PermanenBaru").prop("required", true);
      $("#SementaraFieldBaru").hide();
      $("#SementaraFieldBaru :input").prop("required", false);
      $("#SementaraBaru").prop("checked", false);
    }
  });
});
