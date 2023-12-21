<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="row mb-3">
                <div class="col">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahDataPenghuni">
                <i class="ti ti-square-plus fa-3"></i>
                Tambah
                </button>

                <!-- Modal -->
                <div class="modal fade" id="ModalTambahDataPenghuni" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Penghuni Kos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="container">
            <form action="/penghuni/save" method="post">
                <div class="mb-3">
                    <label for="kdpenghuni" class="form-label">Kode Penghuni (Username akun):</label>
                    <input name="kdpenghuni" type="text" class="form-control <?= ($validation->hasError('kdpenghuni')); ?>" id="kdpenghuni" placeholder="Masukkan Kode Penghuni" autofocus>
                    <div class="invalid-feedback">
                        <?= $validation->getError('kdpenghuni'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nama_penghuni" class="form-label">Nama:</label>
                    <input name="nama_penghuni" type="text" class="form-control" id="nama_penghuni" placeholder="Masukkan nama" required>
                </div>
                <div class="mb-3">
                <label for="nomor_kamar" class="form-label">No Kamar:</label>
            
                <select name="nomor_kamar" class="form-select" aria-label="Pilih Nomor Kamar" id="nomor_kamar" required>
                <option selected disabled>Pilih Nomor Kamar</option>
                <?php foreach($dataKamar as $data): ?>
                    <option value="<?= $data['id_kamar']; ?>"><?= $data['nomor_kamar']; ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
                <div class="mb-3">
                    <label for="tgl_masuk" class="form-label">Tanggal Masuk:</label>
                    <input name="tgl_masuk" class="form-control" type="date" id="tgl_masuk" placeholder="Masukkan Tanggal Masuk" required>
                </div>
                <div class="mb-3">
                    <label for="nohp" class="form-label">Nomor HP:</label>
                    <input name="nohp" type="text" class="form-control" placeholder="Masukkan No.HP" required>
                </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Akun:</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Masukkan Password" required>
                    </div>
            </div>
            
                </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
            </form>
                    </div>
                </div>
                </div>
                </div>

                <div class="col">

                </div>

                <div class="col">
                <form action="" method="post">
                <div class="col">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan Keyword..." name="keyword">
                    <button class="btn btn-outline-dark" type="submit" id="button-addon2">Cari <i class="ti ti-search"></i></button>
                </div>
                </div>
            </form>
                </div>
                </div>

                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Kode penghuni</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No.Kamar</th>
                    <th scope="col">No.HP</th>
                    <th scope="col">Tanggal Masuk</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                   <?php foreach($penghuni as $p) : ?>
                    <tr>
                    <td scope="row"><?= $p['kdpenghuni']; ?></td>
                    <td><?= $p['nama_penghuni']; ?></td>
                    <td><?= $p['nomor_kamar']; ?></td>
                    <td><?= $p['nohp']; ?></td>
                    <td><?= date('d-m-Y', strtotime($p['tgl_masuk'])); ?></td>
                    <td>
                    <form action="/penghuni/delete/<?= $p['id_penghuni']; ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <button type="button" class="btn btn-warning btn" data-bs-toggle="modal" data-bs-target="#edit<?= $p['id_penghuni']; ?>"  data-id="">
                    <i class="ti ti-edit"></i>
                    </button>
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn btn-danger btn"><i class="ti ti-trash"></i></button>
                    </form>
                    </td>
                    </tr>
                   <?php endforeach; ?>
                </tbody>
                </table>

                 <!-- Modal for Editing -->
                 <?php foreach ($penghuni as $p) : ?>
    <div class="modal fade" id="edit<?= $p['id_penghuni']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Penghuni</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/penghuni/update" method="get">
                    <input type="hidden" name="id_penghuni" id="editIdPenghuni" value="<?= $p['id_penghuni']; ?>">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="kdpenghuni" class="form-label">Kode Penghuni:</label>
                            <input name="kdpenghuni" type="text" class="form-control" id="kdpenghuni" placeholder="Masukkan Kode Penghuni" value="<?= $p['kdpenghuni']; ?> ">
                        </div>
                        <div class="mb-3">
                            <label for="nama_penghuni" class="form-label">Nama:</label>
                            <input name="nama_penghuni" type="text" class="form-control" id="nama_penghuni" placeholder="Masukkan nama" value="<?= $p['nama_penghuni']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="nomor_kamar" class="form-label">No Kamar:</label>
                            <select name="nomor_kamar" class="form-select" aria-label="Pilih Nomor Kamar" id="nomor_kamar" required>
                                <option disabled>Pilih Nomor Kamar</option>
                                <?php foreach ($dataKamar as $data) : ?>
                                    <?php $selected = ($data['id_kamar'] == $p['id_kamar']) ? 'selected' : ''; ?>
                                    <option value="<?= $data['id_kamar']; ?>" <?= $selected; ?>><?= $data['nomor_kamar']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_masuk" class="form-label">Tanggal Masuk:</label>
                            <input name="tgl_masuk" class="form-control" type="date" id="tgl_masuk" placeholder="Masukkan Tanggal Masuk" value="<?= $p['tgl_masuk']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="nohp" class="form-label">Nomor HP:</label>
                            <input name="nohp" type="text" class="form-control" placeholder="Masukkan No.HP" value="<?= $p['nohp']; ?>" required >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


            
          </div>
        </div>
      </div>