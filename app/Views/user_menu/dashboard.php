<div class="container-fluid">
    <div class="row row-cols-1 row-cols-md-2">
        <div class="col">
            <!-- Card: Total Komplain -->
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-start">
                        <div class="col-8">
                            <h5 class="card-title mb-3 fw-semibold">Total Komplain</h5>
                            <h4 class="fw-semibold mb-0"><?= $jumlahKomplain; ?></h4>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-end">
                                <div class="text-white bg-danger rounded-circle p-3 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-bell fs-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <!-- Card: Total Tagihan -->
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-start">
                        <div class="col-8">
                            <h5 class="card-title mb-3 fw-semibold">Total Tagihan</h5>
                            <h4 class="fw-semibold mb-0"><?= 'Rp ' . number_format($jumlahTagihan, 0, ',', '.'); ?></h4>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-end">
                                <div class="text-white bg-warning rounded-circle p-3 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-cash fs-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3 text-center">
        <img src="../assets/images/backgrounds/tes.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Selamat datang di aplikasi SIMKOST.</h5>
            <p class="card-text">Aplikasi ini memudahkan Anda dalam melihat history transaksi dan melaporkan kendala terkait fasilitas kost.</p>
        </div>
    </div>
</div>
