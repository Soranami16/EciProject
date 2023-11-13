$(document).ready(function () {
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
          alert("Error: " + response.message);
        }
      },
      error: function (xhr, status, error) {
        var errorMessage = xhr.responseText || "Oops! Something went wrong.";
        console.log(errorMessage);
        alert("Error: " + errorMessage);
      },
    });
  });
});
