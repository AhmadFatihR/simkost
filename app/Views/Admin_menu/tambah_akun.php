<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="ti ti-square-plus fa-3"></i> Tambah
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Akun</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/akun_user/save" method="post">
                                        <div class="container">
                                            <div class="mb-3">
                                                <label for="id_penghuni" class="form-label">Nama Penghuni:</label>
                                                <select name="id_penghuni" class="form-select" aria-label="Pilih Nomor Kamar" id="id_penghuni" required>
                                                <option selected disabled>Pilih Nama Penghuni</option>
                                                <?php foreach($dataPenghuni as $data): ?>
                                                    <option value="<?= $data['id_penghuni']; ?>"><?= $data['nama_penghuni']; ?> (<?= $data['kdpenghuni']; ?>)</option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username:</label>
                                                <input name="username" type="text" class="form-control" id="username" placeholder="Masukkan Username" required>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('username'); ?>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password:</label>
                                                <input name="password" type="text" class="form-control" id="password" placeholder="Masukkan Password" required min="0">
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
                </div>

                <div class="col"></div>

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

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Kode Penghuni</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Level</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user as $u) : ?>
                    <tr>
                        <th scope="row"><?= $u['kdpenghuni']; ?></th>
                        <td><?= $u['nama_penghuni']; ?></td>
                        <td><?= $u['username']; ?></td>
                        <td><?= $u['password']; ?></td>
                        <td><?= $u['role']; ?></td>
                        <td>
                        <form action="/akun_user/delete/<?= $u['id_user']; ?>" method="post" class="d-inline">
                            <?= csrf_field() ?>
                            <button type="button" class="btn btn-warning btn" data-bs-toggle="modal" data-bs-target="#edit<?= $u['id_user']; ?>"  data-id="">
                        <i class="ti ti-edit"></i>
                        </button>
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-danger btn"><i class="ti ti-trash"></i></button>
                        </form>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <!-- Modal Edit -->
            <?php foreach ($user as $u) : ?>
            <div class="modal fade" id="edit<?= $u['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="exampleModalLabel">Edit User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/akun_user/update" method="get">
                            <input type="hidden" name="id_user" id="editIdUser" value="<?= $u['id_user']; ?>">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="editNamaPenghuni" class="form-label">Nama Penghuni</label>
                                    <select name="id_penghuni" class="form-select" aria-label="Pilih Nama Penghuni" id="id_user" aria-label="Disabled input example">
                                        <option disabled>Pilih Nama Penghuni</option>
                                        <?php foreach($dataPenghuni as $data): ?>
                                            <?php $selected = ($data['id_penghuni'] == $u['id_penghuni']) ? 'selected' : ''; ?>
                                            <option value="<?= $data['id_penghuni']; ?>" <?= $selected; ?>><?= $data['nama_penghuni']; ?> (<?= $data['kdpenghuni']; ?>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" value="<?= $u['username']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="text" class="form-control" name="password" id="password" value="<?= $u['password']; ?>">
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
