<?= $this->include('Public/Layout/Header') ?>
<div class="content">

    <div class="container pt-3">
        <h4 class="mb-sm heading-primary"><strong>Produk</strong></h4>

        <div class="row">
            <?php

            use App\Models\ModelProduk;

            $models = new ModelProduk();
            $batas = 20;
            $halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $data = $models->findAll();
            $jumlah_data = count($data);
            $total_halaman = ceil($jumlah_data / $batas);

            $data_pegawai = $models->orderBy('created_at', 'asc')->findAll($batas, $halaman_awal);
            $nomor = $halaman_awal + 1;

            foreach ($data_pegawai as $key => $item) {
                ?>
                <div class="col-md-3 p-2">
                    <!-- <a href="" id="produk" data-id="<?= $item['id'] ?>" data-name="<?= $item['name'] ?>"> -->
                    <div class="card content-img">
                        <div class="card-img">
                            <img src="<?= $item['image'] != '' ? 'Assets/produk/' . $item['image'] : 'https://via.placeholder.com/250/b9acac/FFFFFF?text=Kosong' ?>"
                                style="height:18em;width:100%">
                        </div>
                        <div class="post-content p-2 center">
                            <h6>
                                <?php
                                $konten = strip_tags($item['name']);
                                $long = 50;
                                $link = base_url();
                                if (strlen($konten) > $long) {
                                    $potongkonten = substr($konten, 0, $long);
                                    $akhirspasi = strrpos($potongkonten, ' ');
                                    $konten = $akhirspasi ? substr($potongkonten, 0, $akhirspasi) : substr($potongkonten, 0);
                                }
                                echo $konten . '...';

                                ?>
                            </h6>
                            <div class="row  pt-3">
                                <div class="col-md-6">
                                    <h6 class="text-left">
                                        <?= $item['price'] ?>
                                    </h6>
                                </div>
                                <div class="col-md-6">
                                    <!-- <a class="btn btn-success"
                                                                    href="<?= base_url('produk/' . $item['name']) ?>" ?><i class="fa fa-whatsapp"></i>
                                                                    Det</a> -->
                                </div>
                            </div>

                        </div>

                        <a href="<?= base_url('produk/' . $item['name']) ?>" ?>
                            <div class="card-footer p-2 center" id="button-produk">
                                <i class="fa fa-link"></i> Detail Produk
                            </div>

                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>

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


    </div>
</div>
<?= $this->include('Public/Layout/Footer') ?>

</body>

</html>