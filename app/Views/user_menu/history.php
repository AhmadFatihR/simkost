<div class="container-fluid">
    <div class="card text-center">
  <div class="card-header">
<div class="btn-group" role="group" aria-label="Basic outlined example">
    <a type="button" class="btn btn-outline-success" href="/history?status=Lunas">Lunas</a>
    <a type="button" class="btn btn-outline-danger" href="/history?status=Belum+lunas">Belum Lunas</a>
</div>
  </div>
  <div class="col-12">
  <div class="card-body">
    <div class="row">
        <?php foreach ($tagihan as $t) : ?>
            <div class="col-4">
                <div class="card mx-2">
                    <h5 class="card-title"><?= $t['bulan']; ?></h5>
                    <p class="card-text"><?= $t['nomor_kamar']; ?></p>
                    <h6><?= 'Rp ' . number_format($t['jumlah_pembayaran'], 0, ',', '.'); ?></h6>
                    <p class=card-text><?= date('d F Y', strtotime($t['tanggal_pembayaran'])); ?></p>
                    <div class="alert <?= ($t['status_pembayaran'] == 'Belum lunas') ? 'alert-danger' : 'alert-success'; ?> mx-3" role="alert">
                    <?= $t['status_pembayaran']; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
  </div>
</div>
</div>