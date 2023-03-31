<?= $this->include('Admin/Layout/Sidemenu') ?>
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-md-10">
        <h4 class="m-0 font-weight-bold text-primary">Daftar Produk</h4>
      </div>
      <div class="col-md-2" style="text-align: end;" <?= $type=='super_user'?'':'hidden'?>>
        <button type="submit" class="btn btn-primary" href="#" data-toggle="modal" data-target="#tambahbarang">Tambah
          Produk</button>
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
          <th>Nama</th>
          <th>Deskripsi</th>
          <th>Satuan</th>
          <th>Foto</th>
          <th>aksi</th>
        </tr>
      </thead>
      <tbody>
        <?PHP
        foreach ($data as $key => $item) {

          $model = new ModelUsers();
          $nameUser = $model->where('id', $item['created_by'])->findAll();
          ?>
          <tr>
            <td>
              <?= $key + 1 ?>
            </td>
            <td>
              <?= $item['name']; ?>
            </td>
            <td>
              <?= $item['deskripsi']; ?>
            </td>
            <td>
              <?= $item['type']; ?>
            </td>
            <td><img
                src="<?= $item['image'] ? $item['image'] : 'https://via.placeholder.com/300/b9acac/FFFFFF?text=Kosong' ?>"
                style="width: 5vw ;"></td>
            <td style="text-align: center;">

              <form action="produk" method="post">
                <input value="<?= $item['id'] ?>" name="id" hidden>
                <button type="submit" class="btn btn-success"><i class="fas fa-money"></i></button>
                 <a 
                  class="btn btn-primary"  data-toggle="modal" id="produkinfo" data-target="#produk-info" data-name="<?= $item['name'] ?>"
                  data-image="<?= $item['image'] ?>" data-price="<?= $item['type'] ?>"
                  data-deskripsi="<?= str_replace('"', "'", $item['deskripsi']) ?>"
                  data-createdat="<?= $item['created_at'] ?>" data-createdby="<?= $nameUser[0]['user_full_name'] ?>"><i class="fas fa-info"></i></a>

                <a data-toggle="modal" id="produkedit" data-target="#produk-edit" data-id="<?= $item['id'] ?>"
                  data-name="<?= $item['name'] ?>" data-image="<?= $item['image'] ?>" data-price="<?= $item['type'] ?>"
                  data-deskripsi="<?= str_replace('"', "'", $item['deskripsi']) ?>"
                  data-createdat="<?= $item['created_at'] ?>" data-createdby="<?= $nameUser[0]['user_full_name'] ?>"
                  class="btn btn-warning"><i class="fas fa-edit"></i></a>
                <a data-toggle="modal" id="produkdel" data-target="#produk-delete" data-id="<?= $item['id'] ?>"
                  data-image="<?= $item['image'] ?>" data-name="<?= $item['name'] ?>" class="btn btn-danger" hidden><i
                    class="fas fa-trash"></i></a>
              </form>

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