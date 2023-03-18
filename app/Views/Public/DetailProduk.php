<?= $this->include('Public/Layout/Header') ?>
<div class="content container">
    <div class="container p-1 ">
        <div class="center">
            <img src="<?= $image != '' ? base_url('Assets/produk/' . $image) : 'https://via.placeholder.com/250/b9acac/FFFFFF?text=Kosong' ?>"
                style="height:100%;">

        </div>
        <h4 class="mb-sm"><strong>
                <?= $title ?>
            </strong></h4>
        <p><i class="fa fa-calendar"></i>
            <?= $created ?> <i class="fa fa-user"></i>
            <?= $author ?>
        </p>
        <?= $content ?>
    </div>

</div>
<div class="content container" hidden>
    <div class="row">
        <div class="col-md-10">
            <div class="container p-1 ">
                <div class="center">
                    <img src="<?= $image != '' ? base_url('Assets/produk/' . $image) : 'https://via.placeholder.com/250/b9acac/FFFFFF?text=Kosong' ?>"
                        style="height:100%;">

                </div>
                <h4 class="mb-sm"><strong>
                        <?= $title ?>
                    </strong></h4>
                <p><i class="fa fa-calendar"></i>
                    <?= $created ?> <i class="fa fa-user"></i>
                    <?= $author ?>
                </p>
                <?= $content ?>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?= $this->include('Public/Layout/Footer') ?>