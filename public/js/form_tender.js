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

$(document).ready(function () {
  $("#formTiketTenderEdit").submit(function (e) {
    e.preventDefault();

    var formData = $(this).serializeArray();
    var url = "updateTender/" + $("#id_tiket").val();

    $.ajax({
      type: "POST",
      url: url,
      data: JSON.stringify(formData),
      dataType: "json",
      success: function (response) {
        if (response.success) {
          alert(response.message);
          window.location.href = "/listtiket";
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
