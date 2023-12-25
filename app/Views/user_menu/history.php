<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="row ">
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama penghuni</th>
                        <th scope="col">Jumlah pembayaran</th>
                        <th scope="col">Terakhir Pembayaran</th>
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
                        <td><?= $t['status_pembayaran']; ?></td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
                </table>
          </div>
        </div>
      </div>