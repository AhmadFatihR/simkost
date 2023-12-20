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
          <form action="/kamar/save" method="post" enctype="multipart/form-data">
          <div class="mb-3">
                <label for="nomorKamar" class="form-label">Nomor Kamar:</label>
                <input name="nomor_kamar" type="text" class="form-control <?= ($validation->hasError('nomor_kamar')) ? 'is-invalid' : ''; ?>" id="nomorKamar" placeholder="Masukkan Nomor Kamar" autofocus>
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
                <input name="harga" type="text" class="form-control" id="hargaInput" placeholder="Masukkan Harga Kamar" required>
            </div>
            <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat:</label>
                    <textarea name="alamat" class="form-control" id="editalamat" placeholder="Masukkan Alamat" required></textarea>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Foto Kost</label>
                <input name="gambar" class="form-control" type="file" id="gambar" placeholder="Masukkan Foto Kamar">
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
                
                <div class="mb-2"></div>

            <form action="" method="post">
                <div class="col-4">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan Keyword..." name="keyword">
                    <button class="btn btn-outline-dark" type="submit" id="button-addon2">Cari <i class="ti ti-search"></i></button>
                </div>
                </div>
            </form>
                </div>

                <table class="table align-middle">
                <thead>
                    <tr>
                    <th scope="col">Nomor Kamar</th>
                    <th scope="col">Fasilitas</th>
                    <th scope="col">Ukuran Kamar</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Alamat</th>
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
                    <td class="harga col-1"><?= 'Rp ' . number_format($k['harga'], 0, ',', '.'); ?></td>
                    <td class="row-2"><?= $k['alamat']; ?></td>
                    <td><?= $k['status']; ?></td>
                    <td class="col-2">
                    
                    <form action="/kamar/delete/<?= $k['id_kamar']; ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <button type="button" class="btn btn-warning btn" data-bs-toggle="modal" data-bs-target="#edit<?= $k['id_kamar']; ?>"  data-id="">
                    <i class="ti ti-edit"></i>
                        </button>
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn btn-danger btn"><i class="ti ti-trash"></i></button>
                    </form>
                    </td>
                    <td>
                    <button type="button" class="btn btn-primary btn" data-bs-toggle="modal" data-bs-target="#detail<?= $k['id_kamar']; ?>">
                    Detail
                    </button>
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
            <form action="/kamar/update" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id_kamar" value="<?= $k['id_kamar']; ?>">
                    <div class="mb-3">
                        <label for="editNomorKamar" class="form-label">Nama Kamar:</label>
                        <input name="nomor_kamar" type="text" class="form-control" id="editNomorKamar" value="<?= $k['nomor_kamar']; ?>" required>
                        <!-- Tampilkan pesan error jika input kosong -->
                        <div class="invalid-feedback">
                            Nama Kamar harus diisi.
                        </div>
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
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <textarea name="alamat" class="form-control" id="editalamat" rows="3" ><?= $k['alamat']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editGambar" class="form-label">Foto Kost :</label>
                        <input name="gambar" class="form-control" type="file" id="editGambar">
                        <!-- Tampilkan pesan error jika file tidak dipilih -->
                        <div class="invalid-feedback">
                            Foto Kost harus diunggah.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>


    <!-- Modal detail -->
    <?php foreach($kamar as $k) : ?>
<div class="modal fade" id="detail<?= $k['id_kamar']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Kamar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     <div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="/img/<?= $k['gambar']; ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h3 class="card-title">Kamar <?= $k['nomor_kamar']; ?></h3>
        <br>
        <p class="card-text"><b>Fasilitas : </b><?= $k['fasilitas']; ?></p>
        <p class="card-text"><b>Ukuran Kamar : </b><?= $k['ukuran']; ?></p>
        <p class="card-text"><b>Harga : </b> <?= 'Rp ' . number_format($k['harga'], 0, ',', '.'); ?></p>
        <p class="card-text"><b>Alamat : </b> <?= $k['alamat']; ?></p>
        <p class="card-text"><small class="text-body-secondary">Status : <?= $k['status']; ?></small></p>
      </div>
    </div>
  </div>
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
</div>

    </div>
  </div>
</div>
<?php endforeach; ?>



            
          </div>
        </div>
      </div>