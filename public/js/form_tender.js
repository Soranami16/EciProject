$(document).ready(function () {
  // Use the PHP value directly in JavaScript
  var loginDate = "<?= json_encode($loginDate) ?>";

  if (loginDate) {
    $("#tgl_pengajuan").val(loginDate);
  } else {
    $("#tgl_pengajuan").datetimepicker({
      format: "L",
    });
  }

  $("#formTiketTender").submit(function (e) {
    e.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
      type: "POST",
      url: "/createTiket",
      data: formData,
      dataType: "json",
      success: function (response) {
        if (response.success) {
          alert(response.message);
        } else {
          alert(response.message);
        }
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
});
