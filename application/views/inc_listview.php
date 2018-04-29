<?php $this->load->view('header'); ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('top_navbar'); ?>

  <?php $this->load->view('left_navbar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body responsive">
              <table id="example1" class="table table-bordered table-hover">
                  <thead>
                      <tr>
                          <th width="40px" align="center">No.</th>
                          <?php foreach ($input as $key) {
                          if($key['hidden']) continue; ?>
                          <th> <?= $key['label'] ?></th>
                          <?php } ?>
                          <?php if(!empty($c_edit) || !empty($c_delete)) { ?>
                          <th style="width:15%" align="center">Aksi</th>
                          <?php } ?>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $no = 1; if(!empty($data)) foreach ($data as $key) { ?>
                      <tr class="odd gradeX">
                          <td align="center"><?=$no++?></td>
                          <?php foreach ($input as $keys) { 
                              if($keys['hidden']) continue; 
                          ?>
                              <?php if($keys['type'] == 'S') { ?>
                                  <td><?= $keys['option'][$key[$keys['key']]] ?></td>
                              <?php } else { ?>
                                  <td><?= $key[$keys['key']] ?></td>
                              <?php } ?>
                          <?php } ?>
                         <?php if(!empty($c_edit) || !empty($c_delete)) { ?>
                          <td align="center">
                              <form action="delete" method="post" class="form">
                                  <?php if(!empty($c_edit)) { ?>
                                    <a href="<?=$link . "/detail/" . $key[$p_key] ?>">
                                      <div class="btn btn-warning btn-sm btn-flat">
                                          <span class="fa fa-pencil "></span>
                                      </div>
                                    </a>
                                    <?php } if(!empty($c_delete)) { ?>
                                    <button class="btn btn-danger btn-sm btn-flat" type="submit" name="id_delete" value="<?=$key[$p_key]?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                      <span class="fa fa-trash-o"></span>
                                    </button>
                                    <?php } ?>
                              </form>
                          </td>
                          <?php } ?>
                      </tr>
                      <?php } ?>
                  </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php $this->load->view('footer'); ?>

  <?php $this->load->view('right_sidebar'); ?>
  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?= base_url() ?>css/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= base_url() ?>css/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>css/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>css/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url() ?>css/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>css/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>css/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>css/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
