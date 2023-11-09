<div class="container-fluid">
        <div class="card">
          <div class="card-body">
          <div class="container">
          <h2 class="text-center mb-4">Form Ajukan Komplain</h2>
        <form>
        <div class="row">
        <div class="col-auto mb-3">
                <label for="permasalahan" class="form-label">Permasalahan</label>
                <select class="form-select" id="permasalahan" required>
                    <option value="">Pilih Permasalahan</option>
                    <option value="Listrik">Listrik</option>
                    <option value="Air">Air</option>
                    <option value="Kebersihan">Kebersihan</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
        </div>
        <div class="col-auto mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" required>
            </div>
        </div>
            <div class="mb-3">
                <label for="komplain" class="form-label">Komplain</label>
                <textarea class="form-control" id="komplain" rows="8" placeholder="Tuliskan komplain Anda" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Komplain</button>
        </form>
    </div>
          </div>
        </div>
      </div>