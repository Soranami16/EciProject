function editFunction(id_tiket) {
  $.ajax({
    type: "GET",
    url: "listtiket/editTender/" + id_tiket,
    success: function (response) {
      $("#editModal").html(response);
      $("#editModal").modal("show");
    },
    error: function (error) {
      console.error("Gagal memuat modal edit:", error);
    },
  });
}

function deleteTiket(tiketID) {
  var confirmation = confirm(
    "Apakah Anda yakin ingin menghapus tiket dengan ID " + tiketID + "?"
  );
  if (confirmation) {
    console.log("Menghapus tiket dengan ID " + tiketID);
    $.ajax({
      type: "POST",
      url: "listtiket/deleteTender/" + tiketID,
      data: { tiketID: tiketID },
      success: function (response) {
        alert("Tiket berhasil dihapus");
        location.reload();
      },
      error: function (error) {
        alert("Gagal menghapus tiket:", error);
      },
    });
  } else {
    alert("Penghapusan dibatalkan");
  }
}

$(document).ready(function () {
  $("#tombolUpdate").on("click", function () {
    alert("Edit button clicked");
    // Add your logic here
  });

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
      type: "post",
      url: "updateTender/" + idTiket,
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
