<?= $this->extend('/layout/layout')?>
<?= $this->section('main')?>
<div class='container'>
            <?php if (session('errors.judul')):?>
                <div class="alert alert-danger mt-3" role="alert">
                <?= session('errors.judul') ?>
            </div>
            <?php endif; ?>
            <?php if (session('errors.nomor_whatsapp')):?>
                <div class="alert alert-danger mt-3" role="alert">
                <?= session('errors.nomor_whatsapp') ?>
            </div>
            <?php endif; ?>
            <?php if (session('errors.image')):?>
                <div class="alert alert-danger mt-3" role="alert">
                <?= session('errors.image') ?>
            </div>
            <?php endif; ?>
            <?php if (session('errors.deskripsi')):?>
                <div class="alert alert-danger mt-3" role="alert">
                <?= session('errors.deskripsi') ?>
            </div>
            <?php endif; ?>
             <?php if (session('message')) {
                echo "<script>
                Swal.fire({
                    title: 'Pesan',
                    text: 'Berhasil di tambah',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                </script>";
            } ?>
            <?php if (session('messagePesan')) {
                echo "<script>
                Swal.fire({
                    title: 'Pesan',
                    text: 'Telah di kirim',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                </script>";
            } ?>
            <?php if (session('messageEdit')) {
                echo "<script>
                Swal.fire({
                    title: 'Pesan',
                    text: 'Berhasil di ubah',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                </script>";
            } ?>
            <?php if (session('delete')) {
                echo "<script>
                Swal.fire({
                    title: 'Pesan',
                    text: 'Berhasil di hapus',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                </script>";
            } ?>
                  <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0"><strong>Daftar Pesan</strong></h5>
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Pesan</button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Pesan</h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                        <?= csrf_field()?>
                        <div class="mb-3">
                        <label for="formFile" class="form-label">Judul</label>
                        <input class="form-control" type="text" id="formFile" name='judul'>
                        </div>
                        <div class="mb-3">
                        <label for="formFile" class="form-label">Kategori</label>
                        <select class="form-select" id='myDropDown' name='kategori' aria-label="Default select example">
                        <option disabled>Pilih Kategori</option>
                        <option value="Text">Text</option>
                        <option value="Image">Image</option>
                        </select>
                        </div>
                        <div class="mb-3">
                        <label for="formFile" class="form-label">Pilih Users</label>
                        <select class="form-select" id='check' name='users' aria-label="Default select example">
                        <option disabled>Pilih Users</option>
                        <option value="New Users">New Users</option>
                        <option value="All Users">All Users</option>
                        </select>
                        </div>
                        <div>
                        <input class="form-control" type="text" id="formFile" name='nomor_all' value='<?= $out?>' hidden>
                        </div>
                        <div class="mb-3 nomorCard">
                        <label for="formFile" class="form-label">Nomor Whatsapp</label>
                        <input class="form-control" type="text" name='nomor_whatsapp' placeholder='0896xxxxxxx,0896xxxxx'>
                        </div>
                        <div class="mb-3 imageCard">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" name='image'>
                        </div>
                        <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                        <textarea class="form-control ckeditor" rows="3" name='deskripsi'></textarea>
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
                    </div>
                    <div class="card-body">
                    <div class="table-responsive text-nowrap">
                    <table id='myTable' class="table table-bordered">
                    <thead class="table-light">
                    <tr>
                        <th scope="col"><strong>No</strong></th>
                        <th scope="col"><strong>Judul</strong></th>
                        <th scope="col"><strong>Kategori</strong></th>
                        <th scope="col"><strong>Status</strong></th>
                        <th scope="col"><strong>Action</strong></th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                        $no = 1;
                        foreach ($data as $da):?>
                    <tr>
                        <th><?= $no++?></th>
                        <th><?= $da['judul']?></th>
                        <th><?= $da['kategori']?></th>
                        <th><?php
                        if($da['status'] == 'Terkirim'){
                            echo "<button type='button' class='btn btn-primary btn-sm'>
                            Terkirim
                          </button>";
                        }elseif($da['status'] == 'pending'){
                            echo "<button type='button' class='btn btn-warning btn-sm'>
                            Pending
                          </button>";
                        }else{
                            $status = $da['status'].' errors';
                            echo "<button type='button' class='btn btn-danger btn-sm'>
                            $status
                          </button>";  
                        }
                        ?></th>
                        <th>
                              <a href="/kirim_pesan/<?= $da['id']?>" class='mb-1 btn-sm btn btn-outline-primary btn-sm'>
                              <i class='bx bxs-send'></i></a>
                              <!-- Button trigger modal -->
                        <a href='' class="mb-1 btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $da['id']?>"><i class='bx bxs-edit'></i></a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?= $da['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit pesan</h5>
                                </div>
                            <div class="modal-body">
                                <form action="<?= base_url('/after_edit_pesan/'.$da['id'])?>" method="post" enctype="multipart/form-data">
                                <?php csrf_field()?>
                                <div class="mb-3">
                                <label for="formFile" class="form-label">Judul</label>
                                <input class="form-control" type="text" id="formFile" name='judul' value="<?= $da['judul']?>">
                                </div>
                                <div class="mb-3">
                                <label for="formFile" class="form-label">Kategori</label>
                                <select class="form-select" id='checkKategori' name='kategori' aria-label="Default select example">
                                <option disabled>Pilih Kategori</option>
                                <option value="Text">Text</option>
                                <option value="Image">Image</option>
                                </select>
                                </div>
                                <div class="mb-3">
                                <label for="formFile" class="form-label">Pilih Users</label>
                                <select class="form-select" id='checkUsers' name='users' aria-label="Default select example">
                                <option disabled>Pilih Users</option>
                                <option value="New Users">New Users</option>
                                <option value="All Users">All Users</option>
                                </select>
                                </div>
                                <div>
                                <input class="form-control" type="text" id="formFile" name='nomor_all' value='<?= $out?>' hidden>
                                </div>
                                <div class="mb-3 cardNo">
                                <label for="formFile" class="form-label">Nomor Whatsapp</label>
                                <input class="form-control" type="text" name='nomor_whatsapp' placeholder='0896xxxxxxx,0896xxxxx' value="<?= $da['nomor_whatsapp']?>">
                                </div>
                                <div class="mb-3 cardImg">
                                <label for="formFile" class="form-label">Image</label>
                                <input class="form-control" type="file" name='image'>
                                </div>
                                <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                <textarea class="form-control ckeditor" rows="3" name='deskripsi'><?= $da['deskripsi']?></textarea>
                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                            </form>
                            </div>
                            
                            </div>
                            </div>
                        </div>
                              <a href='/delete_pesan/<?= $da['id']?>' class='mb-1 btn-sm btn btn-outline-danger hapus'>
                              <i class='bx bxs-trash'></i></a>
                        </th>
                        </tr>
                        <?php endforeach?>
                    </tbody>
                    </table>
                        </div>
                    </div>
                  </div>
            </div>
            <!-- / Content -->

            
            <div class="content-backdrop fade"></div>
          </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).on('click', '.hapus', function (e){
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
        title: 'Apakah anda',
        text: "ingin hapus data ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
        if (result.value) {
            document.location.href = href
        }
        })
            })
</script>
<script>
    let table = new DataTable('#myTable');
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="<?=base_url()?>assets/js/pesan.js"></script>

<?= $this->endSection()?>