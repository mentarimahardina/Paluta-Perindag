<?= $this->include('Public/Layout/Header') ?>
<div class="content">
    <div class="container pt-3">
        <h4 class="mb-sm heading-primary"><strong>
                <?= strtoupper($type) ?>
            </strong></h4>
        <!-- 
        <div class="row mb-3">
            <div class="col-md-9"> -->
        <?php

        use App\Models\ModelProduk;

        $models = new ModelProduk();
        $batas = 10;
        $halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

        $previous = $halaman - 1;
        $next = $halaman + 1;

        $data = $models->where('type', $type)->findAll();
        $jumlah_data = count($data);
        $total_halaman = ceil($jumlah_data / $batas);

        $data_berita = $models->where('type', $type)->orderBy('created_at', 'asc')->findAll($batas, $halaman_awal);
        $nomor = $halaman_awal + 1;

        foreach ($produk as $key => $item) {

            // foreach ($news as $key => $item) {
            ?>
            <article class="post post-medium">
                <div class="row">
                    <div class="col-md-5 center">
                        <div class="post-image">
                            <div class="image16-9">
                                <a href="<?= base_url('wisata/' . $item['name']) ?>"><img class="img-responsive"
                                        style="max-width: 20vw;"
                                        src="<?= base_url('Assets/produk/' . $item['image']) ?>"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="post-content">
                            <h5 class="mt-xs mb-xs beritaberandajudul"><a class="text-dark"
                                    href="<?= base_url('wisata/' . $item['name']) ?>" title="<?= $item['name'] ?>"><?= $item['name'] ?></a></h5>
                            <p class="mb-none beritaberandaisi" style="text-align:justify">
                                <?php
                                $konten = strip_tags($item['deskripsi']);
                                $long = 200;
                                $link = base_url('berita');
                                if (strlen($konten) > $long) {
                                    $potongkonten = substr($konten, 0, $long);
                                    $akhirspasi = strrpos($potongkonten, ' ');
                                    $konten = $akhirspasi ? substr($potongkonten, 0, $akhirspasi) : substr($potongkonten, 0);
                                }
                                echo $konten;
                                ?>
                            </p>
                            <i class="fa fa-calendar"></i>
                            <?= date('d M y H:i:s', strtotime($item['created_at'])) ?>
                        </div>
                    </div>

                </div>
            </article>

            <?php
        } ?>
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if ($halaman > 1) {
                        echo "href=?halaman=" . $previous;
                    } ?>>Sebelumnya</a>
                </li>
                <?php
                for ($x = 1; $x <= $total_halaman; $x++) {
                    ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php if ($halaman < $total_halaman) {
                        echo "href=?halaman=" . $next;
                    } ?>>Selanjutnya</a>
                </li>
            </ul>
        </nav>
        <!-- </div> -->
        <!-- <div class="col-md-3">
                <div class="">
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Terbaru</a>
                        </li>
                    </ul>
                    <div class="tab-content p-2 card" id="custom-content-below-tabContent">
                        <div class="tab-pane p-2 fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

    </div>
</div>
<?= $this->include('Public/Layout/Footer') ?>

</body>

</html>