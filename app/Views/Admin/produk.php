<?= $this->include('Admin/Layout/Sidemenu') ?>
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-md-10">
        <h4 class="m-0 font-weight-bold text-primary">Daftar Wisata</h4>
      </div>
      <div class="col-md-2" style="text-align: end;">
        <button type="submit" class="btn btn-primary" href="#" data-toggle="modal" data-target="#tambahbarang">Tambah
          Wisata</button>
      </div>
    </div>

  </div>
  <?php

  use App\Controllers\Fungsi;
  use App\Models\ModelUsers;

  if (session()->getFlashdata('true') || session()->getFlashdata('false')) {
    if (session()->getFlashdata('true')) { ?>
      <div class="alert alert-success">
        <?= session()->getFlashdata('true') ?>
      </div>
    <?php } else {
      ?>
      <div class="alert alert-danger">
        <?= session()->getFlashdata('false') ?>
      </div>
      <?php
    }
  } ?>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="tbInfo" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th style="width: 3%;">No.</th>
          <th>Tipe Wisata</th>
          <th>Nama Wisata</th>
          <!-- <th>Akamat</th> -->
          <th>Foto</th>
          <!-- <th>aksi</th> -->
          <th style="width:7em">aksi</th>
        </tr>
      </thead>
      <tbody>
        <?PHP
        foreach ($data as $key => $item) {
          ?>
          <tr>
            <td><?PHP echo $key + 1 ?></td>
            <td><?= $item['type']; ?></td>
            <td>
              <?php
              $model = new ModelUsers();
              $nameUser = $model->where('id', $item['created_by'])->findAll();
              echo $item['name'];
              ?>
            </td>
<!-- <td><?= $item['location']?></td> -->
            <td><img
                src="<?= $item['image'] ? 'Assets/produk/' . $item['image'] : 'https://via.placeholder.com/300/b9acac/FFFFFF?text=Kosong' ?>"
                style="width: 10vw ;"></td>
            <td style="text-align: center;">
              <a data-toggle="modal" id="produkinfo" data-target="#produk-info" data-name="<?= $item['name'] ?>"
                data-image="<?= $item['image'] ?>" data-price="<?= $item['type'] ?>"
                data-deskripsi="<?= str_replace('"', "'", $item['deskripsi']) ?>"
                data-pricesales="<?= $item['location'] ?>" data-rating="<?= $item['rating'] ?>"
                data-createdat="<?= $item['created_at'] ?>" data-createdby="<?= $nameUser[0]['user_full_name'] ?>"
                class="btn btn-primary"><i class="fas fa-info"></i></a>
              <a data-toggle="modal" id="produkedit" data-target="#produk-edit" data-id="<?= $item['id'] ?>"
                data-name="<?= $item['name'] ?>" data-image="<?= $item['image'] ?>" data-price="<?= $item['type'] ?>"
                data-deskripsi="<?= str_replace('"', "'", $item['deskripsi']) ?>"
                data-pricesales="<?= $item['location'] ?>" data-rating="<?= $item['rating'] ?>"
                data-createdat="<?= $item['created_at'] ?>" data-createdby="<?= $nameUser[0]['user_full_name'] ?>"
                class="btn btn-warning"><i class="fas fa-edit"></i></a>
              <a data-toggle="modal" id="produkdel" data-target="#produk-delete" data-id="<?= $item['id'] ?>"
              data-image="<?= $item['image'] ?>" data-name="<?= $item['name'] ?>" 
              class="btn btn-danger"><i class="fas fa-trash"></i></a>

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

<!-- /.content -->
<?= $this->include('Admin/Layout/Footer') ?>