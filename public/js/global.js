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

      $("#tenderTypeBaruFields :input").prop("required", true);
      $("#tenderTypeLamaFields :input").prop("required", false);

      $("#TenderBaru").prop("required", true);
      $("#TenderLama").prop("required", false);
    } else {
      $("#TenderBaru").prop("required", false);

      $("#tenderTypeBaruFields").hide();
      $("#tenderTypeBaruFields :input").prop("required", false);
    }
  });

  $("#TenderLama").change(function () {
    if (this.checked) {
      $("#TenderLama").prop("required", true);
      $("#TenderBaru").prop("required", false);

      $("#tenderTypeLamaFields").show();
      $("#tenderTypeBaruFields").hide();
      $("#TenderBaru").prop("checked", false);

      $("#tenderTypeLamaFields :input").prop("required", true);
      $("#tenderTypeBaruFields :input").prop("required", false);
    } else {
      $("#TenderLama").prop("required", false);

      $("#tenderTypeLamaFields").hide();

      $("#tenderTypeLamaFields :input").prop("required", false);
    }
  });

  $("#Ya").change(function () {
    if (this.checked) {
      $("Ya").prop("required", true);
      $("#EDCbaru").show();
      $("#EDCbaru :input").prop("required", true);
      $("#Tidak").prop("checked", false);
    } else {
      $("Ya").prop("required", false);
      $("#EDCbaru").hide();
      $("#EDCbaru :input").prop("required", false);
    }
  });

  $("#Tidak").change(function () {
    if (this.checked) {
      $("Ya").prop("required", false);
      $("#Ya").prop("checked", false);
      $("#EDCbaru").hide();
      $("#EDCbaru :input").prop("required", false);
    }
  });

  $("#SementaraLama").change(function () {
    if (this.checked) {
      $("#SementaraLama").prop("required", true);
      $("#SementaraFieldLama").show();
      $("#SementaraFieldLama :input").prop("required", true);
      $("#PermanenLama").prop("checked", false);
    } else {
      $("#SementaraLama").prop("required", false);
      $("#SementaraFieldLama").hide();
      $("#SementaraFieldLama :input").prop("required", false);
    }
  });

  $("#PermanenLama").change(function () {
    if (this.checked) {
      $("#PermanenLama").prop("required", true);
      $("#SementaraFieldLama").hide();
      $("#SementaraFieldLama :input").prop("required", false);
      $("#SementaraLama").prop("checked", false);
    }
  });

  $("#SementaraBaru").change(function () {
    if (this.checked) {
      $("#SementaraBaru").prop("required", true);
      $("#SementaraFieldBaru").show();
      $("#SementaraFieldBaru :input").prop("required", true);
      $("#PermanenBaru").prop("checked", false);
    } else {
      $("#SementaraBaru").prop("required", false);
      $("#SementaraFieldBaru :input").hide();
      $("#SementaraFieldBaru").prop("required", false);
    }
  });

  $("#PermanenBaru").change(function () {
    if (this.checked) {
      $("#PermanenBaru").prop("required", true);
      $("#SementaraFieldBaru").hide();
      $("#SementaraFieldBaru :input").prop("required", false);
      $("#SementaraBaru").prop("checked", false);
    }
  });
});

$(document).ready(function () {
  $("#logout").click(function () {
    window.location.href = base_url + "/logout";
  });
});
