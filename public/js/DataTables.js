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
      url: "/notifikasi/histori", // Ganti dengan route yang sesuai
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
        data: "tgl",
      },
    ],
  });
});

$(document).ready(function () {
  $("#listTableBody").DataTable({
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
      url: "/listtiket/list", // Ganti dengan route yang sesuai
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
      // Tambahkan kolom lain sesuai kebutuhan
    ],
  });
});
