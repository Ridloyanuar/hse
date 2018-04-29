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
        Data Detail
        <small>advanced data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php if (!empty($error_code)) { ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <span><i class="icon fa fa-check"></i><?=$error_message?></span>
    </div>
    <?php } ?>

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <form action="../update" method="POST">
        <div class="box-header with-border">
          <h3 class="box-title"><?=$label ?></h3>
          <div class="btn btn-warning btn-xs" id="button-edit">Edit</div>
          <div class="btn bg-navy btn-xs hide" id="button-cancel">Cancel</div>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tbody>
                    <?php for ($i = 0; $i <= $middle; $i++) { ?>
                        <?php if($input[$i]['key'] == $p_key) { ?>
                            <input type="hidden" name="<?= $input[$i]['key'] ?>" value="<?= $data[$input[$i]['key']] ?>" />
                        <?php continue; } ?>
                        <tr class="form-view">
                            <td><?= $input[$i]['label'] ?></td>
                            <?php if($input[$i]['type'] == 'S') { ?>
                                <td><?= $input[$i]['option'][$data[$input[$i]['key']]] ?></td>
                            <?php } else { ?>
                                <td><?= $data[$input[$i]['key']] ?></td>
                            <?php } ?>
                        </tr>
                        <tr class="form-edit hide">
                            <td><?= $input[$i]['label'] ?></td>
                            <?php if($input[$i]['type'] == 'S') { ?>
                                <td>
                                  <select class="form-control" name="<?=$input[$i]['key']?>">
                                  <?php foreach ($input[$i]['option'] as $key => $value) { ?>
                                    <option value="<?=$key?>" <?=$data[$input[$i]['key']] == $key ? "selected" : ""?>> <?=$value?></option>
                                  <?php } ?>
                                  </select>
                                
                                </td>
                            <?php } else { ?>
                                <td>
                                  <input class="form-control" value="<?= $data[$input[$i]['key']] ?>" name="<?=$input[$i]['key']?>">
                                </td>
                            <?php } ?>
                        </tr>
                    <? } ?>
                    </tbody>
                </table>
              <!-- /.form-group -->
            </div>

            <div class="col-md-6">
                <table class="table table-bordered">
                    <tbody>
                    <?php for ($i = $middle+1; $i < count($input); $i++) { ?>
                        <tr class="form-view">
                            <td><?= $input[$i]['label'] ?></td>
                            <?php if($input[$i]['type'] == 'S') { ?>
                                <td><?= $input[$i]['option'][$data[$input[$i]['key']]] ?></td>
                            <?php } else { ?>
                                <td><?= $data[$input[$i]['key']] ?></td>
                            <?php } ?>
                        </tr>
                        <tr class="form-edit hide">
                            <td><?= $input[$i]['label'] ?></td>
                            <?php if($input[$i]['type'] == 'S') { ?>
                                <td>
                                  <select class="form-control" name="<?=$input[$i]['key']?>">
                                  <?php foreach ($input[$i]['option'] as $key => $value) { ?>
                                    <option value="<?=$key?>" <?=$data[$input[$i]['key']] == $key ? "selected" : ""?>> <?=$value?></option>
                                  <?php } ?>
                                  </select>
                                
                                </td>
                            <?php } else { ?>
                                <td>
                                  <input class="form-control" value="<?= $data[$input[$i]['key']] ?>" name="<?=$input[$i]['key']?>">
                                </td>
                            <?php } ?>
                        </tr>
                    <? } ?>
                    </tbody>
                </table>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-info pull-right hide" id="button-submit">Submit</button>
        </div>
        </form>
      </div>
      <!-- /.box -->

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

  $('#button-edit').on('click', function () {
    $('#button-cancel').removeClass('hide');
    $('#button-submit').removeClass('hide');
    $('#button-edit').hide();

    $('.form-edit').removeClass('hide');
    $('.form-view').addClass('hide');
  });

  $('#button-cancel').on('click', function () {
    $('#button-submit').addClass('hide');
    $('#button-cancel').addClass('hide');
    $('#button-edit').show();

    $('.form-view').removeClass('hide');
    $('.form-edit').addClass('hide');
  });

</script>
</body>
</html>
