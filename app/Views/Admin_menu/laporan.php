<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="row ">
                <div class="col">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahTagihan">
                <i class="ti ti-square-plus fa-3"></i>
                Tambah
                </button>
                <button class="btn btn-primary ms-2" onclick="window.print()">
                <i class="ti ti-printer fa-3"></i>Cetak</button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="ModalTambahTagihan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Tagihan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <form action="/laporan/save" method="post">
                                    <div class="mb-3">
                                        <label for="nama_penghuni" class="form-label">Nama Penghuni:</label>
                                        <select name="nama_penghuni" class="form-select" aria-label="Pilih Nomor Kamar" id="nama_penghuni" required>
                                        <option selected disabled>Pilih Nama Penghuni</option>
                                        <?php foreach($penghuni as $p): ?>
                                            <option value="<?= $p['id_penghuni']; ?>"><?= $p['nama_penghuni']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah_pembayaran" class="form-label">Jumlah pembayaran:</label>
                                        <input name="jumlah_pembayaran" type="text" class="form-control" id="hargaInput" placeholder="Masukkan Jumlah Pembayaran" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal_pembayaran" class="form-label">Tanggal Akhir Pembayaran:</label>
                                        <input name="tanggal_pembayaran" class="form-control" type="date" id="tanggal_pembayaran" placeholder="Masukkan Tanggal Pembayaran" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="bulan" class="form-label">Bulan Sewa :</label>
                                        <select name="bulan" class="form-select" aria-label="Pilih Bulan Sewa" id="bulan" required>
                                        <option selected disabled>Pilih Bulan Sewa</option>
                                        <?php foreach($bulan_sewa as $bln): ?>
                                            <option value="<?= $bln ?>"><?= $bln ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status_pembayaran" class="form-label">Status :</label>
                                        <select name="status_pembayaran" class="form-select" aria-label="Pilih Nomor Kamar" id="nama_penghuni" required>
                                        <option selected disabled>Pilih Status</option>
                                        <option value="Lunas">Lunas</option>
                                        <option value="Belum lunas">Belum lunas</option>
                                        <!-- <?php foreach($status_opsi as $status): ?>
                                            <option value="<?= $status ?>"><?= $status ?></option>
                                            <?php endforeach; ?> -->
                                        </select>
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

                
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama penghuni</th>
                        <th scope="col">Jumlah pembayaran</th>
                        <th scope="col">Terakhir Pembayaran</th>
                        <th scope="col">Bulan Sewa</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tagihan as $t) : ?>
                    <tr>
                        <th scope="row"><?= $t['nama_penghuni']; ?></th>
                        <td class="harga"><?= 'Rp ' . number_format($t['jumlah_pembayaran'], 0, ',', '.'); ?></td>
                        <td><?= date('d F Y', strtotime($t['tanggal_pembayaran'])); ?></td>
                        <td><?= $t['bulan']; ?></td>
                        <td><?= $t['status_pembayaran']; ?></td>
                        <td>
                        <form action="/laporan/delete/<?= $t['id_transaksi']; ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <button type="button" class="btn btn-warning btn" data-bs-toggle="modal" data-bs-target="#edit<?= $t['id_transaksi']; ?>"  data-id="">
                    <i class="ti ti-edit"></i>
                        </button>
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn btn-danger btn"><i class="ti ti-trash"></i></button>
                    </form>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
                </table>


                <!-- Modal for Editing -->
                <?php foreach($tagihan as $t) : ?>
                <div class="modal fade" id="edit<?= $t['id_transaksi']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Tagihan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <form action="/laporan/update" method="get">
                                        <input type="hidden" name="id_transaksi" value="<?= $t['id_transaksi']; ?>">
                                    <div class="mb-3">
                                        <label for="nama_penghuni" class="form-label">Nama Penghuni:</label>
                                        <select name="nama_penghuni" class="form-select" aria-label="Pilih Nomor Kamar" id="nama_penghuni" required>
                                        <option selected disabled>Pilih Nama Penghuni</option>
                                        <?php foreach($penghuni as $p): ?>
                                            <?php $selected = ($p['id_penghuni']== $t['id_penghuni']) ? 'selected' : ''; ?>
                                            <option value="<?= $p['id_penghuni']; ?>" <?= $selected; ?>><?= $p['nama_penghuni']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah_pembayaran" class="form-label">Jumlah pembayaran:</label>
                                        <input name="jumlah_pembayaran" type="number" class="form-control" id="hargaInput" value="<?= $t['jumlah_pembayaran']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal_pembayaran" class="form-label">Tanggal Akhir Pembayaran:</label>
                                        <input name="tanggal_pembayaran" class="form-control" type="date" id="tanggal_pembayaran" value="<?= $t['tanggal_pembayaran']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="bulan" class="form-label">Bulan Sewa :</label>
                                        <select name="bulan" class="form-select" aria-label="Pilih Bulan Sewa" id="bulan" required>
                                        <option selected value="<?= $t['bulan']; ?>"><?= $t['bulan']; ?></option>
                                        <?php foreach($bulan_sewa as $bln): ?>
                                            <option value="<?= $bln ?>"><?= $bln ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status_pembayaran" class="form-label">Status :</label>
                                        <select name="status_pembayaran" class="form-select" aria-label="Pilih Nomor Kamar" required>
                                            <option selected value="<?= $t['status_pembayaran']; ?>"><?= $t['status_pembayaran']; ?></option>
                                            <option value="Lunas">Lunas</option>
                                            <option value="Belum lunas">Belum lunas</option>

                                            <!-- <?php foreach($status_opsi as $status): ?>
                                                <option value="<?= $status ?>" <?= ($status == $t['status_pembayaran']) ? 'selected' : '' ?>>
                                                    <?= $status ?>
                                                </option>
                                            <?php endforeach; ?> -->
                                        </select>
                                    </div>
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