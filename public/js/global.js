console.log("global js");
var base_url = window.location.origin;
console.log(base_url);

var ajax = {
  ajaxGet: function (url, data, next) {
    console.log(base_url + url);
    $.ajax({
      // method : "GET",
      type: "GET",
      url: base_url + url,
      data: data,
      dataType: "json",
      success: function (result) {
        next(result);
      },
      error: function (err) {
        var msg = "Error, Please contact the Administrator";
        var data = {
          err: err,
          msgErr: msg,
        };
        next(data);
      },
    });
  },
  ajaxPost: function (url, data, next) {
    console.log(base_url + url);
    $.ajax({
      // method : "POST",
      type: "POST",
      url: base_url + url,
      data: data,
      dataType: "json",
      success: function (result) {
        next(result);
      },
      error: function (err) {
        var msg = "Error, Please contact the Administrator";
        var data = {
          err: err,
          msgErr: msg,
        };
        next(data);
      },
    });
  },
};

$(document).ready(function () {
  $("#TenderBaru").change(function () {
    if (this.checked) {
      $("#tenderTypeBaruFields").show();
      $("#tenderTypeLamaFields").hide();
      $("#TenderLama").prop("checked", false);
    } else {
      $("#tenderTypeBaruFields").hide();
    }
  });

  $("#TenderLama").change(function () {
    if (this.checked) {
      $("#tenderTypeLamaFields").show();
      $("#tenderTypeBaruFields").hide();
      $("#TenderBaru").prop("checked", false);
    } else {
      $("#tenderTypeLamaFields").hide();
    }
  });

  $("#Ya").change(function () {
    if (this.checked) {
      $("#EDCbaru").show();
      $("#Tidak").prop("checked", false);
    } else {
      $("#EDCbaru").hide();
    }
  });
  $("#Tidak").change(function () {
    if (this.checked) {
      $("#Ya").prop("checked", false);
      $("#EDCbaru").hide();
    }
  });

  $("#SementaraTypeBaru").change(function () {
    if (this.checked) {
      $("#SementaraTypeBaruField").show();
      $("#PermanenTypeBaru").prop("checked", false);
    } else {
      $("#SementaraTypeBaruField").hide();
    }
  });

  $("#PermanenTypeBaru").change(function () {
    if (this.checked) {
      $("#SementaraTypeBaru").prop("checked", false);
      $("#SementaraTypeBaruField").hide();
    }
  });

  $("#SementaraTypeLama").change(function () {
    if (this.checked) {
      $("#SementaraTypeLamaField").show();
      $("#PermanenTypeLama").prop("checked", false);
    } else {
      $("#SementaraTypeLamaField").hide();
    }
  });

  $("#PermanenTypeLama").change(function () {
    if (this.checked) {
      $("#SementaraTypeLama").prop("checked", false);
      $("#SementaraTypeLamaField").hide();
    }
  });
});

$(document).ready(function () {
  $("#logout").click(function () {
    window.location.href = base_url + "/logout";
  });
});
