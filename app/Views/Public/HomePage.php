<?= $this->include('Public/Layout/Header') ?>
<style>
  
  .vertical-scrollable > .row {
         height:500px;
            
            overflow-y: scroll;
                }
        .remove {
            visibility: hidden;
        }

        .pertama {
            display: block;
			
        }
        .pertama > * {
            margin: 0;
            padding: 0;
        }

		.gambar {
			width: 28px;
		}

		.icon-harga {
			width: 15px;
			display: block;
			margin-left: auto;
			margin-right: auto;
		}

		.satuan {
			text-align: center;
			font-size: 12px;
            color: black;
		}


		.rata-tengah {
			text-align: center;
		}

	.jarak {
		padding: 10px;
        color: black;
	}	

	tr.rj-bordered {
    border-bottom: 1px solid #625D5D;
	}

	.rj-judul {
	 text-align: center;
	 display: flex;
	 justify-content: center;
	 align-items: center;
     border: 0px solid #625D5D;
     border-radius: 10px;
	 margin-bottom: 10px;
	}
                
    .font-size-kategori {
     font-size : 13px; 
     color:black;
     }
     
     .font-size-jenis {
     font-size: 11px;
     color:grey;
    }

    tbody {
    height: 100px;
    overflow-y: auto;
    overflow-x: hidden;
}

                
     
        .bahanpokok-icon {
            width: 30px;
            height: 30px;
        }
   

</style>
<!-- ======= Slider Section ======= -->
<div id="demo" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="
				<?= base_url($setting_fotokantor) ?>" class="w-100 img-slider" style="filter:brightness(60%)" />
      <!-- <blockquote> -->
      <div class="carousel-caption bottom-to-up">
        <h1 class="title">Website Resmi</h1>
        <h1 class="subtitle"> <?= $setting_title ?> <br> <?= $setting_subtitle ?> </h1>
      </div>
      <!-- </blockquote> -->
    </div>
  </div>
</div>
<!-- 
<div id="demo" class="carousel slide carousel-fade" data-ride="carousel"><div class="carousel-inner">
		<?php foreach ($slider as $key => $value) { ?><div class="carousel-item 
		<?= $key == 0 ? 'active' : ''; ?>"><img src="<?= base_url('Assets/slider/' . $value['post_image']) ?>" class="w-100 img-slider"
                    style="filter:brightness(60%)" /><div class="carousel-caption bottom-to-up"><h1 class="title">
		<?= $value['post_title'] ?></h1><h1 class="subtitle">
		<?= $value['post_content'] ?></h1></div></div>
		<?php } ?></div></div> -->
<div class="container p-4">
  <div class="row">
    <div class="col-md-8 bg-light"> <?php foreach ($news as $key => $value) {
                ?> <img src="Assets/post/
						<?= $value['post_image'] ?>" style="width:100%;" class="img-fluid mb-2 content-img" alt="
						<?= $value['post_title'] ?>" />
      <h2 class="btn mt-2" style="border: 1px solid #000000!important;"> <?= $value['post_title'] ?> </h2> <?php
            }
            ?>
    </div>
    <div class="col-md-4 bg-dark p-0">
      <div class="card">
        <div class="card-header p-0">
          <img src="Assets/settings/bahanpokok.png" class="content-img w-100" />
        </div>
        <div class="card-body p-1">
         
          <table id="listSembako" class="table table-hover">

            <thead>
              <tr>
                <th class="text-dark col-1 ">icon</th>
                <th class="text-dark col-3">Nama</th>
                <th class="text-dark col-2">Harga</th>
                <th class="text-dark col-3 rata-tengah">Kemarin</th>
                <th class="text-dark col-3 rata-tengah">Hari Ini</th>
              </tr>
            </thead>
            <tbody class="rj-bahanpokok">
              <tr class="rj-bordered">
                <td>
                  <img src="https://cdn-icons-png.flaticon.com/512/6127/6127845.png" class="bahanpokok-icon">
                </td>
                <td class="pertama">
                  <h4 class="font-size-kategori">Ketela</h4>
                  <p class="font-size-jenis"> Ketela Pohon </p>
                  <p class="font-size-jenis">/kg</p>
                </td>
                <td>
                  <div class="pertama" style="justify-content:center;">
                    <span>
                      <img src="https://cdn-icons-png.flaticon.com/512/4721/4721635.png" class="icon-harga" <="" span="">
                      <p class="satuan">33 %</p>
                    </span>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">4000</p>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">6000</p>
                  </div>
                </td>
              </tr>
              <tr class="rj-bordered">
                <td>
                  <img src="https://cdn-icons-png.flaticon.com/512/4060/4060535.png" class="bahanpokok-icon">
                </td>
                <td class="pertama">
                  <h4 class="font-size-kategori">Cabai Rawit</h4>
                  <p class="font-size-jenis"> Cabai Rawit </p>
                  <p class="font-size-jenis">/kg</p>
                </td>
                <td>
                  <div class="pertama" style="justify-content:center;">
                    <span>
                      <img src="https://cdn-icons-png.flaticon.com/512/4721/4721635.png" class="icon-harga" <="" span="">
                      <p class="satuan">11 %</p>
                    </span>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">40000</p>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">45000</p>
                  </div>
                </td>
              </tr>
          
              <tr class="rj-bordered">
                <td>
                  <img src="https://cdn-icons-png.flaticon.com/512/755/755269.png" class="bahanpokok-icon">
                </td>
                <td class="pertama">
                  <h4 class="font-size-kategori">Kacang</h4>
                  <p class="font-size-jenis"> Kacang Tanah </p>
                  <p class="font-size-jenis">/kg</p>
                </td>
                <td>
                  <div class="pertama" style="justify-content:center;">
                    <span>
                      <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi4hy11ysfrgh-i2wYJapKebk3aKckQKgDOm6w-79gz85P15jHsEDjRLelBPAR0gQe1B06UHkRNwg_8BmMMi5oMu4xuG_C7N5nha60AxZIk2VNVPvCcrz2kzCA3imswINtlABMUDXXObGbCXM_HHrIX_j5Q-kVgx3GbM5FuQ4Enqt8cEH7hWCt7cA-I/s512/top-down.png" class="icon-harga" <="" span="">
                      <p class="satuan">0 %</p>
                    </span>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">28000</p>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">28000</p>
                  </div>
                </td>
              </tr>
              <tr class="rj-bordered">
                <td>
                  <img src="https://cdn-icons-png.flaticon.com/512/869/869655.png" class="bahanpokok-icon">
                </td>
                <td class="pertama">
                  <h4 class="font-size-kategori">Susu Kental Manis</h4>
                  <p class="font-size-jenis"> Kental Manis Kaleng </p>
                  <p class="font-size-jenis">/kaleng</p>
                </td>
                <td>
                  <div class="pertama" style="justify-content:center;">
                    <span>
                      <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi4hy11ysfrgh-i2wYJapKebk3aKckQKgDOm6w-79gz85P15jHsEDjRLelBPAR0gQe1B06UHkRNwg_8BmMMi5oMu4xuG_C7N5nha60AxZIk2VNVPvCcrz2kzCA3imswINtlABMUDXXObGbCXM_HHrIX_j5Q-kVgx3GbM5FuQ4Enqt8cEH7hWCt7cA-I/s512/top-down.png" class="icon-harga" <="" span="">
                      <p class="satuan">0 %</p>
                    </span>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">13000</p>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">13000</p>
                  </div>
                </td>
              </tr>
              <tr class="rj-bordered">
                <td>
                  <img src="https://cdn-icons-png.flaticon.com/512/783/783043.png" class="bahanpokok-icon">
                </td>
                <td class="pertama">
                  <h4 class="font-size-kategori">Ikan Asin</h4>
                  <p class="font-size-jenis"> Ikan Teri Asin </p>
                  <p class="font-size-jenis">/kg</p>
                </td>
                <td>
                  <div class="pertama" style="justify-content:center;">
                    <span>
                      <img src="https://cdn-icons-png.flaticon.com/512/6067/6067145.png" class="icon-harga" <="" span="">
                      <p class="satuan">-10 %</p>
                    </span>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">110000</p>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">100000</p>
                  </div>
                </td>
              </tr>
              <tr class="rj-bordered">
                <td>
                  <img src="https://cdn-icons-png.flaticon.com/512/3387/3387389.png" class="bahanpokok-icon">
                </td>
                <td class="pertama">
                  <h4 class="font-size-kategori">Garam Beryodium</h4>
                  <p class="font-size-jenis"> Halus </p>
                  <p class="font-size-jenis">/kg</p>
                </td>
                <td>
                  <div class="pertama" style="justify-content:center;">
                    <span>
                      <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi4hy11ysfrgh-i2wYJapKebk3aKckQKgDOm6w-79gz85P15jHsEDjRLelBPAR0gQe1B06UHkRNwg_8BmMMi5oMu4xuG_C7N5nha60AxZIk2VNVPvCcrz2kzCA3imswINtlABMUDXXObGbCXM_HHrIX_j5Q-kVgx3GbM5FuQ4Enqt8cEH7hWCt7cA-I/s512/top-down.png" class="icon-harga" <="" span="">
                      <p class="satuan">0 %</p>
                    </span>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">14000</p>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">14000</p>
                  </div>
                </td>
              </tr>
              <tr class="rj-bordered">
                <td>
                  <img src="https://cdn-icons-png.flaticon.com/512/2522/2522907.png" class="bahanpokok-icon">
                </td>
                <td class="pertama">
                  <h4 class="font-size-kategori">Bawang Putih</h4>
                  <p class="font-size-jenis"> Bawang Putih </p>
                  <p class="font-size-jenis">/kg</p>
                </td>
                <td>
                  <div class="pertama" style="justify-content:center;">
                    <span>
                      <img src="https://cdn-icons-png.flaticon.com/512/4721/4721635.png" class="icon-harga" <="" span="">
                      <p class="satuan">6 %</p>
                    </span>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">30000</p>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">32000</p>
                  </div>
                </td>
              </tr>
              <tr class="rj-bordered">
                <td>
                  <img src="https://cdn-icons-png.flaticon.com/512/4835/4835844.png" class="bahanpokok-icon">
                </td>
                <td class="pertama">
                  <h4 class="font-size-kategori">Bawang Merah</h4>
                  <p class="font-size-jenis"> Bawang Merah </p>
                  <p class="font-size-jenis">/kg</p>
                </td>
                <td>
                  <div class="pertama" style="justify-content:center;">
                    <span>
                      <img src="https://cdn-icons-png.flaticon.com/512/4721/4721635.png" class="icon-harga" <="" span="">
                      <p class="satuan">2 %</p>
                    </span>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">35000</p>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">36000</p>
                  </div>
                </td>
              </tr>
              <tr class="rj-bordered">
                <td>
                  <img src="https://cdn-icons-png.flaticon.com/512/2713/2713474.png" class="bahanpokok-icon" <="" td="">
                </td>
                <td class="pertama">
                  <h4 class="font-size-kategori">Telur</h4>
                  <p class="font-size-jenis"> Ayam Kampung </p>
                  <p class="font-size-jenis">/kg</p>
                </td>
                <td>
                  <div class="pertama" style="justify-content:center;">
                    <span>
                      <img src="https://cdn-icons-png.flaticon.com/512/6067/6067145.png" class="icon-harga" <="" span="">
                      <p class="satuan">-8 %</p>
                    </span>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">52500</p>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">49000</p>
                  </div>
                </td>
              </tr>
              <tr class="rj-bordered">
                <td>
                  <img src="https://cdn-icons-png.flaticon.com/512/2713/2713474.png" class="bahanpokok-icon" <="" td="">
                </td>
                <td class="pertama">
                  <h4 class="font-size-kategori">Telur</h4>
                  <p class="font-size-jenis"> Ayam Broiler </p>
                  <p class="font-size-jenis">/kg</p>
                </td>
                <td>
                  <div class="pertama" style="justify-content:center;">
                    <span>
                      <img src="https://cdn-icons-png.flaticon.com/512/6067/6067145.png" class="icon-harga" <="" span="">
                      <p class="satuan">-5 %</p>
                    </span>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">25600</p>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">24500</p>
                  </div>
                </td>
              </tr>
              <tr class="rj-bordered">
                <td>
                  <img src="https://cdn-icons-png.flaticon.com/512/628/628166.png" class="bahanpokok-icon">
                </td>
                <td class="pertama">
                  <h4 class="font-size-kategori">Daging</h4>
                  <p class="font-size-jenis"> Daging Ayam Kampung </p>
                  <p class="font-size-jenis">/kg</p>
                </td>
                <td>
                  <div class="pertama" style="justify-content:center;">
                    <span>
                      <img src="https://cdn-icons-png.flaticon.com/512/4721/4721635.png" class="icon-harga" <="" span="">
                      <p class="satuan">6 %</p>
                    </span>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">70000</p>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">75000</p>
                  </div>
                </td>
              </tr>
              <tr class="rj-bordered">
                <td>
                  <img src="https://cdn-icons-png.flaticon.com/512/628/628166.png" class="bahanpokok-icon">
                </td>
                <td class="pertama">
                  <h4 class="font-size-kategori">Daging</h4>
                  <p class="font-size-jenis"> Daging Ayam Broiler </p>
                  <p class="font-size-jenis">/kg</p>
                </td>
                <td>
                  <div class="pertama" style="justify-content:center;">
                    <span>
                      <img src="https://cdn-icons-png.flaticon.com/512/4721/4721635.png" class="icon-harga" <="" span="">
                      <p class="satuan">3 %</p>
                    </span>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">30000</p>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">31000</p>
                  </div>
                </td>
              </tr>
              <tr class="rj-bordered">
                <td>
                  <img src="https://cdn-icons-png.flaticon.com/512/628/628166.png" class="bahanpokok-icon">
                </td>
                <td class="pertama">
                  <h4 class="font-size-kategori">Daging</h4>
                  <p class="font-size-jenis"> Tetelan </p>
                  <p class="font-size-jenis">/kg</p>
                </td>
                <td>
                  <div class="pertama" style="justify-content:center;">
                    <span>
                      <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi4hy11ysfrgh-i2wYJapKebk3aKckQKgDOm6w-79gz85P15jHsEDjRLelBPAR0gQe1B06UHkRNwg_8BmMMi5oMu4xuG_C7N5nha60AxZIk2VNVPvCcrz2kzCA3imswINtlABMUDXXObGbCXM_HHrIX_j5Q-kVgx3GbM5FuQ4Enqt8cEH7hWCt7cA-I/s512/top-down.png" class="icon-harga" <="" span="">
                      <p class="satuan">0 %</p>
                    </span>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">50000</p>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">50000</p>
                  </div>
                </td>
              </tr>
              <tr class="rj-bordered">
                <td>
                  <img src="https://cdn-icons-png.flaticon.com/512/628/628166.png" class="bahanpokok-icon">
                </td>
                <td class="pertama">
                  <h4 class="font-size-kategori">Daging</h4>
                  <p class="font-size-jenis"> Daging Sapi Paha Depan </p>
                  <p class="font-size-jenis">/kg</p>
                </td>
                <td>
                  <div class="pertama" style="justify-content:center;">
                    <span>
                      <img src="https://cdn-icons-png.flaticon.com/512/6067/6067145.png" class="icon-harga" <="" span="">
                      <p class="satuan">-20 %</p>
                    </span>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">180000</p>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">150000</p>
                  </div>
                </td>
              </tr>
              <tr class="rj-bordered">
                <td>
                  <img src="https://cdn-icons-png.flaticon.com/512/628/628166.png" class="bahanpokok-icon">
                </td>
                <td class="pertama">
                  <h4 class="font-size-kategori">Daging</h4>
                  <p class="font-size-jenis"> Daging Sapi Paha Belakang </p>
                  <p class="font-size-jenis">/kg</p>
                </td>
                <td>
                  <div class="pertama" style="justify-content:center;">
                    <span>
                      <img src="https://cdn-icons-png.flaticon.com/512/6067/6067145.png" class="icon-harga" <="" span="">
                      <p class="satuan">-20 %</p>
                    </span>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">180000</p>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">150000</p>
                  </div>
                </td>
              </tr>
              <tr class="rj-bordered">
                <td>
                  <img src="https://cdn-icons-png.flaticon.com/512/1514/1514422.png" class="bahanpokok-icon">
                </td>
                <td class="pertama">
                  <h4 class="font-size-kategori">Tepung Terigu</h4>
                  <p class="font-size-jenis"> Segitiga Biru </p>
                  <p class="font-size-jenis">/kg</p>
                </td>
                <td>
                  <div class="pertama" style="justify-content:center;">
                    <span>
                      <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi4hy11ysfrgh-i2wYJapKebk3aKckQKgDOm6w-79gz85P15jHsEDjRLelBPAR0gQe1B06UHkRNwg_8BmMMi5oMu4xuG_C7N5nha60AxZIk2VNVPvCcrz2kzCA3imswINtlABMUDXXObGbCXM_HHrIX_j5Q-kVgx3GbM5FuQ4Enqt8cEH7hWCt7cA-I/s512/top-down.png" class="icon-harga" <="" span="">
                      <p class="satuan">0 %</p>
                    </span>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">14000</p>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">14000</p>
                  </div>
                </td>
              </tr>
              <tr class="rj-bordered">
                <td>
                  <img src="https://cdn-icons-png.flaticon.com/512/3082/3082045.png" class="bahanpokok-icon">
                </td>
                <td class="pertama">
                  <h4 class="font-size-kategori">Minyak Goreng</h4>
                  <p class="font-size-jenis"> Kemasan Premium </p>
                  <p class="font-size-jenis">/Liter</p>
                </td>
                <td>
                  <div class="pertama" style="justify-content:center;">
                    <span>
                      <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi4hy11ysfrgh-i2wYJapKebk3aKckQKgDOm6w-79gz85P15jHsEDjRLelBPAR0gQe1B06UHkRNwg_8BmMMi5oMu4xuG_C7N5nha60AxZIk2VNVPvCcrz2kzCA3imswINtlABMUDXXObGbCXM_HHrIX_j5Q-kVgx3GbM5FuQ4Enqt8cEH7hWCt7cA-I/s512/top-down.png" class="icon-harga" <="" span="">
                      <p class="satuan">0 %</p>
                    </span>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">22000</p>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">22000</p>
                  </div>
                </td>
              </tr>
              <tr class="rj-bordered">
                <td>
                  <img src="https://cdn-icons-png.flaticon.com/512/3082/3082045.png" class="bahanpokok-icon">
                </td>
                <td class="pertama">
                  <h4 class="font-size-kategori">Minyak Goreng</h4>
                  <p class="font-size-jenis"> Minyak Kita </p>
                  <p class="font-size-jenis">/Liter</p>
                </td>
                <td>
                  <div class="pertama" style="justify-content:center;">
                    <span>
                      <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi4hy11ysfrgh-i2wYJapKebk3aKckQKgDOm6w-79gz85P15jHsEDjRLelBPAR0gQe1B06UHkRNwg_8BmMMi5oMu4xuG_C7N5nha60AxZIk2VNVPvCcrz2kzCA3imswINtlABMUDXXObGbCXM_HHrIX_j5Q-kVgx3GbM5FuQ4Enqt8cEH7hWCt7cA-I/s512/top-down.png" class="icon-harga" <="" span="">
                      <p class="satuan">0 %</p>
                    </span>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">14000</p>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">14000</p>
                  </div>
                </td>
              </tr>
              <tr class="rj-bordered">
                <td>
                  <img src="https://cdn-icons-png.flaticon.com/512/3082/3082045.png" class="bahanpokok-icon">
                </td>
                <td class="pertama">
                  <h4 class="font-size-kategori">Minyak Goreng</h4>
                  <p class="font-size-jenis"> Minyak Curah </p>
                  <p class="font-size-jenis">/Liter</p>
                </td>
                <td>
                  <div class="pertama" style="justify-content:center;">
                    <span>
                      <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi4hy11ysfrgh-i2wYJapKebk3aKckQKgDOm6w-79gz85P15jHsEDjRLelBPAR0gQe1B06UHkRNwg_8BmMMi5oMu4xuG_C7N5nha60AxZIk2VNVPvCcrz2kzCA3imswINtlABMUDXXObGbCXM_HHrIX_j5Q-kVgx3GbM5FuQ4Enqt8cEH7hWCt7cA-I/s512/top-down.png" class="icon-harga" <="" span="">
                      <p class="satuan">0 %</p>
                    </span>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">13500</p>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">13500</p>
                  </div>
                </td>
              </tr>
              <tr class="rj-bordered">
                <td>
                  <img src="https://cdn-icons-png.flaticon.com/512/2315/2315968.png" class="bahanpokok-icon" <="" td="">
                </td>
                <td class="pertama">
                  <h4 class="font-size-kategori">Gula Pasir</h4>
                  <p class="font-size-jenis"> Curah </p>
                  <p class="font-size-jenis">/kg</p>
                </td>
                <td>
                  <div class="pertama" style="justify-content:center;">
                    <span>
                      <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi4hy11ysfrgh-i2wYJapKebk3aKckQKgDOm6w-79gz85P15jHsEDjRLelBPAR0gQe1B06UHkRNwg_8BmMMi5oMu4xuG_C7N5nha60AxZIk2VNVPvCcrz2kzCA3imswINtlABMUDXXObGbCXM_HHrIX_j5Q-kVgx3GbM5FuQ4Enqt8cEH7hWCt7cA-I/s512/top-down.png" class="icon-harga" <="" span="">
                      <p class="satuan">0 %</p>
                    </span>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">15000</p>
                  </div>
                </td>
                <td class="jarak">
                  <div class="pertama">
                    <p class="rata-tengah">15000</p>
                  </div>
                </td>
              </tr>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="bg-light p-4 center" style="text-align:-webkit-center">
  <div class="title m-2">
    <h3>WISATA</h3>
  </div> <?php foreach ($unit as $key => $value) {
        if ($key % 2 == 0) { //Kondisi
            ?> <div class="row w-95">
    <div class="col-md-6">
      <img src="Assets/unit/
																																																																															<?= $value['module_img'] ?>" style="width:100%;max-height: 80vh;" class="img-fluid mb-2 content-img" alt="
																																																																															<?= $value['module_name'] ?>" />
    </div>
    <div class="col-md-6 center">
      <h2 class="btn mt-2" style="border: 1px solid #000000!important;"> <?= $value['module_name'] ?> </h2>
      <p> <?= $value['module_url'] ?> </p>
    </div>
  </div> <?php
        } else {
            ?> <div class="row w-95">
    <div class="col-md-6 center">
      <h2 class="btn mt-2" style="border: 1px solid #000000!important;"> <?= $value['module_name'] ?> </h2>
      <p> <?= $value['module_url'] ?> </p>
    </div>
    <div class="col-md-6">
      <img src="Assets/unit/
																																																																																<?= $value['module_img'] ?>" style="width:100%; max-height: 80vh;" class="img-fluid mb-2 content-img" alt="
																																																																																<?= $value['module_name'] ?>" />
    </div>
  </div> <?php }
    }

    ?>
</div>
<!-- <div class="bg-light p-4 center" style="text-align:-webkit-center"><div class="title m-2"><h3>UNIT USAHA BUMDES</h3></div><div class="row w-80">
																																																																													<?php foreach ($unit as $key => $value) { ?><div class="col-md-4 p-4"><img src="Assets/unit/
																																																																													<?= $value['module_img'] ?>" class="img-fluid mb-2 content-img"
                    alt="<?= $value['module_name'] ?>" max-width="400" /><h2 class="btn mt-2" style="border: 1px solid #000000!important;">
																																																																													<?= $value['module_name'] ?></h2><p>
																																																																													<?= $value['module_url'] ?></p></div>
																																																																													<?php }
        ?></div></div> -->
<div class="bg-light p-4 center" style="text-align:-webkit-center;background-color: #a0b2c3!important;">
  <div class="title m-2">
    <h3>TEAM</h3>
  </div>
  <div class="row w-80"> <?php foreach ($staff as $key => $value) { ?> <div class="col-md-3 p-2 ">
      <div class="bg-light shadow">
        <img src="
																																																																																		<?= $value['photo'] != '' ? 'Assets/staff/' . $value['photo'] : 'https://via.placeholder.com/180/b9acac/FFFFFF?text=Masukkan Gambar' ?>" class="img-fluid mb-2 content-img w-100" alt="
																																																																																		<?= $value['photo'] ?>" />
        <div class="p-2 post-content">
          <h6 class="mt-2"> <?= $value['full_name'] ?> </h6>
          <p> <?= $value['jabatan'] ?> </p>
        </div>
      </div>
    </div> <?php }
        ?> </div>
</div>
<div class="bg-light p-4 center" style="text-align:-webkit-center;">
  <div class="title m-2">
    <h3>EVENT</h3>
  </div>
  <div class="row w-90"> <?php for ($i = 0; $i < (count($produk) >= 4 ? 4 : count($produk)); $i++) { ?> <div class="col-md-4 p-2">
      <div class="card content-img">
        <div class="card-img">
          <img src="
																																																																																				<?= $produk[$i]['image'] != '' ? 'Assets/produk/' . $produk[$i]['image'] : 'https://via.placeholder.com/250/b9acac/FFFFFF?text=Kosong' ?>" style="height:18em;width:100%">
        </div>
        <div class="post-content p-1 center">
          <h5 class="text-left "> <?= $produk[$i]['name'] ?> </h5>
        </div>
        <!-- <a href="
																																																																																			<?= base_url('produk/' . $produk[$i]['name']) ?>" ?><div class="card-footer p-2 center" id="button-produk"><i class="fa fa-link"></i> Detail Produk
                        </div></a> -->
      </div>
    </div> <?php }
        ?> </div>
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
<script>
    $('#listSembako').DataTable({
            "pageLength": 5,
           
        });
    </script>
<?= $this->include('Public/Layout/Footer') ?>