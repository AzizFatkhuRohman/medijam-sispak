<?=$this->extend("/layout/layout")?>
<?=$this->section('main')?>
<div class='container'>
<div class='d-flex j-center mt-3' style="justify-content:center;">
<div class="col-md-6 col-lg-4 mb-3" Style='margin-right:3px'>
                  <div class="card text-center">
                    <div class="card-header"><h5><strong>Data Jamu</strong></h5></div>
                    <div class="card-body">
                        <img src="<?=base_url('/assets/img/jamu.jpg')?>" alt="jamu" width='150px' height='150px'>
                      <p class="card-text">2</p>
                      <a href="<?=base_url('/dataJamuAdmin')?>" class="btn btn-outline-primary"><i class='bx bx-bullseye'></i></a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card text-center">
                  <div class="card-header"><h5><strong>Data Users</strong></h5></div>
                    <div class="card-body">
                    <img src="<?=base_url('/assets/img/user.jpg')?>" alt="user" width='150px' height='150px'>
                      <p class="card-text">10</p>
                      <a href="<?=base_url('/dataUserAdmin')?>" class="btn btn-outline-primary"><i class='bx bx-bullseye'></i></a>
                    </div>
                  </div>
                </div>
</div>
     </div>
<?=$this->endSection();?>