<?= $this->include('Public/Layout/Header') ?>
<!-- ======= Slider Section ======= -->
<div id="demo" class="carousel slide carousel-fade" data-ride="carousel">

    <div class="carousel-inner">
        <?php foreach ($slider as $key => $value) { ?>
            <div class="carousel-item <?= $key == 0 ? 'active' : ''; ?>">
                <img src="<?= base_url('Assets/slider/' . $value['post_image']) ?>" class="w-100 img-slider"
                    style="filter:brightness(60%)" />
                <div class="carousel-caption bottom-to-up">
                    <h1 class="title">
                        <?= $value['post_title'] ?>
                    </h1>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<div class="bg-light p-4 center" style="text-align:-webkit-center">
    <div class="title m-2">
        <h3>WISATA</h3>
    </div>
    <?php foreach ($unit as $key => $value) {
        if ($key % 2 == 0) { //Kondisi
            ?>
            <div class="row w-95">
                <div class="col-md-6">
                    <img src="Assets/unit/<?= $value['module_img'] ?>" style="width:100%;max-height: 80vh;"
                        class="img-fluid mb-2 content-img" alt="<?= $value['module_name'] ?>" />
                </div>
                <div class="col-md-6 center">
                    <h2 class="btn mt-2" style="border: 1px solid #000000!important;">
                        <?= $value['module_name'] ?>
                    </h2>
                    <p>
                        <?= $value['module_url'] ?>
                    </p>
                </div>
            </div>

            <?php
        } else {
            ?>
            <div class="row w-95">

                <div class="col-md-6 center">
                    <h2 class="btn mt-2" style="border: 1px solid #000000!important;">
                        <?= $value['module_name'] ?>
                    </h2>
                    <p>
                        <?= $value['module_url'] ?>
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="Assets/unit/<?= $value['module_img'] ?>" style="width:100%; max-height: 80vh;"
                        class="img-fluid mb-2 content-img" alt="<?= $value['module_name'] ?>" />
                </div>
            </div>
        <?php }
    }

    ?>


</div>
<!-- <div class="bg-light p-4 center" style="text-align:-webkit-center">
    <div class="title m-2">
        <h3>UNIT USAHA BUMDES</h3>
    </div>
    <div class="row w-80">
        <?php foreach ($unit as $key => $value) { ?>

            <div class="col-md-4 p-4">
                <img src="Assets/unit/<?= $value['module_img'] ?>" class="img-fluid mb-2 content-img"
                    alt="<?= $value['module_name'] ?>" max-width="400" />
                <h2 class="btn mt-2" style="border: 1px solid #000000!important;">
                        <?= $value['module_name'] ?>
                </h2>
                <p>
                        <?= $value['module_url'] ?>
                </p>
            </div>
        <?php }
        ?>
    </div>
</div> -->
<div class="bg-light p-4 center" style="text-align:-webkit-center;background-color: #a0b2c3!important;">
    <div class="title m-2">
        <h3>TEAM</h3>
    </div>
    <div class="row w-80">
        <?php foreach ($staff as $key => $value) { ?>

            <div class="col-md-3 p-2 ">
                <div class="bg-light shadow">
                    <img src="<?= $value['photo'] != '' ? 'Assets/staff/' . $value['photo'] : 'https://via.placeholder.com/180/b9acac/FFFFFF?text=Masukkan Gambar' ?>"
                        class="img-fluid mb-2 content-img w-100" alt="<?= $value['photo'] ?>" />
                    <div class="p-2 post-content">
                        <h6 class="mt-2">
                            <?= $value['full_name'] ?>
                        </h6>
                        <p>
                            <?= $value['jabatan'] ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php }
        ?>

    </div>

</div>

<div class="bg-light p-4 center" style="text-align:-webkit-center;">
    <div class="title m-2">
        <h3>EVENT</h3>
    </div>
    <div class="row w-90">
        <?php for ($i = 0; $i < (count($produk)>=4?4:count($produk)); $i++) { ?>
            <div class="col-md-4 p-2">
                <div class="card content-img">
                    <div class="card-img">
                        <img src="<?= $produk[$i]['image'] != '' ? 'Assets/produk/' . $produk[$i]['image'] : 'https://via.placeholder.com/250/b9acac/FFFFFF?text=Kosong' ?>"
                            style="height:18em;width:100%">
                    </div>
                    <div class="post-content p-1 center">
                      
                        <h5 class="text-left ">
                                    <?= $produk[$i]['name'] ?>
                                </h5>
                                <p >
                                    <?= $produk[$i]['location'] ?>
                        </p>
                   

                    </div>

                    <!-- <a href="<?= base_url('produk/' . $produk[$i]['name']) ?>" ?>
                        <div class="card-footer p-2 center" id="button-produk">
                            <i class="fa fa-link"></i> Detail Produk
                        </div>

                    </a> -->
                </div>
            </div>

        <?php }
        ?>

    </div>

</div>
</div>

<!-- <script>
    // $(document).ready(function () {
    // //     myFunction();
    // console.log( $(document).documentElement.scrollTop);

    // })
    window.onscroll = function () {
        myFunction();

        // console.log(document.documentElement.scrollTop);
    
    };

    function myFunction() {
        if (document.documentElement.scrollTop > 113) {
            $("#menu").addClass("header-scrolled");

        } else {
            $("#menu").removeClass("header-scrolled");

        }
    }
</script> -->
<?= $this->include('Public/Layout/Footer') ?>