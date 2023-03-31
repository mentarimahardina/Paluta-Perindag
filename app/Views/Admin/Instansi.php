<?= $this->include('Admin/Layout/Sidemenu') ?>

<style>
  blockquote {
    border-bottom: 0.7rem solid grey;
  }

  .center {
    text-align: center;
  }
</style>
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Data Instansi</h3>
  </div>
  <form action="settingprofile" method="post" enctype="multipart/form-data">
    <div class="card-body">
      <blockquote>
        <div class="card-header">
          <h3>Kantor</h3>
        </div>
        <div class="mb-3 center">
          <input type="file" accept="image/png, image/jpeg" name="kantor_foto" onchange="readURLkantorfoto(this)" class="form-control-file border">
          <img id="kantorfoto" name="kantorfoto" src="<?= $kantor_foto == '' ? 'https://via.placeholder.com/300/b9acac/FFFFFF?text=Masukkan Gambar' : $kantor_foto ?>" class="img-fluid mb-2" height="360" />
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Judul Aplikasi</label>
              <input type="text" name="name" value="<?= $title ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama website di headerbar dan di browser">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">sub Judul Aplikasi</label>
              <input type="text" name="subname" value="<?= $subtitle ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama kabupaten">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Tentang</label>
              <textarea id="tentang" type="text" name="tentang" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama kabupaten" rows="5"><?= $tentang ?></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Alamat</label>
              <input type="text" name="alamat" value="<?= $alamat ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama kabupaten">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Link Peta</label>
              <input type="text" name="linkmap" value="<?= $linkMap ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama kabupaten">
            </div>

          </div>

        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Telp</label>
              <input type="text" name="telp" value="<?= $telp ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama kabupaten">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">E-mail</label>
              <input type="email" name="email" value="<?= $email ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama kabupaten">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Youtube</label>
              <input type="text" name="twitter" value="<?= $twitter ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama kabupaten">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Instagram</label>
              <input type="text" name="instagram" value="<?= $instagram ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama kabupaten">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Facebook</label>
              <input type="text" name="facebook" value="<?= $facebook ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama kabupaten">
            </div>
          </div>
        </div>
      </blockquote>
      <blockquote>

        <div class="card-header">
          <h3>Pimpinan</h3>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="mb-3 center">
              <label for="exampleInputFile">Foto Pimpinan</label><br>
              <img  src="<?= $pimpinan_foto == '' ? 'https://via.placeholder.com/300/b9acac/FFFFFF?text=Masukkan Gambar' :  $pimpinan_foto ?>" class="img-fluid mb-2" style="height:170px" />
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Pimpinan</label>
              <p style="font-size: 1.3em;" class="pl-2"><?= $pimpinan_nama ?></p>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nomor Induk Pegawai</label>
              <p style="font-size: 1.3em;" class="pl-2"><?= $pimpinan_nip ?></p>
            </div>
           
          </div>
        </div>
      </blockquote>
      <blockquote>
      <div class="card-header">
          <h3>Tugas Pokok & Fungsi</h3>
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">Tugas Pokok</label>
          <textarea type="text" id="tugaspokok" name="tugaspokok" class="form-control" > <?= $tugas_pokok ?></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Fungsi</label>
          <textarea type="text" id="tugasfungsi" name="tugasfungsi" class="form-control"><?= $tugas_fungsi ?></textarea>
        </div>
        <!-- <div class="form-group">
        <label for="exampleInputFile">SERTIFIKAT PENDAFTARAN PENDIRIAN BADAN HUKUM </label><br>
        <div class="mb-3 center">
          <input type="file" accept="application/pdf" name="kantor_foto" onchange="readURLkantorfoto(this)" class="form-control-file border">
          <iframe id="kantorfoto" name="kantorfoto" src="<?= $kantor_foto?>" style="width:70vw;height:70vh"></iframe>
       </div>
        </div> -->
      </blockquote>



    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
<?= $this->include('Admin/Layout/Footer') ?>