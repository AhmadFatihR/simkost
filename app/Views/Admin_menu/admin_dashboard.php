<div class="container-fluid">
    <!-- Row 1 -->
    <div class="row row-cols-1 row-cols-md-3">
        <div class="col">
            <!-- Card: Penghuni Kost -->
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-start">
                        <div class="col-8">
                            <h5 class="card-title mb-3 fw-semibold">Penghuni Kost</h5>
                            <h4 class="fw-semibold mb-0"><?= $jumlah_penghuni; ?></h4>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-end">
                                <div class="text-white bg-primary rounded-circle p-3 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-users fs-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <!-- Card: Kamar Kost -->
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-start">
                        <div class="col-8">
                            <h5 class="card-title mb-3 fw-semibold">Kamar Kost</h5>
                            <h4 class="fw-semibold mb-0"><?= $jumlah_kamar; ?></h4>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-end">
                                <div class="text-white bg-secondary rounded-circle p-3 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-home fs-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <!-- Card: Jumlah Komplain -->
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-start">
                        <div class="col-8">
                            <h5 class="card-title mb-3 fw-semibold">Jumlah Komplain</h5>
                            <h4 class="fw-semibold mb-0"><?= $jumlah_komplain; ?></h4>
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
    </div>

    <div class="row row-cols-1 row-cols-md">
        <div class="col">
            <!-- Card: Jumlah Tagihan -->
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-start">
                        <div class="col-8">
                            <h5 class="card-title mb-3 fw-semibold">Jumlah Tagihan</h5>
                            <h4 class="fw-semibold mb-0">3</h4>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-end">
                                <div class="text-white bg-warning rounded-circle p-3 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-notes fs-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <!-- Card: Selamat datang -->
            <div class="card mb-3 text-center">
                <img src="../assets/images/backgrounds/tes.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Selamat datang di aplikasi SIMKOST.</h5>
                    <p class="card-text">Aplikasi ini memudahkan Anda dalam melihat history transaksi dan melaporkan kendala terkait fasilitas kost.</p>
                </div>
            </div>
        </div>
    </div>
</div>
