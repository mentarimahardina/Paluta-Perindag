<?= $this->include('Admin/Layout/Sidemenu') ?> <div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-md-10">
          
        <h4 class="m-0 font-weight-bold text-primary">
        <a href="produk" class="text-dark"> 
                    <i class="fa fa-long-arrow-alt-left"></i>
                </a>
          <img src="
						<?= $produk['image'] ? $produk['image'] : 'https://via.placeholder.com/300/b9acac/FFFFFF?text=Kosong' ?>" style="width: 5vh ;"> List Harga <?= $produk['name']?>
        </h4>
      </div>
      <div class="col-md-2" style="text-align: end;">
        <button type="submit" class="btn btn-primary" href="#" data-toggle="modal" data-target="#updateProduk">Update Harga</button>
      </div>
    </div>
  </div> <?php

  use App\Models\ModelUsers;

  if (session()->getFlashdata('true') || session()->getFlashdata('false')) {
    if (session()->getFlashdata('true')) { ?> <div class="alert alert-success"> <?= session()->getFlashdata('true') ?> </div> <?php } else {
      ?> <div class="alert alert-danger"> <?= session()->getFlashdata('false') ?> </div> <?php
    }
  } ?>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3> <?= $termahal?> </h3>
              <p>Harga Tertinggi</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3> <?= $termurah?> </h3>
              <p>Harga Terendah</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3> <?= $rata?> </h3>
              <p>Harga Rata-Rata</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3> <?= $terkini?> </h3>
              <p>Harga Hari Terkini</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <table id="tbInfo" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th style="width: 3%;">No.</th>
          <th>Tanggal</th>
          <th>Harga</th>
          <th>Pendata</th>
          <th style="width:7em">aksi</th>
        </tr>
      </thead>
      <tbody>
        <?PHP
        foreach ($data as $key => $item) {
          
          $model = new ModelUsers();
          $nameUser = $model->where('id', $item['create_by'])->first();
          ?>
        <tr>
          <td> <?= $key + 1 ?> </td>
          <td> <?= $item['date']; ?> </td>
          <td> <?= $item['price']; ?> </td>
          <td> <?= $nameUser['user_name']; ?> </td>
          <td style="text-align: center;">
            <a data-toggle="modal" id="produkedit" data-target="#produk-edit" data-id="
								<?= $item['id'] ?>" class="btn btn-warning">
              <i class="fas fa-edit"></i>
            </a>
            <a data-toggle="modal" id="produkdel" data-target="#produk-delete" data-id="
								<?= $item['id'] ?>" class="btn btn-danger">
              <i class="fas fa-trash"></i>
            </a>
          </td>
        </tr>
        <?PHP
        }
        ?>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- ./row -->
<!-- /.container-fluid -->
<!-- /.content --> <?= $this->include('Admin/Layout/Footer') ?>