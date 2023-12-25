<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="row mb-3">
              <div class="col">
              <div class="col">
                </div>
                <table class="table align-middle">
                <thead>
                    <tr class="text-center">
                    <th scope="col">username</th>
                    <th scope="col">Tanggal Komplain</th>
                    <th scope="col">Nomor Kamar</th>
                    <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach ($komplain as $k) : ?>
                    <tr class="text-center">
                    <th scope="row"><?= $k['nama_penghuni']; ?></th>
                    <td><?= date('d F Y', strtotime($k['tanggal_komplain'])); ?></td>
                    <td><?= $k['nomor_kamar']; ?></td>
                    <td>
                    <button type="button" class="btn btn-primary btn" data-bs-toggle="modal" data-bs-target="#detail">
                    Detail
                    </button>
                    </td>
                    </tr>
                </tbody>
                
                <!-- Modal detail -->
                <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Komplain </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="card">
  <div class="card-body">
    <h5 class="card-title"><?= $k['nama_penghuni']; ?></h5>
    <h6 class="card-subtitle mb-2 text-body-secondary"><?= date('d F Y', strtotime($k['tanggal_komplain'])); ?></h6>
    <p class="card-text"><?= $k['komplain_text']; ?></p>
    <p class="card-subtitle mb-2 text-body-secondary"></p>
  </div>
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
</div>
    </div>
  </div>
</div>
</table>
<?php endforeach; ?>
        </div>
      </div>