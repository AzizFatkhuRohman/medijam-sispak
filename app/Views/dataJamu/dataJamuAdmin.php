<?= $this->extend('/layout/layout')?>
<?= $this->section('main')?>
<div class='container'>
<?php if (session('errors.namaJamu')):?>
                <div class="alert alert-danger mt-3" role="alert">
                <?= session('errors.namaJamu') ?>
            </div>
            <?php endif;?>
           
            <?php if (session('errors.manfaat')):?>
                <div class="alert alert-danger mt-3" role="alert">
                <?= session('errors.manfaat') ?>
            </div>
            <?php endif;?>
            <?php if (session('message')) {
                echo "<script>
                Swal.fire({
                    title: 'Data',
                    text: 'Berhasil di tambah',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                </script>";
            } ?>
<div class="card mt-3">
  <div class="card-body">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah Jamu
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jamu</h5>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nama Jamu</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="beras kencur" name='namaJamu'>
        </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Gambar</label>
        <input type="file" class="form-control" id="exampleFormControlInput1" name='gambar'>
        </div>
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Manfaat</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='manfaat'></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class='mt-3'>
<table id="myTable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama jamu</th>
                <th>Manfaat</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach($data as $da):
          ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $da['namaJamu']?></td>
                <td><a href="<?=base_url('/detailDataJamuAdmin/'. $da['id'])?>" style="color: inherit;text-decoration: none;"><?= $da['manfaat']?></a></td>
                <td><?= $da['created_at']?></td>
            </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>
<style>
    td {
    max-width: 10px;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}
   </style>
<script>
    let table = new DataTable('#myTable');
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<?= $this->endSection()?>