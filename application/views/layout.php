
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Littlehathee</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/summernote/summernote-bs4.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- jQuery -->
  <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/datatables.min.css"/>
 
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/datatables.min.js"></script>
  <style>
      
    @import url('https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Lato:wght@300;400;900&display=swap');
    html,body,table,th,td,label,a,h1,h2,h3,h4,h5,h6,div,section,small,sub,sup,p,input,textarea,button,li{
        font-family: 'Jost', sans-serif !important;
    }
    form label,.form-control{
        font-size: 14px;
        font-weight: 400 !important;
    }
    .card-title{
        text-transform: uppercase !important;
        font-weight: 500 !important;
        font-size: 18px !important;
    }
    .card-header h1,h2,h3,h4,h5,h6{
        font-size: 18px;
    }
    th{
        font-weight: 500;
        text-transform: uppercase;
        font-size: 15px;
    }
    td{
        vertical-align: middle !important;
    }
    table.dataTable thead .sorting:after{
        content: "\2193";
    }
    table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after{
        content: "\2193";
    }
    .badge{
        font-weight: 500 !important;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed bg-white">
<div class="wrapper">
  

    <?php include "includes/topnav.php"; ?>
    <?php include "includes/sidenav.php"; ?>
  
  <!-- /.navbar -->

  <div class="content-wrapper py-3">
    <div class="container-fluid">
      <?php include "includes/breadcrumbs.php"; ?>
      <?php 
      if($this->session->flashdata('msg') != '')
      {
        ?>
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="alert flash-msg <?=$this->session->flashdata('type')?>">
                <p class="m-0"><?=$this->session->flashdata('msg')?></p>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
      ?>
      <?php $this->load->view($view); ?>
    </div>
  </div>

  <!-- Content Wrapper. Contains page content -->
  
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url()?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url()?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?=base_url()?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=base_url()?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url()?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url()?>assets/plugins/moment/moment.min.js"></script>
<script src="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url()?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url()?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url()?>assets/dist/js/pages/dashboard.js"></script>
<!-- Select2 -->
<script src="<?=base_url()?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/dist/js/demo.js"></script>(
<script>
    $(document).ready(function(){
        $('.table').DataTable();
        // $('.table').addClass('table-sm');
    });
</script>
<script>

function alpha()
{
	var charCode = event.keyCode;
	if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode == 8 || charCode==32)
		return true;
	else
		return false;
}

function numeric()
{
	var charCode = event.keyCode;

	if ((charCode >= 48 && charCode <= 57) || charCode == 8)
		return true;
	else
		return false;
}

function decimal()
{
	var charCode = event.keyCode;
	if (charCode==46 || (charCode>=48 && charCode<=57) || charCode == 8)
		return true;
	else 
		return false;
}

function alphaNumeric()
{
	var charCode = event.keyCode;
	if ((charCode >= 48 && charCode <= 57) || (charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode == 8 || charCode==32)
		return true;
	else
		return false;
}

function alphaNumericDecimal()
{
	var charCode = event.keyCode;
	if (charCode >= 46 || (charCode >= 48 && charCode <= 57) || (charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode == 8 || charCode==32)
		return true;
	else
		return false;
}
</script>
<script>
  $(document).ready(function(){
    $('.dataTable').DataTable();
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });
</script>
<script>
    $(document).ready(function(){
        $(".flash-msg").fadeTo(2000, 500).slideUp(500, function(){
            $(".flash-msg").slideUp(500);
        });
    });
</script>
</body>
</html>
