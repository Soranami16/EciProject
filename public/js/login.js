$(document).ready(function () {
  $("#login-submit").click(function () {
    var username = $("#login-username").val();
    var password = $("#login-password").val();
    var json = {
      username: username,
      password: password,
    };

    $.post("/token", json, function (response) {
      if (response.access_token) {
        // Simpan token di localStorage
        localStorage.setItem("token", response.access_token);

        // Arahkan pengguna ke halaman home
        window.location.href = "/home";
      } else {
        alert("Gagal mendapatkan token");
      }
    });
  });
});
