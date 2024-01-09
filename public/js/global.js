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
  $("#logout").click(function () {
    window.location.href = base_url + "/logout";
  });
});
