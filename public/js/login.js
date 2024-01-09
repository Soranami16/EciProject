// $(document).ready(function () {
//   $("#login-submit").click(function () {
//     var username = $("#login-username").val();
//     var password = $("#login-password").val();
//     var json = {
//       username: username,
//       password: password,
//     };

//     $.post("/token", json, function (response) {
//       if (response.access_token) {
//         localStorage.setItem("token", response.access_token);
//         window.location.href = "/home";

//       } else {
//         alert("Gagal mendapatkan token");
//       }
//     });
//   });
// });

// JavaScript
$(document).ready(function () {
  $("#login-submit").click(function () {
    $("#pesantunggu")
      .text("Verifikasi username & password")
      .css("color", "grey")
      .css("font-size", "12px");
    var username = $("#login-username").val();
    var password = $("#login-password").val();
    var json = {
      username: username,
      password: password,
    };

    $.post("/token", json, function (response) {
      if (response.access_token) {
        $("#pesantunggu").hide();
        $("#pesanvalidasi")
          .text("Username & password benar!")
          .css("color", "green")
          .css("font-size", "12px");
        localStorage.setItem("token", response.access_token);
        window.location.href = "/home";
      } else {
        $("#pesantunggu").hide();
        $("#pesanvalidasi")
          .text("Username atau password salah!")
          .css("color", "red")
          .css("font-size", "12px");

        $("#login-username").val("");
        $("#login-password").val("");
      }
    }).fail(function () {
      $("#pesanvalidasi").text("Terjadi kesalahan saat mengirim permintaan.");
    });
  });
});
