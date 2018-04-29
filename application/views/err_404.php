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
        Error
        <small>Page Not Found</small>
      </h1>
    </section>
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
<!-- SlimScroll -->
<!-- FastClick -->
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
