<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>OPD | Log in</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url('Assets/settings/' . $setting_logo) ?>" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <!-- oncontextmenu="return false" -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-12 col-md-5 m-7">
        <div class="text-center bg-pastel-green p-2">
          <div class="login-logo">
            <h4><?= $setting_title ?></h4>
            <h5><?= $setting_subtitle ?></h5>
          </div>
        </div>
        <div class="card">
          <div class="row p-4">
            <div class="col-md-4" style="text-align: center;align-self:center;">
              <img src="Assets/settings/logo.jpg" style="height:15em">
            </div>
            <div class="col-md-8 p-0">
              <div class="card o-hidden border-0" style="box-shadow: 0 1rem 1rem rgba(0,0,0,0.3)!important;">
                <div class="card-body p-0">

                  <div class="p-4" style="background-color: #e9e3e3;border-style: solid;border-color: #e9e3e3;">
                    <h4 class="login-box-msg"><b>MASUK</b></h4>
                    <?php if (session()->getFlashdata('msg')) : ?>
                      <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif; ?>

                    <form action="auth" method="post">
                      <div class="input-group mb-3">
                        <input name="username" type="text" class="form-control" placeholder="Nama Pengguna">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Kata Sandi">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-success btn-block">Masuk</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>