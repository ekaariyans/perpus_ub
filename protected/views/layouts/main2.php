<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PERPUSTAKAAN UNIVERSITAS BRAWIJAYA | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/jquery.fancybox.css" rel="stylesheet" >
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/styles.css" rel="stylesheet" >
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/main-no.css" rel="stylesheet" >
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="wrapper">
		<tr>
			<!-- Header -->
			<div id="header">
				<!-- banner -->
				<div id="banner">

					<!-- logo -->
					<div id="logo-wrapper">
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/ublogo.png" />
					</div>
					<!-- end logo -->

					<div style="float:right;margin:5px 10pt 0;">
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/ukas.jpg" style="border:1px solid #000;padding:1px;background:white"/>
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/logo_UBx60.png" width="57" class="img-polaroid" style="border:1px solid #000;padding:1px;background:white"/>
					</div>

				</div>
				<!-- end banner -->
			</div>
		</tr>
	</table>
        
        <header class="header" >
           
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo Yii::app()->session['akun'];?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/avatar5.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo Yii::app()->session['akun'];?>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="index.php?r=site/logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="wrapper row-offcanvas row-offcanvas-left" >
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas" style="padding-top:50px; margin-top:25px">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar" >
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <?php
                    $bagian = Yii::app()->session['bagian'];
                    if($bagian=='01'||$bagian=='999'){
                        $contr= 'Pengolahan';
                    }
                    else if($bagian=='02'){
                        $contr= 'Sirkulasi';
                    }
                    else if($bagian=='03'){
                        $contr= 'Anggota';
                    }
                    else{
                        $contr= 'Permintaan';
                    }
					?>
                    <ul class="sidebar-menu" >
                        <li class="active">
                            <a href="index.php?r=<?php echo $contr; ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
						
						<?php if(Yii::app()->session['bagian'] == '03' || Yii::app()->session['bagian'] == '999'): ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i>
                                <span>KEANGGOTAAN</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">

                                <?php
                                $this->widget('zii.widgets.CMenu', array(
                                    'items' => array(
                                        array('label' => 'Pendaftaran Anggota Baru', 'url' => array('/anggota/formanggota')),
                                        array('label' => 'Daftar anggota', 'url' => array('/anggota/view')),
                                        
                                    ),
                                ));
                                ?>
                            </ul>
                        </li>
                        <?php endif; ?>
                        
                        <?php if(Yii::app()->session['bagian'] == '02' || Yii::app()->session['bagian'] == '999'): ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-calendar"></i>
                                <span>SIRKULASI</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                $this->widget('zii.widgets.CMenu', array(
                                    'items' => array(
                                        array('label' => 'RFID', 'url' => array('/sirkulasi/rfid')),
                                        array('label' => 'PEMINJAMAN', 'url' => array('/sirkulsi/peminjaman')),
                                        array('label' => 'PEMNGEMBALIAN', 'url' => array('/sirkulasi/pengembalian')),
                                    ),
                                ));
                                ?>
                            </ul>
                        </li>
                        <?php endif; ?>
                        
                        <?php if(Yii::app()->session['bagian'] == '01' || Yii::app()->session['bagian'] == '999'): ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-folder"></i>
                                <span>PENGOLAHAN</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                $this->widget('zii.widgets.CMenu', array(
                                    'items' => array(
                                        array('label' => 'Permintaan Katalog', 'url' => array('/pengolahan/f_laporan_p')),
                                        array('label' => 'Registrasi dan Pelabelan', 'url' => array('/katalog/f_katalog')),
                                        array('label' => 'Validasi Buku', 'url' => array('/pengolahan/validasi')),
                                        array('label' => 'Laporan', 'url' => array('/pengolahan/laporan')),
                                        array('label' => 'Inventarisasi', 'url' => array('/pengolahan/inventarisasi')),
                                    ),
                                ));
                                ?>
                            </ul>
                        </li>
                        <?php endif; ?>
                        
                        <?php if(Yii::app()->session['bagian'] == '04' || Yii::app()->session['bagian'] == '01' || Yii::app()->session['bagian'] == '116' || Yii::app()->session['bagian'] == '999'): ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-folder"></i>
                                <span>PERMINTAAN</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                if(Yii::app()->session['level'] == '01' || Yii::app()->session['level'] == '999'):
                                $this->widget('zii.widgets.CMenu', array(
                                    'items' => array(
                                        array('label' => 'KOLEKTIF', 'url' => array('/permintaan/f_permintaan_f')),
                                    ),
                                ));
                                endif;
                                
                                $this->widget('zii.widgets.CMenu', array(
                                    'items' => array(
                                        array('label' => 'INDIVIDU', 'url' => array('/permintaan/f_permintaan')),
                                    ),
                                ));
                                ?>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <!--
                                                <li class="treeview">
                                                    <a href="#">
                                                        <i class="fa fa-laptop"></i>
														
                                                        <span>UI Elements</span>
                                                        <i class="fa fa-angle-left pull-right"></i>
                                                    </a>
                                                    <ul class="treeview-menu">
                                                        <li><a href="pages/UI/general.html"><i class="fa fa-angle-double-right"></i> General</a></li>
                                                        <li><a href="pages/UI/icons.html"><i class="fa fa-angle-double-right"></i> Icons</a></li>
                                                        <li><a href="pages/UI/buttons.html"><i class="fa fa-angle-double-right"></i> Buttons</a></li>
                                                        <li><a href="pages/UI/sliders.html"><i class="fa fa-angle-double-right"></i> Sliders</a></li>
                                                        <li><a href="pages/UI/timeline.html"><i class="fa fa-angle-double-right"></i> Timeline</a></li>
                                                    </ul>
                                                </li>
                                                <li class="treeview">
                                                    <a href="#">
                                                        <i class="fa fa-edit"></i> <span>Forms</span>
                                                        <i class="fa fa-angle-left pull-right"></i>
                                                    </a>
                                                    <ul class="treeview-menu">
                                                        <li><a href="pages/forms/general.html"><i class="fa fa-angle-double-right"></i> General Elements</a></li>
                                                        <li><a href="pages/forms/advanced.html"><i class="fa fa-angle-double-right"></i> Advanced Elements</a></li>
                                                        <li><a href="pages/forms/editors.html"><i class="fa fa-angle-double-right"></i> Editors</a></li>
                                                    </ul>
                                                </li>
                                                <li class="treeview">
                                                    <a href="#">
                                                        <i class="fa fa-table"></i> <span>Tables</span>
                                                        <i class="fa fa-angle-left pull-right"></i>
                                                    </a>
                                                    <ul class="treeview-menu">
                                                        <li><a href="pages/tables/simple.html"><i class="fa fa-angle-double-right"></i> Simple tables</a></li>
                                                        <li><a href="pages/tables/data.html"><i class="fa fa-angle-double-right"></i> Data tables</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="pages/calendar.html">
                                                        <i class="fa fa-calendar"></i> <span>Calendar</span>
                                                        <small class="badge pull-right bg-red">3</small>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="pages/mailbox.html">
                                                        <i class="fa fa-envelope"></i> <span>Mailbox</span>
                                                        <small class="badge pull-right bg-yellow">12</small>
                                                    </a>
                                                </li>
                                                <li class="treeview">
                                                    <a href="#">
                                                        <i class="fa fa-folder"></i> <span>Examples</span>
                                                        <i class="fa fa-angle-left pull-right"></i>
                                                    </a>
                                                    <ul class="treeview-menu">
                                                        <li><a href="pages/examples/invoice.html"><i class="fa fa-angle-double-right"></i> Invoice</a></li>
                                                        <li><a href="pages/examples/login.html"><i class="fa fa-angle-double-right"></i> Login</a></li>
                                                        <li><a href="pages/examples/register.html"><i class="fa fa-angle-double-right"></i> Register</a></li>
                                                        <li><a href="pages/examples/lockscreen.html"><i class="fa fa-angle-double-right"></i> Lockscreen</a></li>
                                                        <li><a href="pages/examples/404.html"><i class="fa fa-angle-double-right"></i> 404 Error</a></li>
                                                        <li><a href="pages/examples/500.html"><i class="fa fa-angle-double-right"></i> 500 Error</a></li>
                                                        <li><a href="pages/examples/blank.html"><i class="fa fa-angle-double-right"></i> Blank Page</a></li>
                                                    </ul>
                                                </li>
                        -->

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <!-- Main content -->
				<?php echo $content; ?>    
              <!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
         <div id="footer" > <center>&copy; PENGEMBANGAN IT PERPUSTAKAAN UNIVERSITAS BRAWIJAYA</center></div>
        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
         <!-- InputMask -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/AdminLTE/dashboard.js" type="text/javascript"></script>     

        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/AdminLTE/demo.js" type="text/javascript"></script>
         <!-- alert -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/alert.js" type="text/javascript"></script>
        
      <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>
      <script type="text/javascript">
            $(function() {
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();

                //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                                'Last 7 Days': [moment().subtract('days', 6), moment()],
                                'Last 30 Days': [moment().subtract('days', 29), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                            },
                            startDate: moment().subtract('days', 29),
                            endDate: moment()
                        },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
                );

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass: 'iradio_flat-red'
                });

                //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();

                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });
            });
        </script>

    </body>
</html>