$(document).ready(function () {
  $("#historyTableBody").DataTable({
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    responsive: true,
    // processing: true,
    // serverSide: true,
    ajax: {
      url: "/notifikasi/histori",
      type: "GET",
    },
    columns: [
      {
        data: "no",
      },
      {
        data: "nama",
      },
      {
        data: "divisi",
      },
      {
        data: "status",
      },
      {
        data: "tanggal",
      },
    ],
  });
});

$(document).ready(function () {
  var table = $("#listTableBody").DataTable({
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    responsive: true,
    ajax: {
      url: "/listtiket/list",
      type: "GET",
    },
    columns: [
      {
        data: "no",
      },
      {
        data: "tgl_pengajuan",
      },
      {
        data: "nama",
      },
      {
        data: "divisi",
      },
      {
        data: "tgl_diperlukan",
      },
      {
        data: "status",
      },
      {
        data: "action",
      },
    ],
  });
});

$(document).ready(function () {
  var table = $("#masteruserTablebody").DataTable({
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    responsive: true,
    ajax: {
      url: "/masteruser/master",
      type: "GET",
    },
    columns: [
      {
        data: "no",
      },
      {
        data: "code",
      },
      {
        data: "name",
      },
      {
        data: "roleoid",
      },
      {
        data: "action",
      },
    ],
  });

  // function reloadTable() {
  //   table.ajax.reload();
  // }
  // setInterval(reloadTable, 5000);
});

$(document).ready(function () {
  var table = $("#masterstoreTablebody").DataTable({
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    responsive: true,
    ajax: {
      url: "/masterstore/master",
      type: "GET",
    },
    columns: [
      {
        data: "no",
      },
      {
        data: "CompanyOID",
      },
      {
        data: "Code",
      },
      {
        data: "Name",
      },
      {
        data: "StoreRegionOID",
      },
      {
        data: "TenderRegionOID",
      },
      {
        data: "StoreDCOID",
      },
      {
        data: "ReturnDay",
      },
      {
        data: "OptimisticLockField",
      },
      {
        data: "GCRecord",
      },
      {
        data: "BusinessDate",
      },
      {
        data: "StoreType",
      },
      {
        data: "Expired",
      },
      {
        data: "IsActive",
      },
      {
        data: "EInvoice",
      },
      {
        data: "StoreRegionalOID",
      },
      {
        data: "TInvoice",
      },
      {
        data: "StoreTieringOID",
      },
      {
        data: "action",
      },
    ],
  });

  // function reloadTable() {
  //   table.ajax.reload();
  // }
  // setInterval(reloadTable, 5000);
});
$(document).ready(function () {
  var table = $("#masterstorelocationTablebody").DataTable({
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    responsive: true,
    ajax: {
      url: "/masterstorelocation/master",
      type: "GET",
    },
    columns: [
      {
        data: "no",
      },
      {
        data: "storeoid",
      },
      {
        data: "code",
      },
      {
        data: "name",
      },
      {
        data: "action",
      },
    ],
  });

  // function reloadTable() {
  //   table.ajax.reload();
  // }
  // setInterval(reloadTable, 5000);
});
