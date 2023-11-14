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
                <input name="nomor_kamar" type="text" class="form-control <?= ($validation->hasError('nomor_kamar')) ? 'invalid' : ''; ?>" id="nomorKamar" placeholder="Masukkan Nomor Kamar" autofocus>
            <div class="invalid-feedback">
                <?= $validation->getError('nomor_kamar'); ?>
            </div>
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
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $k['id_kamar']; ?>"  data-id="">
                    <i class="ti ti-edit"></i>
                    </button>

                    <form action="/kamar/delete/<?= $k['id_kamar']; ?>" method="post" style="display:inline;">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn btn-danger"><i class="ti ti-trash"></i></button>
                    </form>
                    </td>
                    <td>
                        <a href="" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#detail<?= $k['id_kamar'] ?>">Detail</a>
                    </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>

                  

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
                        <input name="nomor_kamar" type="text" class="form-control" id="editNomorKamar" value="<?= $k['nomor_kamar']; ?>">
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
                        <input name="harga" type="number" class="form-control" id="editHarga" value="<?= $k['harga']; ?>" min="0">
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



            
          </div>
        </div>
      </div>