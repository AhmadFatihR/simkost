</div>
    </div>
  </div>
  <script>
        function formatHarga() {
            var hargaInput = document.getElementById("hargaInput");
            var hargaValue = hargaInput.value;
            var formattedHarga = new Intl.NumberFormat().format(hargaValue);
            hargaInput.value = formattedHarga;
        }
    </script>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
</body>

</html>