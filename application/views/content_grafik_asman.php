 <section class="content">
   <!-- Main content -->
   <section class="content">
    <div class="row">
      <!-- /.col (LEFT) -->
      <div class="box">
        <!-- LINE CHART -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Grafik Asisten Mandiri</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
            <?php $graph_data = $this->tahunajaran_model->get_graph_data('Mandiri'); ?>
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
