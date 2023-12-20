$(document).ready(function () {
  // Event handler untuk form input harga
  $("#formInputHarga").on("submit", function (event) {
    event.preventDefault(); // Menghentikan perilaku default form submit

    var value = $("#hargaInput").val();
    value = convertToNumber(value);
    $("#hargaInput").val(formatRupiah(value));
  });

  // Event handler untuk form edit harga
  $("#formEditHarga").on("submit", function (event) {
    event.preventDefault(); // Menghentikan perilaku default form submit

    var value = $("#editHarga").val();
    value = convertToNumber(value);
    $("#editHarga").val(formatRupiah(value));
  });

  // Event handler untuk input harga pada form input harga
  $("#hargaInput").on("input", function () {
    var value = $(this).val();
    value = value.replace(/[^\d]/g, ""); // Hapus karakter selain angka
    $(this).val(formatRupiah(value));
  });

  // Event handler untuk input harga pada form edit harga
  $("#editHarga").on("input", function () {
    var value = $(this).val();
    value = value.replace(/[^\d]/g, ""); // Hapus karakter selain angka
    $(this).val(formatRupiah(value));
  });

  function convertToNumber(rupiah) {
    return parseInt(
      rupiah.replace("Rp ", "").replace(/\./g, "").replace(",", "")
    );
  }

  function formatRupiah(angka) {
    var number_string = angka.toString().replace(/[^,\d]/g, ""),
      split = number_string.split(","),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // Tambahkan titik jika ribuan ada
    if (ribuan) {
      separator = sisa ? "." : "";
      rupiah += separator + ribuan.join(".");
    }

    // Tambahkan koma untuk desimal
    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;

    return "Rp " + rupiah;
  }
});
