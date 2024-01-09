function detailFasilitas(tiketID) {
  $.ajax({
    url: "listtiket/detailtiketfasilitas/" + tiketID,
    type: "GET",
    dataType: "JSON",
    success: function (data) {
      console.log(data.tiket.store);
      $("#detailModalFasilitas").modal("show");
      // Mengisi data ke modal
      $("#id_tiket").val(data.tiket.id_tiket);
      $('[name="D_tgl_pengajuan"] b').text(data.tiket.tanggal);
      $('[name="D_nik_user"] b').text(data.tiket.nik);
      $('[name="D_nama_user"] b').text(data.tiket.nama);
      $('[name="D_store"] b').text(data.tiket.store);
      $('[name="D_jabatan"] b').text(data.tiket.jabatan);
      $('[name="D_dept"] b').text(data.tiket.dept);
      $('[name="D_email"] b').text(data.tiket.email);
      $('[name="D_usb"] b').text(data.tiket.aksesUsb);
      $('[name="D_internet"] b').text(data.tiket.aksesInternet);
      $('[name="D_wifi"] b').text(data.tiket.wifi);
      $('[name="D_vpn"] b').text(data.tiket.vpn);
      $('[name="D_akses"] b').text(data.tiket.akses);
      $('[name="D_aplikasi"] b').text(data.tiket.aplikasi);
      $('[name="D_akses"] b').text(data.tiket.akses);
      $('[name="D_userType"] b').text(data.tiket.type_user);

      function updateTextByKey(data, key, selector, trueText, falseText) {
        var value = data[key]; // Access data using the provided key

        var newText = value === 1 ? trueText : falseText;
        $(selector).text(newText);
      }

      // Usage for different data elements
      updateTextByKey(data.tiket, "email", '[name="D_email"] b', "Ya", "Tidak");
      updateTextByKey(
        data.tiket,
        "aksesUsb",
        '[name="D_usb"] b',
        "Ya",
        "Tidak"
      );
      updateTextByKey(
        data.tiket,
        "aksesInternet",
        '[name="D_internet"] b',
        "Ya",
        "Tidak"
      );
      updateTextByKey(data.tiket, "wifi", '[name="D_wifi"] b', "Ya", "Tidak");
      updateTextByKey(data.tiket, "vpn", '[name="D_vpn"] b', "Ya", "Tidak");

      // Use this function for other data keys and selectors as needed

      // $('[name="D_radio_komputer"]').attr("readonly", true);
      if (data.tiket.komputer == 1) {
        $('[name="D_komputer"] b').text("Ya");
        if (data.tiket.komputer == "Desktop") {
          $('[name="D_type"] b').text("Desktop");
        } else {
          $('[name="D_type"] b').text("Laptop");
        }
        if (data.tiket.device_type == "Desktop") {
          $("input[name='D_radio_type']").prop("checked", true);
        } else if (data.tiket.device_type == "Laptop") {
          // $("input[value='Laptop']").prop("checked", true);
          $('input[name="D_radio_type"][value="Laptop"]').prop("checked", true);
        }

        $("#D_komputer_tidak").prop("checked", false);
      } else if (data.tiket.komputer == 0) {
        $('[name="D_komputer"] b').text("Tidak");
        // $("input[name='D_radio_type']").prop("checked", true);
      }
      $("#D_keterangan1").val(data.tiket.keterangan1);
      $("#D_keterangan2").val(data.tiket.keterangan2);
      $("#D_keterangan3").val(data.tiket.keterangan3);

      // alert("gwehk dipijit");
      // $("#id_tiket").val(data.tiket.id_tiket);
      // Tampilkan modal
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
