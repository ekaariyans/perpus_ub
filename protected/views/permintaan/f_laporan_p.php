<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'tpermintaan-f_laporan_p-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // See class documentation of CActiveForm for details on this,
        // you need to use the performAjaxValidation()-method described there.
        'enableAjaxValidation' => true,
    ));
    $this->endWidget();
    ?>
</div>
<!-- Menu Tab Utama-->
<ul class="nav nav-tabs" role="tablist">
    <li class="active"><a href="#buku" role="tab" data-toggle="tab">PERMINTAAN BUKU</a></li>
    <li><a href="#jurnal" role="tab" data-toggle="tab">PERMINTAAN JURNAL</a></li>
    <li><a href="#serial" role="tab" data-toggle="tab">PERMINTAAN SERIAL</a></li>
</ul>
<!-- Menu Tab Utama -->

<div class="box box-primary">
    <div class="box-header">
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#bd" role="tab" data-toggle="tab">Belum Terbeli </a></li>
            <li><a href="#sd" role="tab" data-toggle="tab">Sudah Dibeli</a></li>
        </ul>
        <!-- Tab panes -->

        <div class="tab-content">
            <div class="tab-pane active" id="buku">
                <div class="tab-content">
                    <div class="tab-pane active" id="bd">
                        <div class="span6">
                            <form class="well form-inline">

                                <div class="form-group">
                                    <label>Bahasa</label>
                                    <div class="input-group">
                                        <!--<?php //echo $form->dropDownList($modelBk, 'BAHASA', array('prompt'=>'----- Pilih Bahasa -----','1'=>'Indonesia', '2'=>'Inggris', '3'=>'Lainnya'), array('class'=>'form-control'));  ?>-->

                                        <select id="myselect" class="form-control">
                                            <option value="0">Semua Bahasa</option>
                                            <option value="1">Indonesia</option>
                                            <option value="2">Inggris</option>
                                            <option value="3">Lainnya</option>
                                        </select>
                                        <br />


                                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                                        <script>
                                            $(document).ready(function() {
                                                var x;
                                                $("select").change(function() {
                                                    x = $("#myselect option:selected").text();
                                                    if (x == "Indonesia") {
                                                        //$("span").text(x);
                                                        $("tr:not(.heading)").hide();
                                                        $("tr#" + x).show();
                                                    }
                                                    if (x == "Inggris") {
                                                        //$("span").text(x);
                                                        $("tr:not(.heading)").hide();
                                                        $("tr#" + x).show();
                                                    }
                                                    if (x == "Semua Bahasa") {
                                                        //$("span").text(x);
                                                        //$("tr:not(.heading)").hide();
                                                        $("tr").show();
                                                    }
                                                    var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=cetak/cetak&bhs=" + x;
                                                    //$("span#tes").text(link);
                                                    $("a#download").attr("href", link);
                                                });



                                                $("a.glyphicon.glyphicon-list-alt").click(function() {
                                                    var a = $(this).attr("id");
                                                    var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=permintaan/viewdetail&det=" + a;
                                                    //$("span#tes").text(link);

                                                    $(this).attr("href", link);
                                                })

                                                $("a.glyphicon.glyphicon-pencil").click(function() {
                                                    var a = $(this).attr("id");
                                                    var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=permintaan/editbuku&det=" + a;
                                                    //$("span#tes").text(link);

                                                    $(this).attr("href", link);
                                                })


                                            });

                                        </script>




                                    </div>
                                    <br>
                                    <div class="form-group">

                                        <a id="download" class="btn btn-default btn-flat">Download</a>
                                        <?php $tes = 0; ?>
                                    </div>
                            </form>

                        </div>	
                    </div>              	
                    <table id="bd1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="heading">
                                <th>ID Anggota</th>
                                <th>Tgl.Permintaan</th>
                                <th>Nama Peminta</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Bahasa</th>
                                <th>Penerbit</th>                   
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $model):
                                $cek = 1;
                                echo "<tr id=" . $model['BAHASA'] . ">";
                                ?>
                            <td><?php echo $model['ID_ANGGOTA']; ?></td>
                            <td><?php echo $model['TGL_PERMINTAAN']; ?></td>
                            <td><?php echo $model['NAMA_PEMINTA']; ?></td>
                            <td><?php echo $model['JUDUL']; ?></td>
                            <td><?php echo $model['PENGARANG']; ?></td>
                            <td><?php echo $model['BAHASA']; ?></td>
                            <td><?php echo $model['PENERBIT']; ?></td>
                            <td><?php echo $model['STATUS']; ?></td>
                            <td>



                                <a href class="glyphicon glyphicon-list-alt" id="<?php echo $model['K_PERMINTAAN'] ?>"></a>
                                &nbsp;&nbsp;&nbsp;
                                <a href class="glyphicon glyphicon-pencil" id="<?php echo $model['K_PERMINTAAN'] ?>"></a>
                                &nbsp;&nbsp;
                                <a href class="glyphicon glyphicon-remove" id="<?php echo $model['K_PERMINTAAN'] ?>"></a>
                            </td>
                            </tr>
                            <?php $cek++; ?>
<?php endforeach; ?>
                        </tbody>
                    </table>


                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Modal title Here</h4>
                                </div>
                                <div class="modal-body">
                                    <span id="tes"></span>
                                    <?php
                                    //$this->renderPartial('Permintaan/viewdetail', array('data'=>$data));
                                    ?>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- jQuery 2.0.2 -->
                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
                    <!-- page script -->
                    <script type="text/javascript">
                                            $(function() {
                                                $('#bd1').dataTable({
                                                    "bPaginate": true,
                                                    "bLengthChange": true,
                                                    "bFilter": false,
                                                    "bSort": true,
                                                    "bInfo": false,
                                                    "bAutoWidth": false
                                                });
                                            });
                    </script>
                </div>

                <div class="tab-pane" id="sd">
                    <div class="span6">
                        <form class="well form-inline">

                            <div class="form-group">
                                <label>Bahasa</label>
                                <div class="input-group">
                                    <!--<?php //echo $form->dropDownList($modelBk, 'BAHASA', array('prompt'=>'----- Pilih Bahasa -----','1'=>'Indonesia', '2'=>'Inggris', '3'=>'Lainnya'), array('class'=>'form-control'));  ?>-->

                                    <select id="myselect" class="form-control">
                                        <option value="0">Semua Bahasa</option>
                                        <option value="1">Indonesia</option>
                                        <option value="2">Inggris</option>
                                        <option value="3">Lainnya</option>
                                    </select>
                                    <br />


                                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                                    <script>
                                            $(document).ready(function() {
                                                var x;
                                                $("select").change(function() {
                                                    x = $("#myselect option:selected").text();
                                                    if (x == "Indonesia") {
                                                        //$("span").text(x);
                                                        $("tr:not(.heading)").hide();
                                                        $("tr#" + x).show();
                                                    }
                                                    if (x == "Inggris") {
                                                        //$("span").text(x);
                                                        $("tr:not(.heading)").hide();
                                                        $("tr#" + x).show();
                                                    }
                                                    if (x == "Semua Bahasa") {
                                                        //$("span").text(x);
                                                        //$("tr:not(.heading)").hide();
                                                        $("tr").show();
                                                    }
                                                    var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=cetak/cetak&bhs=" + x;
                                                    //$("span#tes").text(link);
                                                    $("a#download").attr("href", link);
                                                });

                                            });

                                    </script>




                                </div>
                                <br>
                                <div class="form-group">

                                    <a id="download" class="btn btn-default btn-flat">Download</a>

                                </div>
                        </form>

                    </div>	
                </div>                    	
                    <table id="sd1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="heading">
                            <th>ID Anggota</th>
                            <th>Tgl.Permintaan</th>
                            <th>Nama Peminta</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Bahasa</th>
                            <th>Penerbit</th>                   
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data1 as $model):
                            echo "<tr id=" . $model['BAHASA'] . ">";
                            ?>
                        <td><?php echo $model['ID_ANGGOTA']; ?></td>
                        <td><?php echo $model['TGL_PERMINTAAN']; ?></td>
                        <td><?php echo $model['NAMA_PEMINTA']; ?></td>
                        <td><?php echo $model['JUDUL']; ?></td>
                        <td><?php echo $model['PENGARANG']; ?></td>
                        <td><?php echo $model['BAHASA']; ?></td>
                        <td><?php echo $model['PENERBIT']; ?></td>
                        <td><?php echo $model['STATUS']; ?></td>
                        <td><span class="glyphicon glyphicon-list-alt"></span><span class="glyphicon glyphicon-pencil"></span>
                            <span class="glyphicon glyphicon-remove"></span></td>
                        </tr>
<?php endforeach; ?>
                    </tbody>
                </table>

                <!-- jQuery 2.0.2 -->
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
                <!-- page script -->
                <script type="text/javascript">
                                            $(function() {
                                                $('#sd1').dataTable({
                                                    "bPaginate": true,
                                                    "bLengthChange": true,
                                                    "bFilter": false,
                                                    "bSort": true,
                                                    "bInfo": false,
                                                    "bAutoWidth": false
                                                });
                                            });
                </script>
            </div>
        </div>
    </div  > 

    <div class="tab-pane" id="jurnal">

        <?php
        // echo CHtml::link('Cetak dokumen', array('cetak/cetak'));
        ?>
        <div class="box">

            <div class="span6">
                <form class="well form-inline">
                    <!-- Date range -->
                    <!-- Date dd/mm/yyyy -->
                    <div class="form-group">
                        <label>Dari Tanggal:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                    <!-- Date dd/mm/yyyy -->
                    <div class="form-group">
                        <label>Sampai Tanggal:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                    <!-- select -->
                    <div class="form-group">
                        <label>Bahasa</label><br>
                        <select class="form-control">
                            <option>Indonesia</option>
                            <option>Inggris</option>
                            <option>Lainnya</option>
                        </select>
                    </div>	
                    &nbsp;&nbsp;&nbsp;
                    <button type="submit" class="btn btn-warning">Search</button>
                    <a href="<?php echo Yii::app()->request->baseUrl . '/assets/TemplateForm/FormReqBuku.xls'; ?>" class="btn btn-default btn-flat">Download</a>
                </form>
            </div>	
        </div>   
        <table id="bd2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID Anggota</th>
                    <th>Tgl.Permintaan</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Jenis</th>
                    <th>Bahasa</th>
                    <th>Harga</th>
                    <th>Link Website</th>
                </tr>
            </thead>
            <tbody>    
<?php foreach ($dataJur as $modelJur): ?>
                    <tr>
                        <td><?php echo $modelJur['ID_ANGGOTA']; ?></td>
                        <td><?php echo $modelJur['TGL_PERMINTAAN']; ?></td>
                        <td><?php echo $modelJur['JUDUL']; ?></td>
                        <td><?php echo $modelJur['PENGARANG']; ?></td>
                        <td><?php echo $modelJur['JENIS']; ?></td>
                        <td><?php echo $modelJur['BAHASA']; ?></td>
                        <td><?php echo $modelJur['HARGA']; ?></td>
                        <td><?php echo $modelJur['LINK_WEBSITE']; ?></td>
                    </tr>
<?php endforeach; ?>
            </tbody>
        </table>

        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- page script -->
        <script type="text/javascript">
                                            $(function() {                                                
                                                $('#bd2').dataTable({
                                                    "bPaginate": true,
                                                    "bLengthChange": true,
                                                    "bFilter": false,
                                                    "bSort": true,
                                                    "bInfo": false,
                                                    "bAutoWidth": false
                                                });
                                            });
        </script>

    </div><!--Jurnal-->



    <div class="tab-pane" id="serial">

        <?php
        // echo CHtml::link('Cetak dokumen', array('cetak/cetak'));
        ?>
        <div class="box">

            <div class="span6">
                <form class="well form-inline">
                    <!-- Date range -->
                    <!-- Date dd/mm/yyyy -->
                    <div class="form-group">
                        <label>Dari Tanggal:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                    <!-- Date dd/mm/yyyy -->
                    <div class="form-group">
                        <label>Sampai Tanggal:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                    <!-- select -->
                    <div class="form-group">
                        <label>Bahasa</label><br>
                        <select class="form-control">
                            <option>Indonesia</option>
                            <option>Inggris</option>
                            <option>Lainnya</option>
                        </select>
                    </div>	
                    &nbsp;&nbsp;&nbsp;
                    <button type="submit" class="btn btn-warning">Search</button>
                    <a href="<?php echo Yii::app()->request->baseUrl . '/assets/TemplateForm/FormReqBuku.xls'; ?>" class="btn btn-default btn-flat">Download</a>

                </form>
            </div>	
        </div>   
        <table  class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID Anggota</th>
                    <th>Tgl.Permintaan</th>
                    <th>Judul</th>
                    <th>Volume</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Jenis</th>
                    <th>Bahasa</th>
                    <th>Harga</th>
                    <th>Link Website</th>
                </tr>
            </thead>
            <tbody>
<?php foreach ($dataSer as $modelSer): ?>
                    <tr>
                        <td><?php echo $modelSer['ID_ANGGOTA']; ?></td>
                        <td><?php echo $modelSer['TGL_PERMINTAAN']; ?></td>
                        <td><?php echo $modelSer['JUDUL']; ?></td>
                        <td><?php echo $modelSer['VOLUME']; ?></td>
                        <td><?php echo $modelSer['TAHUN']; ?></td>
                        <td><?php echo $modelSer['JENIS']; ?></td>
                        <td><?php echo $modelSer['BAHASA']; ?></td>
                        <td><?php echo $modelSer['HARGA']; ?></td>
                        <td><?php echo $modelSer['LINK_WEBSITE']; ?></td>
                    </tr>
<?php endforeach; ?>
            </tbody>
        </table>

        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $('#bd3').dataTable({
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": false,
                    "bAutoWidth": false
                });
            });
        </script>
    </div><!--Serial-->

</div>
</div><!--LIST-->  
</div>
<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
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