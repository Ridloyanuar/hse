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
        Menu List
        <small>List of all menu</small>
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
        <div class="col-xs-8">
          <div class="box">
            <!-- /.box-header -->
            <div class="container">
              <div class="row">
                  <div class="col-xs-6">
                      <ul id="treeview">
                        <?= $controller->CreateTreeView($tree_view, 0, 0, 0); ?>
                      </ul>
                  </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-xs-4">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add/Edit Page</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?= current_url() ?>/add" id="general-form" method="post" enctype="multipart/form-data">
              <div class="form-horizontal">
                <div class="box-body">
                  <?php
                    if(!empty($input)) foreach ($input as $keys) { 
                      if ($keys['hidden']) continue;
                  ?>
                  <?php if ($keys['type'] == 'C') { ?>
                    <input name="<?=$keys['key']?>" type="hidden" value="<?=$keys['value']?>">
                  <?php } else { ?>
                  <div class="form-group">
                    <label class="col-sm-6"><?=$keys['label']?></label>
                    <div class="col-sm-12">
                  <?php if ($keys['type'] == 'S') { ?>
                    <select class="form-control" name="<?=$keys['key']?>">
                      <?php foreach ($keys['option'] as $key => $value) { ?>
                        <option id="<?=$keys['key'] . '_' . $key?>" value="<?=$key?>"> <?=$value?></option>
                      <?php } ?>
                      </select>
                  <?php } else if ($keys['type'] == 'F') { ?>
                    <input name="<?=$keys['key']?>" type="file">
                  <?php } else if ($keys['type'] == 'T') { ?>
                      <input class="form-control" name="<?=$keys['key']?>" type="text">
                  <?php } ?>
                    </div>
                  </div>
                  <?php } } ?>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-success pull-right">Submit</button>
                </div>
                <!-- /.box-footer -->
              </div>
            </form>
          </div>
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

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/shieldui/all.min.css" />
<!-- jQuery 2.2.3 -->
<script src="<?= base_url() ?>css/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= base_url() ?>css/bootstrap/js/bootstrap.min.js"></script>
<!-- you need to include the ShieldUI CSS and JS assets in order for the TreeView widget to work -->
<script src="<?= base_url() ?>css/shieldui/shieldui-all.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url() ?>css/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>css/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>css/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>css/dist/js/demo.js"></script>
<!-- page script -->
<?php  
  if(!empty($script)){
      include ('script/script_'.$script.'.php');
  } 
?>

</body>
</html>
