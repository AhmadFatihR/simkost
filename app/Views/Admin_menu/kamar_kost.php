<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="row mb-3">
                <div class="col">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahData">
                <i class="ti ti-square-plus fa-3"></i>
                Tambah
                </button>

                <!-- Modal -->
                <div class="modal fade" id="ModalTambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Kamar</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
          <div class="container">
          <form action="/kamar/save" method="post">
            <div class="mb-3">
                <label for="nomorKamar" class="form-label">Nomor Kamar:</label>
                <input name="nomor_kamar" type="text" class="form-control" id="nomorKamar" placeholder="Masukkan Nomor Kamar" required>
            </div>
            <div class="mb-3">
                <label for="fasilitas" class="form-label">Fasilitas:</label>
                <input name="fasilitas" type="text" class="form-control" id="fasilitas" placeholder="Masukkan Fasilitas Kamar" required>
            </div>
            <div class="mb-3">
                <label for="ukuranKamar" class="form-label">Ukuran Kamar:</label>
                <input name="ukuran_kamar" type="text" class="form-control" id="ukuranKamar" placeholder="Masukkan Ukuran Kamar" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input name="harga" type="number" class="form-control" id="hargaInput" placeholder="Masukkan Harga Kamar" required min="0">
            </div>
        
    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah Kamar</button>
                    </div>
                    </div>
                    </form>
                </div>
                </div>
                </div>

                <div class="col">

                </div>

                <div class="col">
                <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </form>
                </div>
                </div>

                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Nomor Kamar</th>
                    <th scope="col">Fasilitas</th>
                    <th scope="col">Ukuran Kamar</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($kamar as $k) : ?>
                    <tr>
                    <th scope="row"><?= $k['nomor_kamar']; ?></th>
                    <td><?= $k['fasilitas']; ?></td>
                    <td><?= $k['ukuran']; ?></td>
                    <td><?= $k['harga']; ?></td>
                    <td><?= $k['status']; ?></td>
                    <td>
                    <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ubah<?= $k['id_kamar'] ?>">Ubah</a>
                    <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?= $k['id_kamar'] ?>">Hapus</a>
                    </td>
                    <td>
                        <a href="" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#detail<?= $k['id_kamar'] ?>">Detail</a>
                    </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>

            
          </div>
        </div>
      </div>