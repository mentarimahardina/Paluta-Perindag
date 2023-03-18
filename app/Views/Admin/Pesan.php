<?= $this->include('Admin/Layout/Sidemenu') ?>
<div class="card">
  <div class="card-header ">
    <h3 class="card-title font-weight-bold">
      Poling
    </h3>

    <div class="card-tools">
      <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>

  </div>
  <div class="card-body">

    <div class="row">
      <div class="col-md-7">
        <div class="m-1 card bg-gradient-light">
          <div class="card-header ">
            <h3 class="card-title">
              List Poling
            </h3>
          </div>
          <div class="card-body">
            <table id="tbPoling" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th style="width: 1vw;">No.</th>
                  <th>Waktu</th>
                  <?= $type == 'super_user' ? "<th>IP Address</th>" : '' ?>
                  <th>Nama</th>
                  <th>Poling</th>

                </tr>
              </thead>
              <tbody>
                <?PHP
                foreach ($dataPoling as $key => $item) {
                  ?>
                  <tr data-toggle="modal" id="PolingLengkaps" data-target="#PolingLengkap" data-nik="<?= $item['nik'] ?>"
                    data-name="<?= $item['fullname'] ?>" data-email="<?= $item['email'] ?>"
                    data-msg="<?= $item['message'] ?>">
                    <td>
                      <?PHP echo $key + 1 ?>
                    </td>

                    <td>
                      <?= $item['created_at']; ?>
                    </td>
                    <?= $type == 'super_user' ? "<td>" . $item['ip_address'] . "</td>" : '' ?>

                    <td>
                      <?= $item['fullname']; ?>
                    </td>
                    <td>
                      <?php

                      if ($item['message'] == "1") {
                        echo "Sangat Puas";
                      } else if ($item['message'] == "2") {
                        echo "Puas";
                      } else if ($item['message'] == "3") {
                        echo "Biasa saja";
                      } else if ($item['message'] == "4") {
                        echo "Tidak Puas";
                      } else {
                        echo "Sangat Tidak Puas";
                      } ?>
                    </td>


                  </tr>
                  <?PHP
                }
                ?>
              </tbody>

            </table>
          </div>
        </div>
      </div>
      <div class="col-md-5">

        <div class="card  bg-gradient-dark">
          <div class="card-header ">
            <h3 class="card-title">
              Chart Bar Poling
            </h3>
          </div>
          <div class="card-body">
            <div id="cbar"></div>
          </div>
        </div>

        <div class="card  bg-gradient-dark">
          <div class="card-header ">
            <h3 class="card-title">
              Chart Pie Poling
            </h3>
          </div>
          <div class="card-body">
            <div id="cpie"></div>
          </div>

        </div>

      </div>
    </div>

  </div>

</div>


<div class="card">
  <div class="card-header">
    <h3 class="card-title font-weight-bold">
      Pesan
    </h3>

    <div class="card-tools">
      <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>
  </div>
  <?php
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

  <div class="card-body">
    <div class="row ml-1" hidden id="headPesan">
      <div class="col-md-11">
        <span id="message"></span>

      </div>
      <div class="col-md-1 " style="text-align: end;">
        <button id="backAll" class="fa fa-close bg-primary rounded"> </button>
      </div>
    </div>


    <table id="tbPesan1" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>No.</th>
          <th>IP Address</th>
          <th>Pesan / Kritik Terakhir</th>
        </tr>
      </thead>
      <?PHP
      foreach ($ipaddress as $key => $item) {
        ?>
        <tr id="Pesan_ip" data-ip="<?= $item['ip'] ?>">
          <td>
            <?= $key + 1 ?>
          </td>
          <td style="text-align: justify;">

            <?= $item['ip'] ?>
            <?php
            if ($item['read'] != 0) { ?>
              <span class="badge badge-danger nav-badge">
                <?= $item['read'] ?>
              </span>
            <?php } ?>
          </td>
          <td>
            <?= $item['created_at'] ?>
          </td>
        </tr>
        <?PHP
      }
      ?>
    </table>

  </div>
  <!-- /.card-body -->
</div>



</div>
<!-- ./row -->
<!-- /.container-fluid -->

<!-- /.content -->
<?= $this->include('Admin/Layout/Footer') ?>
<script>
  Highcharts.chart('cpie', {
    chart: {
      type: 'pie',
      height: 300,

      options3d: {
        enabled: true,
        alpha: 45,
        beta: 0
      }
    },
    exporting: {
      enabled: false
    },
    credits: {
      enabled: true,
      href: '',
      text: ''
    },
    title: '',
    accessibility: {
      point: {
        valueSuffix: '%'
      }
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        depth: 35,
        dataLabels: {
          enabled: true,
          format: '{point.name}'
        }
      }
    },
    series: [{
      type: 'pie',
      name: 'Poling',
      data: [{
        y: <?= $sp ?>,
        name: 'Sangat Puas',
        color: '#90ED7D'
      }, {
        y: <?= $p ?>,
        name: 'Puas',
        color: 'green'
      }, {
        y: <?= $bs ?>,
        name: 'Biasa saja',
        color: 'blue'
      }, {
        y: <?= $tp ?>,
        name: 'Tidak Puas',
        color: 'orange'
      }, {
        y: <?= $stp ?>,
        name: 'Sangat Tidak Puas',
        color: 'red'
      }]
    }]
  });
  Highcharts.chart('cbar', {
    chart: {
      type: 'column',
      height: 300,
      options3d: {
        enabled: true,
        alpha: 10,
        beta: 0
      }
    },
    exporting: {
      enabled: false
    },
    credits: {
      enabled: true,
      href: '',
      text: ''
    },
    title: '',
    accessibility: {
      announceNewData: {
        enabled: true
      }
    },
    xAxis: {
      type: 'category'
    },
    yAxis: {
      title: {
        text: 'Total Hasil Poling'
      }

    },
    legend: {
      enabled: false
    },
    plotOptions: {
      series: {
        borderWidth: 0,
        dataLabels: {
          enabled: true,
          // format: '{point.y:.1f}%'
        }
      }
    },

    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [{
      name: "Poling",
      data: [{
        x: 0,
        y: <?= $sp ?>,
        name: 'Sangat Puas',
        color: '#90ED7D'
      }, {
        x: 1,
        y: <?= $p ?>,
        name: 'Puas',
        color: 'green'
      }, {
        x: 2,
        y: <?= $bs ?>,
        name: 'Biasa saja',
        color: 'blue'
      }, {
        x: 3,
        y: <?= $tp ?>,
        name: 'Tidak Puas',
        color: 'orange'
      }, {
        x: 4,
        y: <?= $stp ?>,
        name: 'Sangat Tidak Puas',
        color: 'red'
      }]
    }],

  });
  $(document).ready(function () {

    $(document).on('click', '#download', function () {
      // document.getElementById('infotoPDF').hidden = !document.getElementById('infotoPDF').hidden;

      var doc = new jsPDF();
      // var canvasIE = document.createElement('canvas');

      // canvg(canvasIE, svg);

      // dataUrl = canvasIE.toDataURL('image/JPEG');
      var elementHTML = $('#tbPoling').html();
      var specialElementHandlers = {
        '#elementH': function (element, renderer) {
          return true;
        }
      };
      doc.setFontSize(18);
      doc.text("Hasil Poling", 10, 8);
      doc.setFontSize(12);


      doc.fromHTML(elementHTML, 15, 15, {
        'width': 170,

        'elementHandlers': specialElementHandlers
      });
      doc.save('InfoPenting-' + $(this).data('title') + '.pdf');
    })
  });
</script>