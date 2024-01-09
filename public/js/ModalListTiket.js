function deleteTiket(tiketID) {
  Swal.fire({
    title: "Apakah Anda yakin ingin menghapus tiket?",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, Hapus!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "listtiket/deleteTender/" + tiketID,
        data: { tiketID: tiketID },
        success: function (response) {
          Swal.fire("Tiket berhasil dihapus", "", "success");
          // .then(() => {
          //   location.reload();
          // });
        },
        error: function (error) {
          Swal.fire("Gagal menghapus tiket", error.responseText, "error");
        },
      });
    }
  });
}
function editFunction(tiketID) {
  $("#formTiketTenderEdit")[0].reset();
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

function detailTiket(tiketID) {
  $.ajax({
    url: "listtiket/detailtiket/" + tiketID,
    type: "GET",
    dataType: "JSON",
    success: function (data) {
      // Mengisi data ke modal
      $("#id_tiket").val(data.tiket.id_tiket);
      $('[name="D_tgl_pengajuan"] b').text(data.tiket.tanggal);
      $('[name="D_nama_user"] b').text(data.tiket.user_name);
      $('[name="D_nama_divisi"] b').text(data.tiket.role_name);
      $('[name="D_tgl_diperlukan"] b').text(data.tiket.tgl_diperlukan);

      // Menghapus semua baris yang sudah ada di tabel
      $("#tableDetail tbody").empty();

      function addTableRow(label, value) {
        var row = $("<tr></tr>");
        row.append("<td>" + label + "</td>");
        row.append("<td>:</td>");
        row.append("<td>" + value + "</td>");
        $("#tableDetail tbody").append(row);
      }

      // Tambahkan baris-baris sesuai dengan kondisi PHP yang ada
      if (data.tiket.tender_type == 0) {
        addTableRow("Deskripsi Tender Type", data.tiket.deskripsi_tender);
        addTableRow(
          "Perlu EDC Baru",
          data.tiket.edc_baru == 0 ? "Iya" : "Tidak"
        );
        if (data.tiket.edc_baru == 0) {
          addTableRow("", data.tiket.ket_edc_baru);
          addTableRow("GL Mapping Tender Type", data.tiket.GL_mapping_tender);
        }
        addTableRow(
          "Karakteristik Tender Type",
          data.tiket.karakteristik_tender == 0 ? "Sementara" : "Permanen"
        );
        if (data.tiket.karakteristik_tender == 0) {
          addTableRow(
            "",
            "<b>" + data.tiket.tgl_aktif + "</b> " + data.tiket.periode_aktif
          );
        }
      } else if (data.tiket.tender_type == 1) {
        addTableRow("Kode Tender Type", data.tiket.kode_tender);
        addTableRow("Deskripsi Tender Type", data.tiket.deskripsi_tender);
        addTableRow(
          "Karakteristik Tender Type",
          data.tiket.karakteristik_tender == 0 ? "Sementara" : "Permanen"
        );
        if (data.tiket.karakteristik_tender == 0) {
          addTableRow(
            "",
            "<b>" + data.tiket.tgl_aktif + "</b> " + data.tiket.periode_aktif
          );
        }
      }

      console.log("status:", data.status);
      console.log("roleid:", data.role);
      console.log("userapprove1:", data.userapprove1);
      console.log("userapprove2:", data.userapprove2);

      if (data.status == 1) {
        resetElements();
        $("#kotakapprove").removeClass("bg-light").addClass("bg-success");
        $("#nameapprove").text(data.userapprove1.user_name);
      } else if (data.status == 2) {
        resetElements();
        resetElements1();
        $("#kotakapprove").removeClass("bg-light").addClass("bg-success");
        $("#nameapprove").text(data.userapprove1.user_name);
        $("#kotakapprove1").removeClass("bg-light").addClass("bg-success");
        $("#nameapprove1").text(data.userapprove2.user_name);
      } else if (
        data.status == 3 &&
        data.userapprove1 &&
        data.userapprove2 == null
      ) {
        resetElements2();
        $("#kotakapprove").removeClass("bg-light").addClass("bg-danger");
        $("#nameapprove").text(data.userapprove1.user_name);
      } else if (data.status == 3 && data.userapprove1 && data.userapprove2) {
        resetElements();
        $("#kotakapprove").removeClass("bg-light").addClass("bg-success");
        $("#nameapprove").text(data.userapprove1.user_name);
        $("#kotakapprove1").removeClass("bg-light").addClass("bg-danger");
        $("#nameapprove1").text(data.userapprove2.user_name);
      } else if (data.status == 0) {
        resetElements3();
      }

      function resetElements() {
        //menghapus color merah dan teks di kotak pertama
        $("#kotakapprove").removeClass("bg-danger").addClass("bg-light");
        $("#nameapprove").text("");
      }
      function resetElements1() {
        //menghapus color merah dan teks di kotak kedua
        $("#kotakapprove1").removeClass("bg-danger").addClass("bg-light");
        $("#nameapprove1").text("");
      }
      function resetElements2() {
        //menghapus color merah dan hijau & teks di kotak ke dua
        $("#kotakapprove1")
          .removeClass("bg-danger bg-success")
          .addClass("bg-light");
        $("#nameapprove1").text("");
      }
      function resetElements3() {
        //menghapus color merah dan hijau & teks di kotak pertama dan kedua
        $("#kotakapprove")
          .removeClass("bg-danger bg-success")
          .addClass("bg-light");
        $("#nameapprove").text("");
        $("#kotakapprove1")
          .removeClass("bg-danger bg-success")
          .addClass("bg-light");
        $("#nameapprove1").text("");
      }

      // if (data.role == 1) {
      //   $("#btnTolak").show();
      //   $("#btnApprove").show();
      // } else if (data.role == 22) {
      //   $("#btnTolak").show();
      //   $("#btnApprove").show();
      // } else {
      //   $("#btnTolak").hide();
      //   $("#btnApprove").hide();
      // }

      // if (data.status == 2) {
      //   $("#btnTolak").hide();
      //   $("#btnApprove").hide();
      //   $(".modal-footer").html("<p>Ticket has been Solved</p>");
      // } else if (data.status == 3) {
      //   $("#btnTolak").hide();
      //   $("#btnApprove").hide();
      //   $(".modal-footer").html("");
      // } else if (data.role == 1 || data.role == 22) {
      //   $("#btnTolak").show();
      //   $("#btnApprove").show();
      // }

      var status = data.status;
      var role = data.role;

      if (status == 0 && role == 22) {
        //jika status nya waiting button akan muncul jika finance dept
        $("#btnTolak").show();
        $("#btnApprove").show();
      } else if (status == 1 && role == 1) {
        //jika status nya approve finance akan muncul jika itsupport
        $("#btnTolak").show();
        $("#btnApprove").show();
      } else if (data.status == 2) {
        //jika status nya solved semua button di semua role di hide
        $("#btnTolak").hide();
        $("#btnApprove").hide();
        $(".modal-footer").html("<p>Ticket has been Solved</p>");
      } else if (data.status == 3) {
        //jika status nya di tolak maka semua button di semua role akan di hide
        $("#btnTolak").hide();
        $("#btnApprove").hide();
        $(".modal-footer").html("");
      } else {
        $("#btnTolak").hide();
        $("#btnApprove").hide();
      }
      // Tampilkan modal
      $("#detailModal").modal("show");
    },
    error: function (error) {
      console.error("Error fetching modal content:", error);
    },
  });
}

function generatePdfForModal(tiketID) {
  // Capture the HTML content of the modal
  var modalContent = $("#detailModal").html();

  // Send the HTML content to the server to generate the PDF
  $.ajax({
    url: "pdfcontroller/generate/" + tiketID,
    type: "POST",
    data: { htmlContent: modalContent },
    success: function () {
      // Handle success, e.g., show a success message
      console.log("PDF generated successfully");
    },
    error: function (error) {
      // Handle error, e.g., show an error message
      console.error("Error generating PDF:", error);
    },
  });
}

// Example: Call the generatePdfForModal function when a button is clicked
$("#generatePdfButton").on("click", function () {
  generatePdfForModal();
});
