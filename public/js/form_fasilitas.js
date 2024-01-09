console.log("form fasilitas");

// var fasilitas = {
//   validation: function (next) {
//     var inputKomputer = document.getElementsByClassName("inputKomputer");
//     var inputEmail = document.getElementsByClassName("radioEmail");
//     var inputUsb = document.getElementsByClassName("radioUsb");
//     var inputInternet = document.getElementsByClassName("radioInternet");
//     var inputWifi = document.getElementsByClassName("radioWifi");
//     var inputVpn = document.getElementsByClassName("radioVpn");
//     var inputAkses = document.getElementsByClassName("radioAkses");
//     var flagKomputer = 0;
//     var flagEmail = 0;
//     var flagUsb = 0;
//     var flagInternet = 0;
//     var flagWifi = 0;
//     var flagVpn = 0;
//     var flagAkses = 0;

//     // ini ikutin jg?
//     // var strhtml = 0;
//     console.log(inputEmail);
//     // next();
//     for (let index = 0; index < inputKomputer.length; index++) {
//       // const element = array[index];
//       if (inputKomputer[index].checked) {
//         flagKomputer = 1;
//       }
//     }

//     for (let index = 0; index < inputEmail.length; index++) {
//       // const element = array[index];
//       if (inputEmail[index].checked) {
//         flagEmail = 1;
//       }
//     }
//     for (let index = 0; index < inputUsb.length; index++) {
//       // const element = array[index];
//       if (inputUsb[index].checked) {
//         flagUsb = 1;
//       }
//     }
//     for (let index = 0; index < inputInternet.length; index++) {
//       // const element = array[index];
//       if (inputInternet[index].checked) {
//         flagInternet = 1;
//       }
//     }
//     for (let index = 0; index < inputWifi.length; index++) {
//       // const element = array[index];
//       if (inputWifi[index].checked) {
//         flagWifi = 1;
//       }
//     }
//     for (let index = 0; index < inputVpn.length; index++) {
//       // const element = array[index];
//       if (inputVpn[index].checked) {
//         flagVpn = 1;
//       }
//     }
//     for (let index = 0; index < inputAkses.length; index++) {
//       // const element = array[index];
//       if (inputAkses[index].checked) {
//         flagAkses = 1;
//       }
//     }

//     for (let index = 0; index < inputUsb.length; index++) {
//       // const element = array[index];
//       if (inputUsb[index].checked) {
//         flagUsb = 1;
//       }
//     }
//     if (flagKomputer == 0) {
//       alert("Jangan kosong");
//       // $(".inputKomputer").addClass("is-invalid");
//     } else if (flagEmail == 0) {
//       alert("imel");
//     } else if (flagUsb == 0) {
//       alert("usb");
//     } else if (flagInternet == 0) {
//       alert("internet");
//     } else if (flagWifi == 0) {
//       alert("wifi");
//     } else if (flagVpn == 0) {
//       alert("vpn");
//     } else if (flagAkses == 0) {
//       alert("akses");
//     } else {
//       // berarti enih tinggal nambahin ya pak?
//       next();
//     }
//   },
// };

$(document).ready(function () {
  // $("#submitFormFasilitas").on("click", function (event) {
  $("#formFasilitas").submit(function (e) {
    e.preventDefault(); // To prevent the default form submission //biar kagak kek tiba2 ke reload gitu *klo dilihat*
    alert("Button clicked!");
    // $tanggal = $("#tgl_pengajuan").val(); //gambaran klo gapake formData
    // $nik = $("#nik_user").val();
    // fasilitas.validation(function () {
    var formData = $(this).serialize();
    console.log(formData);
    $.ajax({
      url: "/createFasilitas",
      type: "POST",
      data: formData, //enih mempermudah biar gannulis2 kek dibawah yang data entuh
      dataType: "json",
      // data: {
      //   tanggal: $tanggal,
      //   store: $store,
      //   nik: $nik,
      //   dept: $dept,
      //   nama: $nama,
      //   jabatan: $jabatan,
      //   keterangan1: $keterangan1,
      //   keterangan2: $keterangan2,
      //   aplikasi: $aplikasi,
      //   keterangan3: $keterangan3,
      //   newUser: $newUser,
      //   mutasiUser: $mutasiUser,
      // },
      success: function (response) {
        if (response.success) {
          alert(response.message);
          window.location.href = "listtiket";
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
    // });

    // Additional logic or actions can be added here
  });

  $("#formTiketFasilitasEdit").submit(function (event) {
    event.preventDefault();
    var idTiket = $("#id_tiket").val();
    if (!idTiket) {
      alert("Error: ID Tiket is empty");
      return;
    }
    var dataForm = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "/updateFasilitas/" + idTiket,
      data: dataForm,
      dataType: "json",
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
  $("#newUser").change(function () {
    if (this.checked) {
      $("#mutasiUser").prop("checked", false);
    }
  });
  $("#mutasiUser").change(function () {
    if (this.checked) {
      $("#newUser").prop("checked", false);
    }
  });
  $(
    "input[type=radio][value='Desktop'], input[type=radio][value='Laptop']"
  ).prop("disabled", true);
  $("#komputer_ya").change(function () {
    if (this.checked) {
      $("#komputer_tidak").prop("checked", false);
      $(
        "input[type=radio][value='Desktop'], input[type=radio][value='Laptop']"
      ).prop("disabled", false);
    } else {
      $("input[type=radio][value='Desktop'], input[type=radio][value='Laptop']")
        .prop("checked", false)
        .prop("disabled", true);
    }
  });
  $("#komputer_tidak").change(function () {
    if (this.checked) {
      $(
        "input[type=radio][value='Desktop'], input[type=radio][value='Laptop']"
      ).prop("disabled", true);
      $("#komputer_ya").prop("checked", false);
    } else {
      $("input[type=radio][value='Desktop'], input[type=radio][value='Laptop']")
        .prop("checked", false)
        .prop("disabled", true);
    }
  });
});
function deletetiketFasilitas(tiketID) {
  var confirmation = confirm(
    "Apakah Anda yakin ingin menghapus tiket dengan ID " + tiketID + "?"
  );
  if (confirmation) {
    console.log("Menghapus tiket dengan ID " + tiketID);
    $.ajax({
      type: "POST",
      url: "listtiket/deleteFasilitas/" + tiketID,
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
