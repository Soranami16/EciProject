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

  $("#SementaraBaru").change(function () {
    if (this.checked) {
      $("#SementaraFieldBaru").show();
      $("#PermanenBaru").prop("checked", false);
    } else {
      $("#SementaraFieldBaru").hide();
    }
  });

  $("#PermanenBaru").change(function () {
    if (this.checked) {
      $("#SementaraFieldBaru").hide();
      $("#SementaraBaru").prop("checked", false);
    } else {
      $("#SementaraFieldBaru").hide();
    }
  });

  $("#SementaraLama").change(function () {
    if (this.checked) {
      $("#SementaraFieldLama").show();
      $("#PermanenLama").prop("checked", false);
    } else {
      $("#SementaraFieldLama").hide();
    }
  });
  $("#PermanenLama").change(function () {
    if (this.checked) {
      $("#SementaraFieldLama").hide();
      $("#SementaraBaru").prop("checked", false);
    } else {
      $("#SementaraFieldLama").hide();
    }
  });
});

$(document).ready(function () {
  $("#logout").click(function () {
    window.location.href = base_url + "/logout";
  });
});
