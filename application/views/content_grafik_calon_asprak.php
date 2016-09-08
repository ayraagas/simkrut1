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
            <h3 class="box-title">Grafik Hasil Rekomendasi Asisten Praktikum</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <?php $graph_data = $this->asprak_model->get_graph_data(); ?>
            <?php $width = (count($graph_data) > 6) ? (1000 + (160 * (count($graph_data)-6)))."px" : "100%"; ?>
            <div class="chartWrapper">
              <div class="chartAreaWrapper">
             <canvas id="myChart" height="300" width="1200"></canvas>
              </div>
              <canvas id="myChartAxis" style="height:250px;width:0!important;"></canvas>
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
        echo '"'.$row->nama.' '.$row->angkatan.'",';
      }
      ?>
      ];

      var myGraphLabel = 'Grafik Hasil Rekomendasi';

      var myGraphData = [
      <?php
      foreach ($graph_data as $row) {
        echo $row->hasil.',';
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
<script src="assets/plugins/jQuery/jquery-3.1.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/plugins/jQueryUI/jquery-ui.min.js"></script>
<script src="assets/plugins/chartjs/ChartNew.js"></script>
<script src="assets/js/grafikpendaftar.js"></script>