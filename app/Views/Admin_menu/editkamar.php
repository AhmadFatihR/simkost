  <!-- Modal for Editing -->
  <?php foreach($kamar as $k) : ?>
    <div class="modal fade" id="edit<?= $k['id_kamar']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Kamar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/kamar/update" method="get">
                <div class="modal-body">
                    <!-- Update input fields based on your database structure -->
                    <input type="hidden" name="id_kamar" id="editIdKamar" value="<?= $k['id_kamar']; ?>">
                    <div class="mb-3">
                        <label for="editNomorKamar" class="form-label">Nama Kamar:</label>
                        <input class="form-control" type="text" id="editNomorKamar" value="<?= $k['nomor_kamar']; ?>" aria-label="Disabled input example" disabled readonly>
                    </div>
                    <div class="mb-3">
                        <label for="editFasilitas" class="form-label">Fasilitas:</label>
                        <input name="fasilitas" type="text" class="form-control" id="editFasilitas" value="<?= $k['fasilitas']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="editUkuranKamar" class="form-label">Ukuran Kamar:</label>
                        <input name="ukuran_kamar" type="text" class="form-control" id="editUkuranKamar" value="<?= $k['ukuran']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="editHarga" class="form-label">Harga:</label>
                        <?php
                        // Format harga menjadi Rupiah untuk tampilan saja
                        $formattedHarga = 'Rp ' . number_format($k['harga'], 0, ',', '.');
                        ?>
                        <input name="harga" type="text" class="form-control" id="editHarga" value="<?= $formattedHarga; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <textarea name="alamat" class="form-control" id="editalamat" rows="3" ><?= $k['alamat']; ?></textarea>
                    </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Foto Kost :</label>
                    <input name="gambar" class="form-control" type="file" id="editgambar" placeholder="Masukkan Foto Kamar" value="<?= $k['gambar']; ?>">
                </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>