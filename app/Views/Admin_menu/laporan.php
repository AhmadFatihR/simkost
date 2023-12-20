<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="row ">
                <div class="col">

                <div class="col mx-3 mb-3">
                <select class="form-select" id="permasalahan" required>
                    <option value="">Filter</option>
                    <option value="Listrik">1 Minggu lalu</option>
                    <option value="Air">1 bulan lalu</option>
                    <option value="Kebersihan">6 bulan lalu</option>
                    <option value="Lainnya">1 tahun lalu</option>
                </select>
                </div>
                </div>

                <div class="col">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="ti ti-square-plus fa-3"></i>
                Tambah
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Laporan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="container">
          <form action="/laporan/save" method="post">
            <div class="mb-3">
                <label for="idkamar" class="form-label">Id Kamar:</label>
                <input name="idkamar" type="text" class="form-control id="idkamar" placeholder="Masukkan Id Kamar" autofocus>
            <div class="invalid-feedback">
            </div>
            </div>
            <div class="mb-3">
                <label for="hargakamar" class="form-label">Harga Kamar:</label>
                <input name="hargakamar" type="number" class="form-control" id="harga" placeholder="Masukkan Harga Kamar" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input name="nama" type="text" class="form-control" id="nama" placeholder="Masukkan Nama" required>
            </div>
            <div class="mb-3">
                <label for="tanggalbayar" class="form-label">Tanggal Bayar:</label>
                <input name="tanggalbayar" type="date" class="form-control" id="tanggalbayar" placeholder="Masukkan Tanggal Bayar" required min="0">
            </div>
            <div class="mb-3">
                <label for="sisa" class="form-label">Sisa</label>
                <input name="sisa" class="form-control" type="text" id="sisa" placeholder="Masukkan Sisa" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input name="status" class="form-control" type="text" id="status" placeholder="Masukkan Status" required>
            </div>
        
    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                    </div>
                </div>
                </div>
                <button class="btn btn-primary ms-2" >
                <i class="ti ti-printer fa-3"></i>Cetak</button>
                </div>
                </div>

                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id Tagihan</th>
                    <th scope="col">Harga Kamar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Bayar</th>
                    <th scope="col">Sisa</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
               
                </table>

            
          </div>
        </div>
      </div>