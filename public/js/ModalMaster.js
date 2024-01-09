//Master user
function deletemasteruser(UserID) {
  Swal.fire({
    title: "Apakah Anda yakin ingin menghapus User?",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, Hapus!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "/masteruser/delete/" + UserID,
        data: { UserID: UserID },
        success: function (response) {
          Swal.fire("User berhasil dihapus", "", "success").then(() => {
            // $("#MasterUserModal").modal("hide");
            $("#masteruserTablebody").DataTable().ajax.reload();
            // location.reload();
          });
        },
        error: function (error) {
          Swal.fire("Gagal menghapus user", error.responseText, "error");
        },
      });
    }
  });
}

function addData() {
  //   $("#formMasterUser")[0].reset();
  $.ajax({
    url: "/masteruser/createform",
    type: "GET",
    dataType: "JSON",
    success: function (data) {
      // Mengisi select option dengan data dari server
      var selectOptions = "Select Role";
      $.each(data.role, function (key, value) {
        selectOptions +=
          '<option value="' + value.OID + '">' + value.Name + "</option>";
      });
      $("#role").html(selectOptions);

      // Menampilkan modal
      $("#MasterUserModal").modal("show");
    },
    error: function (error) {
      console.error("Error fetching modal content:", error);
      console.log(error);
    },
  });
}

$(document).ready(function () {
  $("#formMasterUser").submit(function (e) {
    e.preventDefault();

    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "/masteruser/create",
      data: formData,
      dataType: "json",
      success: function (response) {
        if (response.success) {
          alert(response.message);
          $("#MasterUserModal").modal("hide");
          $("#masteruserTablebody").DataTable().ajax.reload();
          // window.location.href = "/masteruser";
        } else {
          $(".error").show();
          $(".error").html(response.error);
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

function editmasteruser(UserID) {
  $("#formMasterUserEdit")[0].reset();
  $.ajax({
    url: "/masteruser/edit/" + UserID,
    type: "GET",
    dataType: "JSON",
    success: function (data) {
      $("#masterUserEditModal").modal("show");

      console.log("oid user : ", data.user["OID"]);

      $('[name="oid"]').val(data.user["OID"]);
      $('[name="codes"]').val(data.user["Code"]);
      $('[name="emails"]').val(data.user["Email"]);
      $('[name="names"]').val(data.user["Name"]);

      var selectOptions = "";
      $.each(data.roles, function (key, value) {
        selectOptions += '<option value="' + value.OID + '"';
        if (value.OID == data.user.RoleOID) {
          selectOptions += " selected";
        }
        selectOptions += ">" + value.Name + "</option>";
      });
      $("#roles").html(selectOptions);
    },
    error: function (error) {
      console.error("Error fetching modal content:", error);
    },
  });
}

$(document).ready(function () {
  $("#formMasterUserEdit").submit(function (event) {
    event.preventDefault();
    var idTiket = $("#oid").val();
    if (!idTiket) {
      alert("Error: ID Tiket is empty");
      return;
    }
    var dataForm = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "/masteruser/update/" + idTiket,
      data: dataForm,
      success: function (response) {
        if (response.success) {
          alert(response.message);
          $("#MasterUserEditModal").modal("hide");
          $("#masteruserTablebody").DataTable().ajax.reload();
          // window.location.href = "/masteruser";
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

//Master Store
function deletemasterstore(StoreID) {
  Swal.fire({
    title: "Apakah Anda yakin ingin menghapus?",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, Hapus!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "/masterstore/delete/" + StoreID,
        data: { StoreID: StoreID },
        success: function (response) {
          Swal.fire("Store berhasil dihapus", "", "success").then(() => {
            // location.reload();
            // $("#MasterUserModal").modal("hide");
            $("#masterstoreTablebody").DataTable().ajax.reload();
          });
        },
        error: function (error) {
          Swal.fire("Gagal menghapus", error.responseText, "error");
        },
      });
    }
  });
}
function addDataMasterStore() {
  //   $("#formMasterUser")[0].reset();
  $.ajax({
    url: "/masterstore/createform",
    type: "GET",
    dataType: "JSON",
    success: function (data) {
      var selectOptions = '<option value="">Select Company</option>';
      $.each(data.company, function (key, value) {
        selectOptions +=
          '<option value="' + value.OID + '">' + value.Name + "</option>";
      });
      $("#company").html(selectOptions);

      var selectOptions = '<option value="">Select Store Region</option>';
      $.each(data.storeregion, function (key, value) {
        selectOptions +=
          '<option value="' + value.OID + '">' + value.Name + "</option>";
      });
      $("#storeregion").html(selectOptions);

      var selectOptions = '<option value="">Select Tender Region</option>';
      $.each(data.tenderregion, function (key, value) {
        selectOptions +=
          '<option value="' + value.OID + '">' + value.Name + "</option>";
      });
      $("#tenderregion").html(selectOptions);

      var selectOptions = '<option value="">Select Store DC</option>';
      $.each(data.storedc, function (key, value) {
        selectOptions +=
          '<option value="' + value.OID + '">' + value.Name + "</option>";
      });
      $("#storedc").html(selectOptions);

      var selectOptions = '<option value="">Select Store Regional</option>';
      $.each(data.storeregional, function (key, value) {
        selectOptions +=
          '<option value="' + value.OID + '">' + value.Name + "</option>";
      });
      $("#storeregional").html(selectOptions);

      var selectOptions = '<option value="">Select Store Tiering</option>';
      $.each(data.storetiering, function (key, value) {
        selectOptions +=
          '<option value="' + value.OID + '">' + value.Name + "</option>";
      });
      $("#storetiering").html(selectOptions);

      // Menampilkan modal
      $("#MasterStoreModal").modal("show");
    },
    error: function (error) {
      console.error("Error fetching modal content:", error);
      console.log(error);
    },
  });
}

$(document).ready(function () {
  $("#formMasterStore").submit(function (e) {
    e.preventDefault();

    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "/masterstore/create",
      data: formData,
      dataType: "json",
      success: function (response) {
        if (response.success) {
          alert(response.message);
          $("#MasterStoreModal").modal("hide");
          $("#masterstoreTablebody").DataTable().ajax.reload();
        } else {
          $(".error").show();
          $(".error").html(response.error);
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

function editmasterstore(StoreID) {
  $("#formMasterStoreEdit")[0].reset();
  $.ajax({
    url: "/masterstore/edit/" + StoreID,
    type: "GET",
    dataType: "JSON",
    success: function (data) {
      console.log("ID:", StoreID);

      $('[name="oid"]').val(data.store["OID"]);
      $('[name="code"]').val(data.store["Code"]);
      $('[name="name"]').val(data.store["Name"]);
      $('[name="returnday"]').val(data.store["ReturnDay"]);
      $('[name="optimisticlockfield"]').val(data.store["OptimisticLockField"]);
      $('[name="storetype"]').val(data.store["StoreType"]);
      $('[name="expired"]').val(data.store["Expired"]);
      $('[name="tinvoice"]').val(data.store["TInvoice"]);
      $('[name="gcrecord"]').val(data.store["GCRecord"]);
      $('[name="bussinessdate"]').val(data.store["BusinessDate"]);
      $('[name="isactived"]').val(data.store["IsActive"]);
      $('[name="einvoice"]').val(data.store["EInvoice"]);

      var selectOptions = "<option value=''> Select Store </option>";
      $.each(data.company, function (key, value) {
        selectOptions += '<option value="' + value.OID + '"';
        if (value.OID == data.store.CompanyOID) {
          selectOptions += " selected";
        }
        selectOptions += ">" + value.Name + "</option>";
      });
      $("#company").html(selectOptions);

      console.log("company : ", data.company);

      var selectOptions = '<option value="">Select Store Region</option>';
      $.each(data.storeregion, function (key, value) {
        selectOptions +=
          '<option value="' + value.OID + '">' + value.Name + "</option>";
      });
      $("#storeregion").html(selectOptions);

      var selectOptions = '<option value="">Select Tender Region</option>';
      $.each(data.tenderregion, function (key, value) {
        selectOptions +=
          '<option value="' + value.OID + '">' + value.Name + "</option>";
      });
      $("#tenderregion").html(selectOptions);

      var selectOptions = '<option value="">Select Store DC</option>';
      $.each(data.storedc, function (key, value) {
        selectOptions +=
          '<option value="' + value.OID + '">' + value.Name + "</option>";
      });
      $("#storedc").html(selectOptions);

      var selectOptions = '<option value="">Select Store Regional</option>';
      $.each(data.storeregional, function (key, value) {
        selectOptions +=
          '<option value="' + value.OID + '">' + value.Name + "</option>";
      });
      $("#storeregional").html(selectOptions);

      var selectOptions = '<option value="">Select Store Tiering</option>';
      $.each(data.storetiering, function (key, value) {
        selectOptions +=
          '<option value="' + value.OID + '">' + value.Name + "</option>";
      });
      $("#storetiering").html(selectOptions);

      $("#masterStoreEditModal").modal("show");
    },
    error: function (error) {
      console.error("Error fetching modal content:", error);
    },
  });
}

$(document).ready(function () {
  $("#formMasterStoreEdit").submit(function (event) {
    event.preventDefault();
    var idTiket = $("#oid").val();
    if (!idTiket) {
      alert("Error: ID Tiket is empty");
      return;
    }
    var dataForm = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "/masterstore/update/" + idTiket,
      data: dataForm,
      success: function (response) {
        if (response.success) {
          alert(response.message);
          $("#masterStoreEditModal").modal("hide");
          $("#masterstoreTablebody").DataTable().ajax.reload();
        } else {
          alert("Error: " + response.message);
        }
      },
      error: function (error) {
        alert("Terjadi kesalahan saat mengedit data.");
      },
    });
  });
});

//Master Store Location
function deletemasterstorelocation(StoreLocationID) {
  Swal.fire({
    title: "Apakah Anda yakin ingin menghapus?",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, Hapus!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "/masterstorelocation/delete/" + StoreLocationID,
        data: { StoreLocationID: StoreLocationID },
        success: function (response) {
          Swal.fire("Store Location berhasil dihapus", "", "success").then(
            () => {
              // location.reload();
              $("#masterstorelocationTablebody").DataTable().ajax.reload();
            }
          );
        },
        error: function (error) {
          Swal.fire("Gagal menghapus", error.responseText, "error");
        },
      });
    }
  });
}
function addDataStoreLocation() {
  //   $("#formMasterUser")[0].reset();
  $.ajax({
    url: "/masterstorelocation/createform",
    type: "GET",
    dataType: "JSON",
    success: function (data) {
      var selectOptions = "<option value=''> Select Store </option>";
      $.each(data.store, function (key, value) {
        selectOptions +=
          '<option value="' + value.OID + '">' + value.Name + "</option>";
      });
      $("#storeoid").html(selectOptions);

      // Menampilkan modal
      $("#MasterStoreLocationModal").modal("show");
    },
    error: function (error) {
      console.error("Error fetching modal content:", error);
      console.log(error);
    },
  });
}

$(document).ready(function () {
  $("#formMasterStorelocation").submit(function (e) {
    e.preventDefault();

    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "/masterstorelocation/create",
      data: formData,
      dataType: "json",
      success: function (response) {
        if (response.success) {
          alert(response.message);
          $("#MasterStoreLocationModal").modal("hide");
          $("#masterstorelocationTablebody").DataTable().ajax.reload();
        } else {
          $(".error").show();
          $(".error").html(response.error);
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

function editmasterstorelocation(StoreLocationID) {
  $("#formMasterStoreLocationEdit")[0].reset();
  $.ajax({
    url: "/masterstorelocation/edit/" + StoreLocationID,
    type: "GET",
    dataType: "JSON",
    success: function (data) {
      console.log(data);
      console.log("ID:", StoreLocationID);

      $("#masterStoreLocationEditModal").modal("show");
      $('[name="oid"]').val(data.storelocation["OID"]);
      var selectOptions = "<option value=''> Select Store </option>";
      $.each(data.store, function (key, value) {
        selectOptions += '<option value="' + value.OID + '"';
        if (value.OID == data.storelocation.StoreOID) {
          selectOptions += " selected";
        }
        selectOptions += ">" + value.Name + "</option>";
      });
      $("#storeOID").html(selectOptions);
      $('[name="code"]').val(data.storelocation["Code"]);
      $('[name="name"]').val(data.storelocation["Name"]);
    },
    error: function (error) {
      console.error("Error fetching modal content:", error);
    },
  });
}

$(document).ready(function () {
  $("#formMasterStoreLocationEdit").submit(function (event) {
    event.preventDefault();
    var idTiket = $("#oid").val();
    if (!idTiket) {
      alert("Error: ID Tiket is empty");
      return;
    }
    var dataForm = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "/masterstorelocation/update/" + idTiket,
      data: dataForm,
      success: function (response) {
        if (response.success) {
          alert(response.message);
          $("#masterStoreLocationEditModal").modal("hide");
          $("#masterstorelocationTablebody").DataTable().ajax.reload();
        } else {
          alert("Error: " + response.message);
        }
      },
      error: function (error) {
        alert("Terjadi kesalahan saat mengedit data.");
      },
    });
  });
});
