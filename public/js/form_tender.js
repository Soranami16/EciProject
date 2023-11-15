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

    // Extract the ticket ID from the form or any other way you have it
    var ticketId = $(this).find('input[name="ticket_id"]').val();

    var formData = $(this).serialize();

    $.ajax({
      type: "POST",
      url: "listtiket/updatetiket/" + ticketId,
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
