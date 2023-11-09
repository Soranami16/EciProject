$(document).ready(function () {
  $("#submitPengajuanTender").click(function (e) {
    e.preventDefault(); // prevent the default form submission
    $.ajax({
      type: "POST",
      url: "/createTiket", // replace with your actual submit URL
      data: $("#formTiketTender").serialize(), // replace with your actual form ID
      success: function (response) {
        alert("Berhasil Insert Data");
        location.href = base_url + "/listtiket";
        console.log(response);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        // handle any errors here
        console.log(textStatus, errorThrown);
      },
    });
  });
});
