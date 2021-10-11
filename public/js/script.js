(function ($) {
  // Petugas
  $("#tambahDataPetugas").on("click", function () {
    $("#petugasModalLabel").html("Tambah Data Petugas");
    $(".modal-footer button[type=submit]").html("Tambah Data");
  });

  $(".btn-ubah-petugas").on("click", function () {
    $("#petugasModalLabel").html("Ubah Data Petugas");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-content form").attr(
      "action",
      base_url + "PetugasController/ubahData"
    );

    $.ajax({
      url: base_url + "PetugasController/getUbah",
      data: {
        id_petugas: $(this).data("idpetugas"),
      },
      method: "post",
      dataType: "json",
      success: function (response) {
        $("#id_petugas").val(response.id_petugas);
        $("#inputUsername").val(response.username);
        $("#inputPassword").val(response.password);
        $("#inputNamaPetugas").val(response.nama_petugas);
        $("#selectLevel").val(response.level);
      },
    });
  });

  // SPP
  $("#tambahDataSpp").on("click", function () {
    $("#sppModalLabel").html("Tambah Data SPP");
    $(".modal-footer button[type=submit]").html("Tambah Data");
  });

  $(".btn-ubah-spp").on("click", function () {
    $("#sppModalLabel").html("Ubah Data Spp");
    $(".modal-footer button[type=submit]").html("Ubah Data");

    $(".modal-content form").attr(
      "action",
      base_url + "SppController/ubahData"
    );

    $.ajax({
      url: base_url + "SppController/getUbah",
      data: {
        id_spp: $(this).data("idspp"),
      },
      method: "post",
      dataType: "json",
      success: function (response) {
        $("#id_spp").val(response.id_spp);
        $("#inputTahun").val(response.tahun);
        $("#inputNominal").val(response.nominal);
      },
    });
  });

  // Siswa
  $("#tambahSiswa").on("click", function () {
    $("#siswaModalLabel").html("Tambah Siswa");
    $(".modal-footer button[type=submit").html("Tambah siswa");
  });
})(jQuery);
