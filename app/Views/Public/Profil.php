<?= $this->include("Public/Layout/Header") ?>
    <style>
        .vertical-center {
            -ms-transform: translateY(30%);
            transform: translateY(30%);
        }

        #strukturorganisasi {
            overflow-x: scroll !important;
        }

        .highcharts-container {
            margin: 0 auto;
        }
    </style>
    <div class="content">
            <div class="" style="max-width:98vw">
                <div class="row">
                    <div class="col-md-2">
                        <ul class="nav nav-tabs flex-column" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#T">Tentang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#TP">Dokumen Pendukung</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#SO">Struktur Organisasi</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-10">
                        <div class="tab-content">
                            <div id="T" class="tab-pane active"><br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="mb-sm heading-primary"><strong>
                                                <?= $setting_title ?>
                                            </strong></h4>
                                        <blockquote>
                                            <?= $tentang_instansi ?>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="mb-sm heading-primary"><strong>Kantor</strong></h4>
                                        <blockquote>
                                            
                                                <div style="align-self: center;">
                                                    <b>
                                                        <?= $setting_title .
                                                            " " .
                                                            $setting_subtitle ?>
                                                    </b>
                                                    <div class="row">
                                                        <div class="col-2">Alamat</div>
                                                        <div class="col-10">
                                                            <?= $setting_alamat ?>
                                                        </div>
                                                        <div class="col-2">Telp.</div>
                                                        <div class="col-10">
                                                            <?= $setting_telp ?>
                                                        </div>
                                                        <div class="col-2">Email</div>
                                                        <div class="col-10">
                                                            <?= $setting_email ?>
                                                        </div>
                                                    </div>
                                                </div>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="mb-sm heading-primary"><strong>Pimpinan</strong></h4>
                                        <blockquote>
                                            <div class="row">
                                                <div class="col-md-6 center">
                                                    <img alt="" class="img-responsive mb-lg" src="<?= $pimpinan_foto ?>"
                                                        style="max-height: 35vh;">
                                                </div>
                                                <div class="col-md-6 vertical-center">
                                                    <table>
                                                        <tr valign="top">
                                                            <td width="120px">Nama</td>
                                                            <td><strong>
                                                                    <?= $pimpinan_name ?>
                                                                </strong></td>
                                                        </tr>
                                                        <tr valign="top">
                                                            <td>NIP</td>
                                                            <td>
                                                                <?= $pimpinan_nip ?>
                                                            </td>
                                                        </tr>
                                                        <tr valign="top">
                                                            <td>Jabatan</td>
                                                            <td>
                                                                <?= $pimpinan_jabatan ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                            <div id="TP" class="tab-pane fade"><br>
                                <h4 class="mb-sm heading-primary"><strong>SERTIFIKAT PENDAFTARAN PENDIRIAN BADAN HUKUM</strong></h4>
                                <blockquote>
                                <?= $kantor_foto?>
                                <iframe id="kantorfoto" name="kantorfoto" src="<?= $kantor_foto?>" style="width:70vw;height:70vh"></iframe>

                                </blockquote>
                               
                            </div>
                            <div id="SO" class="tab-pane fade"><br>
                                <h4 class="mb-sm heading-primary"><strong>Struktur Organisasi</strong></h4>


                                <blockquote class="p-0">
                                    <?php if (count($employe) != 0) { ?>
                                    <div id="strukturorganisasi"></div>
                                    <?php } ?>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <?= $this->include("Public/Layout/Footer") ?>
        </body>
        <script>
            Highcharts.chart('strukturorganisasi', {
                chart: {
                    width: <?= $c_width ?>,
                    height: <?= $c_height ?>,
                    inverted: true,
                },
                title: {
                    text: '',
                },
                series: [{
                    type: 'organization',
                    name: 'Staff',
                    keys: ['to', 'from'],
                    data: [
                <?php foreach ($data as $key => $item) {
                    if ($item["id_org"] != 1) { ?> ['<?= $item["id_org"] ?>', '<?= $item["root"] ?>'],
                <?php }
                } ?>
            ],
            nodes: [
                <?php 
                if ($system == "puskesmas") {
                    foreach ($data as $key => $value) {
                        if ($value["name"] == "pimpinan") { ?>  {
                            color: '#980104',
                            id: '<?= $value["id_org"] ?>',
                            title: '<?= $value["description"] ?>',
                            offset: '<?= $ada != 0 ? "220%" : "0" ?>',
                            name: '<?= $value["full_name"] ?>',
                        },
                    <?php 
                        } elseif ($value["name"] == "kepala1") { ?> {
                            id: '<?= $value["id_org"] ?>',
                            title: '<?= $value["description"] ?>',
                            name: '<?= $value["full_name"] ?>',
                            offsetHorizontal: '<?= $ada != 0 ? "-50%" : "0" ?>',
                            layout : '<?= $ada != 0 ? "normal" :""  ?>',
                            column: 1,
                        },
                    <?php 
                        } elseif ($value["name"] == "kasub " && $value[" root "] == 2) { ?> {
                            id: '<?= $value["id_org"] ?>',
                            title: '<?= $value["description"] ?>',
                            name: '<?= $value["full_name"] ?>',
                            offsetHorizontal: '<?= $ada != 0 ? "-50%" : "0" ?>',
                            layout: "hanging",
                            column: 2
                        },
				    <?php 
                        } elseif ($value["name"] == "kabid") { ?> {
                            id: '<?= $value["id_org"] ?>',
                            title: 'Pj. <?= $value["description"] ?>',
                            name: '<?= $value["full_name"] ?>',
                            layout: "hanging",
                            column: 3
                        },
                    <?php } else { ?> {
                            id: '<?= $value["id_org"] ?>',
                            title: '<?= $value["description"] ?>',
                            name: '<?= $value["full_name"] ?>',
                        },
                    <?php }
                    }
                } elseif ($system == "dinas") {
                    foreach ($data as $key => $value) {
                    if ($value['name'] == 'pimpinan') {
                ?> {
                            color: '#980104',
                            id: '<?= $value['id_org'] ?>',
                            title: '<?= $value['description'] ?>',
                            name: '<?= $value['full_name'] ?>',
                        },
                    <?php
                    } else if ($value['name'] == 'kepala1') { ?> {
                            id: '<?= $value['id_org'] ?>',
                            title: '<?= $value['description'] ?>',
                            name: '<?= $value['full_name'] ?>',
                            offset: '<?= $ada != 0 ? "60%" : '0' ?>',
                            // offset: '60%',
                            <?= $ada != 0 ? "layout: 'hanging'" : '' ?>,
                            column: 1,
                        },
                    <?php } else if ($value['name'] == 'kabid') { ?> {
                            id: '<?= $value['id_org'] ?>',
                            title: '<?= $value['description'] ?>',
                            name: '<?= $value['full_name'] ?>',
                            layout: "hanging",
                            column: 4
                        },
                    <?php } else {
                    ?> {
                            id: '<?= $value['id_org'] ?>',
                            title: '<?= $value['description']?>',
                            name: '<?= $value['full_name'] ?>',
                        },
                <?php
                    }
					}} ?>
            ],
            colorByPoint: false,
                color: '#007ad0',
                    dataLabels: {
                color: '#ffffff',
                    nodeFormatter: function() {
                        var html = Highcharts.defaultOptions
                            .plotOptions
                            .organization
                            .dataLabels
                            .nodeFormatter
                            .call(this);
                        html = html.replace(
                            '<h4 style="',
                            '<h4 style="color: #ffffff; font-size: 11px; line-height: 1; padding-top:0;padding-bottom:5px; font-weight:bold text-transform: uppercase;'
                        );
                        html = html.replace(
                            '<p style="',
                            '<p style="color: #ffffff; font-size: 10px; line-height: 1;text-transform: uppercase;'
                        );
                        html = html.replace(
                            '<img',
                            '<img style="display: block; width: 45px;  height: 45px;border-radius: 50%; background:white"'
                        );
                        return html;
                    },
            },
            borderColor: 'white',
                nodeWidth: <?= $n_width ?>,
        }],

            tooltip: {
                outside: true,
                    useHTML: true
            },
            exporting: {
                allowHTML: true,
                    sourcewidth: <?= $c_width ?>,
                        sourceheight: <?= $c_height ?>,
        },
            scrollbar: {
                enabled: true,
        },
            credits: {
                enabled: true,
                    href: '',
                        text: ''
            }
    });
        </script>

        </html>