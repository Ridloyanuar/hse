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
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="container">
              <div class="row">
                  <div class="col-md-8">
                      <ul id="treeview">
                          <li data-icon-cls="fa fa-inbox">Inbox
                              <ul>
                                  <li><b>Today (2)</b>
                                    <ul>
                                      <li><b>Today (2)</b></li>
                                      <li>Monday</li>
                                      <li>Last Week</li>
                                  </ul>
                                  </li>
                                  <li>Monday</li>
                                  <li>Last Week</li>
                              </ul>
                          </li>
                          <li data-icon-cls="fa fa-trash">Trash
                          </li>
                          <li data-icon-cls="fa fa-calendar">Calendar
                              <ul>
                                  <li>Day</li>
                                  <li>Week</li>
                                  <li>Month</li>
                              </ul>
                          </li>
                          <li data-icon-cls="fa fa-user">Contacts
                              <ul>
                                  <li>Alexander Stein</li>
                                  <li>John Doe</li>
                                  <li>Paul Smith</li>
                                  <li>Steward Lynn</li>
                              </ul>
                          </li>
                          <li data-icon-cls="fa fa-folder">Folders
                              <ul>
                                  <li>Backup</li>
                                  <li>Deleted</li>
                                  <li>Projects</li>
                              </ul>
                          </li>
                      </ul>
                  </div>
                  <div class="col-md-4">
                    <h2>Add Menu</h2>
                  </div>
              </div>
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
<script>
  jQuery(function ($) {
      $("#treeview").shieldTreeView();
  });
</script>
</body>
</html>