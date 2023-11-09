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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
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
                    <th scope="col">Stats</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">KP01</th>
                    <td>Kania</td>
                    <td>KM01</td>
                    <td>Jakarta</td>
                    <td>2023-01-12</td>
                    <td>2023-02-11</td>
                    <td></td>
                    </tr>
                    <tr>
                    <th scope="row">KP02</th>
                    <td>Ridha</td>
                    <td>KM02</td>
                    <td>Surabaya</td>
                    <td>2023-02-02</td>
                    <td></td>
                    <td></td>
                    </tr>
                </tbody>
                </table>

            
          </div>
        </div>
      </div>