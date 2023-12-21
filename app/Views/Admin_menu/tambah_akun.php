<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
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

                        <th scope="col">Username (Kode Penghuni)</th>
                        <th scope="col">Password</th>
                        <th scope="col">Level</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user as $u) : ?>
                    <tr>
                        <th scope="row"><?= $u['username']; ?></th>
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
