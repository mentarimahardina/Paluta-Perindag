<!DOCTYPE html>
<html lang="en" id="myDIV" onscroll="myFunction()">

<head>
    <meta charset="UTF-8">
    <title>
        <?= $setting_title ?>
    </title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('Assets/settings/' . $setting_logo) ?>" />
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../../plugins/ekko-lightbox/ekko-lightbox.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../CSS/main.css">
</head>
<style>
</style>
<header>
    <div class="fixed-top" style="top:auto;bottom:1em;left:1em;right:auto;">
        <div class="bg-primary" style='width: 4em;padding:1em;border-radius: 50%;text-align: center;'
            data-toggle="dropdown" href="#" id="tombolkritik">
            <i class="fa fa-comments" style="font-size:1.5em"></i>
        </div>
        <div class="dropdown-menu pt-2 px-1 bg-primary" id="kritik" hidden>
            <h5> Kirim Pesan/Kritik/Saran</h5>
            <form action="kirimPesan" method="post" enctype="multipart/form-data">
                <input hidden type="text" name="jenis" value="kirimpesan">
                <hr>
                <div class="rounded bg-light p-2">
                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <input type="text" name="nama_pesan" id="nama_pesan" class="form-control"
                            placeholder="Masukkan nama..." required />
                    </div>
                    <div class="form-group">
                        <label class="control-label">NIK</label>
                        <input type="number" pattern="\d*" minlength="8" maxlength="16" name="nik" id="nik"
                            class="form-control" placeholder="Masukkan NIK..." required />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="email" name="email_pesan" id="email_pesan" class="form-control"
                            placeholder="Masukkan email..." required />
                    </div>
                    <div class="form-group mb-lg">
                        <label class="control-label">Isi Pesan</label>
                        <textarea rows="2" name="pesan_pesan" id="pesan_pesan" class="form-control"
                            placeholder="Masukkan isi pesan..." required></textarea>
                    </div>
                    <div class="form-group ">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <div class="fixed-top" style="top:auto;bottom:1em;left: auto;right: 1em;">
        <div class="bg-warning" style='width: 4em;padding:1em;border-radius: 50%;text-align: center;'
            data-toggle="dropdown" href="#" id="tombolpoling">
            <i class="fa fa-smile-o" style="font-size:1.5em"></i>
        </div>
        <div class="dropdown-menu " id="tombolpolings" hidden>

            <div class="poling text-success">
                <a data-toggle="modal" data-target="#poling" data-poling="1" data-polingtext="Puas">
                    <i class="fa fa-smile-o"></i> Puas
                </a>
            </div>
            <div class="poling text-primary">
                <a data-toggle="modal" data-target="#poling" data-poling="2" data-polingtext="Biasa saja">
                    <i class="fa fa-meh-o"></i> Biasa Saja
                </a>
            </div>

            <div class="poling text-danger">
                <a data-toggle="modal" data-target="#poling" data-poling="3" data-polingtext="Tidak Puas">
                    <i class="fa fa-frown-o"></i> Tidak Puas
                </a>
            </div>
        </div>
    </div>


</header>

<body>
    <div class="fixed-top">
        <div class="pb-2" id='topheader'>
            <a href="<?= base_url() ?>">
                <img height="44" title="Logo" src="<?= base_url('Assets/settings/' . $setting_logo) ?>">
                <h6>
                    <h5>
                        <?= $setting_title ?>
                    </h5>
                    <?= $setting_subtitle ?>
                </h6>
            </a>
        </div>

        <div id="menu">
            <ul>
                <li class="menu-toggle w-100">
                    <div class="row">
                        <div class="col-11">
                            <a href="<?= base_url() ?>">
                                <div class="logoheader row">
                                    <div class="col-1">
                                        <img height="45" src="<?= base_url('Assets/settings/' . $setting_logo) ?>">
                                    </div>
                                    <div class="col-11">
                                        <p class="m-0">
                                            <?= $setting_title ?>
                                        </p>
                                        <p class="m-0">
                                            <?= $setting_subtitle ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-1">
                            <button onclick="toggleMenu();">&#9776;</button>
                        </div>
                    </div>
                </li>
            </ul>
            <?PHP
            foreach ($menus as $key => $item) { ?>
                <li class="menu-item hidden <?= $item['menu_title'] == $page ? 'active' : '' ?> dropdown"
                    <?= $item['menu_parent_id'] != 0 ? 'hidden' : '' ?>>
                    <a href="<?= $item['menu_target'] != '_parent' ? $item['menu_url'] : '' ?>"
                        target="<?= $item['menu_target'] ?>" class="dropbtn">
                        <?= strtoupper($item['menu_title']) ?>
                    </a>
                    <div class="dropdown-content">
                        <?php
                        for ($i = 0; $i < count($menus); $i++) {
                            ?>
                            <?php if ($item['id'] == $menus[$i]['menu_parent_id']) { ?>
                                <a class="submenu" href="<?= $menus[$i]['menu_url'] ?>" target="<?= $menus[$i]['menu_target'] ?>">
                                    <?= $menus[$i]['menu_title'] ?></a>
                                <?php
                            }
                        } ?>
                    </div>
                </li>
            <?php } ?>
        </div>
    </div>