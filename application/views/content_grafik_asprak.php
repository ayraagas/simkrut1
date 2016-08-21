 <section class="content">
 	 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
    
        </div>
        <!-- /.col (LEFT) -->
        <div class="box">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik Asisten Praktikum</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <?php $graph_data = $this->tahunajaran_model->get_graph_data('Praktikum'); ?>
              <?php $width = (count($graph_data) > 6) ? (1000 + (160 * (count($graph_data)-6)))."px" : "100%"; ?>
              <div class="chart">
                <div class="chartWrapper">
                  <div class="chartAreaWrapper">
                    <canvas id="lineChart" style="height:250px;width:<?php echo $width; ?>!important;"></canvas>
                  </div>
                  <canvas id="lineChartAxis" style="height:250px;width:0!important;"></canvas>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->
      <script type="text/javascript" charset="utf-8" async defer>
        var myGraphLabelList = [
          <?php
          foreach ($graph_data as $row) {
            echo '"'.$row->tahun.' '.$row->semester.'",';
          }
          ?>
        ];

        var myGraphLabel = 'Asisten Mandiri';

        var myGraphData = [
          <?php
          foreach ($graph_data as $row) {
            echo $row->jumlah.',';
          }
          ?>
        ];
      </script>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- jQuery 2.2.0 -->
<script src="assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/plugins/jQueryUI/jquery-ui.min.js"></script>
<script src="assets/js/grafik.js"></script>