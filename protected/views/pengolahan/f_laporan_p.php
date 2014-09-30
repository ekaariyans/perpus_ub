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
	</div>
        
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="buku">
                <div class="tab-content">
               <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#bd" role="tab" data-toggle="tab">Belum Terbeli</a></li>
                    <li><a href="#sd" role="tab" data-toggle="tab">Sudah Dibeli</a></li>
                </ul>
                    <div class="tab-pane active" id="bd">
                        <div class="span6">
                            <form class="well form-inline">

                                <div class="form-group">
                                    <label>Bahasa</label>
                                    <div class="input-group">
                                        <select id="myselect" class="form-control">
                                            <option value="0">Semua Bahasa</option>
                                            <option value="1">Indonesia</option>
                                            <option value="2">Inggris</option>
                                            <option value="3">Lainnya</option>
                                        </select>
                                        <br />
                                    </div>
                                    <br>
                                    <div class="form-group">

                                        <a id="downloadbd1" class="btn btn-default btn-flat">Download</a>
                                        <?php $tes = 0; ?>
                                    </div>
                            </form>

                        </div>	
                    </div>              	
                    <table id="bd1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="heading">
                            	<th><input type="checkbox" id="selectallbd1"/></th>
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
							if($model['ID_STATUS']==0):
                                echo "<tr id=" . $model['BAHASA'] . ">";
                            ?>
                            <td><input class="cbx" type="checkbox" name="cbxbd1[]" value="<?php echo $model['ID_PERMINTAAN_BUKU'] ?>"></td>
                            <td><?php echo $model['ID_ANGGOTA']; ?></td>
                            <td><?php echo $model['TGL_PERMINTAAN']; ?></td>
                            <td><?php echo $model['NAMA_PEMINTA']; ?></td>
                            <td><?php echo $model['JUDUL']; ?></td>
                            <td><?php echo $model['PENGARANG']; ?></td>
                            <td><?php echo $model['BAHASA']; ?></td>
                            <td><?php echo $model['PENERBIT']; ?></td>
                            <td><?php echo $model['STATUS']; ?></td>
                            <td>
                                <a href class="glyphicon glyphicon-list-alt" id="<?php echo $model['ID_PERMINTAAN_BUKU'] ?>" name="detailbuku"></a>
                                &nbsp;&nbsp;&nbsp;
                                <a href class="glyphicon glyphicon-pencil" id="<?php echo $model['ID_PERMINTAAN_BUKU'] ?>" name="editbuku"></a>
                                &nbsp;&nbsp;
                                <a href class="glyphicon glyphicon-remove" id="<?php echo $model['ID_PERMINTAAN_BUKU'] ?>" name="hapusbuku" onclick="return confirm('Are you sure you want to delete this item?')"></a>
                            </td>
                            </tr>
						<?php endif; endforeach; ?>
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
                </div>

                <div class="tab-pane" id="sd">
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
                                    <input name="tanggalsd1" id="t1sd1" type="date" class="form-control" />
                                    <!--
                                    <input name="tanggalsd1" id="t1sd1" type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                    -->
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label>Sampai Tanggal:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name="tanggalsd1" id="t2sd1" type="date" class="form-control" />
                                    <!--
                                    <input name="tanggalsd1" id="t2sd1" type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
 									-->                               
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                    
                            <div class="form-group">
                                <label>Bahasa</label>
                                <div class="input-group">
                                    <!--<?php //echo $form->dropDownList($modelBk, 'BAHASA', array('prompt'=>'----- Pilih Bahasa -----','1'=>'Indonesia', '2'=>'Inggris', '3'=>'Lainnya'), array('class'=>'form-control'));  ?>-->

                                    <select id="selectsd1" class="form-control">
                                        <option value="0">Semua Bahasa</option>
                                        <option value="1">Indonesia</option>
                                        <option value="2">Inggris</option>
                                        <option value="3">Lainnya</option>
                                    </select>
                                </div>
                                <br>
                                <div class="form-group">

                                    <a id="downloadsd1" class="btn btn-default btn-flat">Download</a>

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
                        <?php foreach ($data as $model):
						if($model['ID_STATUS']==1):
                            echo "<tr class=\"isi\" id=".$model['BAHASA']." name=".$model['TGL_PERMINTAAN'].">";
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
                                <a href class="glyphicon glyphicon-list-alt" id="<?php echo $model['ID_PERMINTAAN_BUKU'] ?>" name="detailbuku"></a>
                                &nbsp;&nbsp;&nbsp;
                                <a href class="glyphicon glyphicon-pencil" id="<?php echo $model['ID_PERMINTAAN_BUKU'] ?>" name="editbuku"></a>
                                &nbsp;&nbsp;
                                <a href class="glyphicon glyphicon-remove" id="<?php echo $model['ID_PERMINTAAN_BUKU'] ?>" name="hapusbuku"  onclick="return confirm('Are you sure you want to delete this item?')"></a>
                            </td>
                            </tr>
					<?php endif; endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
		</div>
  
  
  
  
	<!-- JURNAL AREA -->
    <div class="tab-pane" id="jurnal">
		<div class="tab-content">
			<ul class="nav nav-tabs" role="tablist">
           <li class="active"><a href="#bd2" role="tab" data-toggle="tab">Belum Terbeli</a></li>
           <li><a href="#sd2" role="tab" data-toggle="tab">Sudah Dibeli</a></li>
           </ul>
           
           <div class="tab-pane active" id="bd2">
            <div class="span6">
				<form class="well form-inline">
                    <div class="form-group">
                        <label>Bahasa</label>
                        <div class="input-group">
							<select id="selectbd2" class="form-control">
                                <option value="0">Semua Bahasa</option>
                                <option value="1">Indonesia</option>
                                <option value="2">Inggris</option>
                                <option value="3">Lainnya</option>
                            </select>
                            <br />
						</div>
                        <br>
                        <div class="form-group">
							<a id="downloadbd2" class="btn btn-default btn-flat">Download</a>
                        </div>
					</div>
                </form>
            </div>	
        
        
           
        <table id="tbd2" class="table table-bordered table-striped">
            <thead>
                <tr class="heading">
                    <th>ID Anggota</th>
                    <th>Tgl.Permintaan</th>
                    <th>Nama Peminta</th>
                    <th>Judul</th>
                    <th>Jenis</th>
                    <th>Bahasa</th>
                    <th>Harga</th>                   
                    <th>Status</th>
					<th>Prioritas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>    
				<?php foreach ($dataJur as $modelJur): 
				if($modelJur['ID_STATUS']==0):
					echo "<tr id=" . $modelJur['BAHASA'] . ">";
				?>
                    <td><?php echo $modelJur['ID_ANGGOTA']; ?></td>
                    <td><?php echo $modelJur['TGL_PERMINTAAN']; ?></td>
                    <td><?php echo $modelJur['NAMA_PEMINTA']; ?></td>
                    <td><?php echo $modelJur['JUDUL']; ?></td>
                    <td><?php echo $modelJur['JENIS']; ?></td>
                    <td><?php echo $modelJur['BAHASA']; ?></td>
                    <td><?php echo $modelJur['HARGA']; ?></td>
                    <td><?php echo $modelJur['STATUS']; ?></td>
					<td><?php echo $modelJur['PRIORITAS']; ?></td>
                    <td>
                                <a href class="glyphicon glyphicon-list-alt" id="<?php echo $modelJur['ID_PERMINTAAN_JURNAL'] ?>" name="detailbuku"></a>
                                &nbsp;&nbsp;&nbsp;
                                <a href class="glyphicon glyphicon-pencil" id="<?php echo $modelJur['ID_PERMINTAAN_JURNAL'] ?>" name="editbuku"></a>
                                &nbsp;&nbsp;
                                <a href class="glyphicon glyphicon-remove" id="<?php echo $modelJur['ID_PERMINTAAN_JURNAL'] ?>" name="hapusbuku" onclick="return confirm('Are you sure you want to delete this item?')"></a>
                            </td>
                    </tr>
				<?php endif; endforeach; ?>
            </tbody>
        </table>
		</div><!--tab pane bd2-->
        

         <!-- Tab Pane sd2 -->
         <div class="tab-pane" id="sd2">
             <div class="span6"><!-- span6 sd2 -->
				<form class="well form-inline">
							<!-- Date range -->
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label>Dari Tanggal:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name="tanggalsd2" id="t1sd2" type="date" class="form-control" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label>Sampai Tanggal:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name="tanggalsd2" id="t2sd2" type="date" class="form-control" />                               
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                    
                            <div class="form-group">
                                <label>Bahasa</label>
                                <div class="input-group">
                                    <select id="selectsd2" class="form-control">
                                        <option value="0">Semua Bahasa</option>
                                        <option value="1">Indonesia</option>
                                        <option value="2">Inggris</option>
                                        <option value="3">Lainnya</option>
                                    </select>
                                </div>
                                <br>
                                <div class="form-group">

                                    <a id="downloadsd2" class="btn btn-default btn-flat">Download</a>

                                </div>
							</div>
                        </form>
             </div><!-- span6 sd2 -->
			 
			 <table id="tsd2" class="table table-bordered table-striped">
                <thead>
                <tr class="heading">
                    <th>ID Anggota</th>
                    <th>Tgl.Permintaan</th>
                    <th>Nama Peminta</th>
                    <th>Judul</th>
                    <th>Jenis</th>
                    <th>Bahasa</th>
                    <th>Harga</th>                   
                    <th>Status</th>
					<th>Prioritas</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($dataJur as $modelJur):
					if($modelJur['ID_STATUS']==1):
                        echo "<tr class=\"isi\" id=".$modelJur['BAHASA']." name=".$modelJur['TGL_PERMINTAAN'].">";
                ?>
                    <td><?php echo $modelJur['ID_ANGGOTA']; ?></td>
                    <td><?php echo $modelJur['TGL_PERMINTAAN']; ?></td>
                    <td><?php echo $modelJur['NAMA_PEMINTA']; ?></td>
                    <td><?php echo $modelJur['JUDUL']; ?></td>
                    <td><?php echo $modelJur['JENIS']; ?></td>
                    <td><?php echo $modelJur['BAHASA']; ?></td>
                    <td><?php echo $modelJur['HARGA']; ?></td>
                    <td><?php echo $modelJur['STATUS']; ?></td>
					<td><?php echo $modelJur['PRIORITAS']; ?></td>
                    <td>
                                <a href class="glyphicon glyphicon-list-alt" id="<?php echo $modelJur['ID_PERMINTAAN_JURNAL'] ?>" name="detailbuku"></a>
                                &nbsp;&nbsp;&nbsp;
                                <a href class="glyphicon glyphicon-pencil" id="<?php echo $modelJur['ID_PERMINTAAN_JURNAL'] ?>" name="editbuku"></a>
                                &nbsp;&nbsp;
                                <a href class="glyphicon glyphicon-remove" id="<?php echo $modelJur['ID_PERMINTAAN_JURNAL'] ?>" name="hapusbuku" onclick="return confirm('Are you sure you want to delete this item?')"></a>
                            </td>
                </tr>
				<?php endif; endforeach; ?>
                </tbody>
             </table>
			 
         </div><!-- Tab Pane sd2 -->
               
	</div><!--box bd2-->
</div><!--Jurnal-->

		


    <div class="tab-pane" id="serial">
	<div class="tab-content">
			<ul class="nav nav-tabs" role="tablist">
           <li class="active"><a href="#bd3" role="tab" data-toggle="tab">Belum Terbeli</a></li>
           <li><a href="#sd3" role="tab" data-toggle="tab">Sudah Dibeli</a></li>
           </ul>
		   
		<div class="tab-pane active" id="bd3">
            <div class="span6">
			<form class="well form-inline">
                    <div class="form-group">
                        <label>Bahasa</label>
                        <div class="input-group">
							<select id="selectbd3" class="form-control">
                                <option value="0">Semua Bahasa</option>
                                <option value="1">Indonesia</option>
                                <option value="2">Inggris</option>
                                <option value="3">Lainnya</option>
                            </select>
                            <br />
						</div>
                        <br>
                        <div class="form-group">
							<a id="downloadbd3" class="btn btn-default btn-flat">Download</a>
                        </div>
					</div>
            </form>
			</div>
			<!-- tabel bd3 area -->
			<table id="tbd3" class="table table-bordered table-striped">
            <thead>
                <tr class="heading">
                    <th>ID Anggota</th>
                    <th>Tgl.Permintaan</th>
                    <th>Nama Peminta</th>
                    <th>Judul</th>
                    <th>Volume</th>
					<th>Tahun</th>
					<th>Jenis</th>
                    <th>Bahasa</th>
					<th>Harga</th>
                    <th>Prioritas</th>                   
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($dataSer as $modelSer):
					if($modelSer['ID_STATUS']==0):
                     echo "<tr id=" . $modelSer['BAHASA'] . ">";
                ?>
                <td><?php echo $modelSer['ID_ANGGOTA']; ?></td>
                <td><?php echo $modelSer['TGL_PERMINTAAN']; ?></td>
                <td><?php echo $modelSer['NAMA_PEMINTA']; ?></td>
                <td><?php echo $modelSer['JUDUL']; ?></td>
                <td><?php echo $modelSer['VOLUME']; ?></td>
				<td><?php echo $modelSer['TAHUN']; ?></td>
				<td><?php echo $modelSer['JENIS']; ?></td>
                <td><?php echo $modelSer['BAHASA']; ?></td>
                <td><?php echo $modelSer['HARGA']; ?></td>
				<td><?php echo $modelSer['PRIORITAS']; ?></td>
                <td><?php echo $modelSer['STATUS']; ?></td>
                <td>
                                <a href class="glyphicon glyphicon-list-alt" id="<?php echo $modelSer['ID_PERMINTAAN_SERIAL'] ?>" name="detailbuku"></a>
                                &nbsp;&nbsp;&nbsp;
                                <a href class="glyphicon glyphicon-pencil" id="<?php echo $modelSer['ID_PERMINTAAN_SERIAL'] ?>" name="editbuku"></a>
                                &nbsp;&nbsp;
                                <a href class="glyphicon glyphicon-remove" id="<?php echo $modelSer['ID_PERMINTAAN_SERIAL'] ?>" name="hapusbuku" onclick="return confirm('Are you sure you want to delete this item?')"></a>
                            </td>
                </tr>
				<?php endif; endforeach; ?>
            </tbody>
            </table>
			
			
		</div><!-- tab pane bd3 -->
		
		
		<div class="tab-pane" id="sd3">
            <div class="span6">
                <form class="well form-inline">
				    <div class="form-group">
					<label>Dari Tanggal:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
								<i class="fa fa-calendar"></i>
                            </div>
                            <input name="tanggalsd3" id="t1sd3" type="date" class="form-control" />
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
   
                    <div class="form-group">
                    <label>Sampai Tanggal:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                             </div>
                            <input name="tanggalsd3" id="t2sd3" type="date" class="form-control" />                               
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                    
                    <div class="form-group">
                    <label>Bahasa</label>
                        <div class="input-group">
                            <select id="selectsd3" class="form-control">
                                <option value="0">Semua Bahasa</option>
                                <option value="1">Indonesia</option>
                                <option value="2">Inggris</option>
                                <option value="3">Lainnya</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
							<a id="downloadsd3" class="btn btn-default btn-flat">Download</a>
                        </div>
					</div>
                </form>
            </div>	<!-- span6 -->
			
			<table id="tsd3" class="table table-bordered table-striped">
            <thead>
                <tr class="heading">
                    <th>ID Anggota</th>
                    <th>Tgl.Permintaan</th>
                    <th>Nama Peminta</th>
                    <th>Judul</th>
                    <th>Volume</th>
					<th>Tahun</th>
					<th>Jenis</th>
                    <th>Bahasa</th>
					<th>Harga</th>
                    <th>Prioritas</th>                   
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($dataSer as $modelSer):
					if($modelSer['ID_STATUS']==1):
                     echo "<tr class=\"isi\" id=".$modelSer['BAHASA']." name=".$modelSer['TGL_PERMINTAAN'].">";
                ?>
                    <td><?php echo $modelSer['ID_ANGGOTA']; ?></td>
					<td><?php echo $modelSer['TGL_PERMINTAAN']; ?></td>
					<td><?php echo $modelSer['NAMA_PEMINTA']; ?></td>
					<td><?php echo $modelSer['JUDUL']; ?></td>
					<td><?php echo $modelSer['VOLUME']; ?></td>
					<td><?php echo $modelSer['TAHUN']; ?></td>
					<td><?php echo $modelSer['JENIS']; ?></td>
					<td><?php echo $modelSer['BAHASA']; ?></td>
					<td><?php echo $modelSer['HARGA']; ?></td>
					<td><?php echo $modelSer['PRIORITAS']; ?></td>
					<td><?php echo $modelSer['STATUS']; ?></td>
					<td>
                                <a href class="glyphicon glyphicon-list-alt" id="<?php echo $modelSer['ID_PERMINTAAN_SERIAL'] ?>" name="detailbuku"></a>
                                &nbsp;&nbsp;&nbsp;
                                <a href class="glyphicon glyphicon-pencil" id="<?php echo $modelSer['ID_PERMINTAAN_SERIAL'] ?>" name="editbuku"></a>
                                &nbsp;&nbsp;
                                <a href class="glyphicon glyphicon-remove" id="<?php echo $modelSer['ID_PERMINTAAN_SERIAL'] ?>" name="hapusbuku" onclick="return confirm('Are you sure you want to delete this item?')"></a>
                            </td>
                    </tr>
			<?php endif; endforeach; ?>
            </tbody>
			</table>
		</div><!-- tab pane sd3 -->

    </div>  <!-- content Serial-->
	</div>
		
		
		
        

        <!-- page script -->
        <script type="text/javascript">
       /*     $(function() {
                $('#bd3').dataTable({
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": false,
                    "bAutoWidth": false
                });
            });*/
        </script>
    </div><!--Serial-->

</div>
</div><!--LIST-->  




<!-- SCRIPT AREA -->
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

<!-- script buku belum dibeli-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
    	var x;
		x = $("#myselect option:selected").text();
		var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=cetak/cetak&status=bd1&bhs=" + x;
		$("a#downloadbd1").attr("href", link);
		
        $("select#myselect").change(function() {
			x = $("#myselect option:selected").text();
			if (x == "Indonesia") {
				$("table#bd1 tr:not(.heading)").hide();
				$("table#bd1 tr#" + x).show();
			}
			if (x == "Inggris") {
				$("table#bd1 tr:not(.heading)").hide();
				$("table#bd1 tr#" + x).show();
			}
			if (x == "Semua Bahasa") {
				$("table#bd1 tr").show();
			}
			var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=cetak/cetak&status=bd1&bhs=" + x;
			//$("span#tes").text(link);
			$("a#downloadbd1").attr("href", link);
   		});

		$("a.glyphicon.glyphicon-list-alt").click(function() {
            var a = $(this).attr("id");
            var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=pengolahan/viewdetail&det=" + a;
			$(this).attr("href", link);
        })

        $("a.glyphicon.glyphicon-pencil").click(function() {
            var a = $(this).attr("id");
            var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=pengolahan/editbuku&det=" + a;
            $(this).attr("href", link);
        })
	});
</script>


<!-- script buku sudah dibeli -->
<script>
$(document).ready(function(){
	var x = $("#selectsd1 option:selected").text();
	var start_time  = $("#t1sd1").val(); //2013-09-5
	var end_time    = $("#t2sd1").val();
	var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=cetak/cetak&status=sd1&bhs="+x +"&t1="+start_time +"&t2="+end_time;
	$("a#downloadsd1").attr("href", link);
		
	$("input[name='tanggalsd1'],select#selectsd1").change(function() {
        x = $("#selectsd1 option:selected").text();
		start_time  = $("#t1sd1").val(); //2013-09-5
		end_time    = $("#t2sd1").val(); //2013-09-10

        if (x == "Indonesia") {
             $("table#sd1 tr:not(.heading)").hide();
             $("table#sd1 tr#" + x).show();
			 filter_tgl(x,start_time,end_time);
        }
        if (x == "Inggris") {
            $("table#sd1 tr:not(.heading)").hide();
    	    $("table#sd1 tr#" + x).show();
			filter_tgl(x,start_time,end_time);
        }
        if (x == "Semua Bahasa") {
             $("table#sd1 tr").show();
			 filter_tgl(x,start_time,end_time);
        }
		//set link
		var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=cetak/cetak&status=sd1&bhs="+x +"&t1="+start_time +"&t2="+end_time;
		$("a#downloadsd1").attr("href", link);
    });
  	
	function filter_tgl(x,start_time,end_time){
		$( "table#sd1 tr.isi" ).filter(function() {
			return (new Date($(this).attr("name")) < new Date(start_time));
		}).hide();
			
		$( "table#sd1 tr.isi" ).filter(function() {
			return (new Date($(this).attr("name")) > new Date(end_time));
		}).hide();
	}

});
</script>


<!-- script jurnal belum dibeli-->
<script>
	$(document).ready(function() {
    	var x;
		x = $("#selectbd2 option:selected").text();
		var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=cetak/CetakJurnal&status=bd2&bhs=" + x;
		$("a#downloadbd2").attr("href", link);
		
        $("select#selectbd2").change(function() {
			x = $("#selectbd2 option:selected").text();
			if (x == "Indonesia") {
				$("table#tbd2 tr:not(.heading)").hide();
				$("table#tbd2 tr#" + x).show();
			}
			if (x == "Inggris") {
				$("table#tbd2 tr:not(.heading)").hide();
				$("table#tbd2 tr#" + x).show();
			}
			if (x == "Semua Bahasa") {
				$("table#tbd2 tr").show();
			}
			var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=cetak/CetakJurnal&status=bd2&bhs=" + x;
			//$("span#tes").text(link);
			$("a#downloadbd2").attr("href", link);
   		});

		$("a.glyphicon.glyphicon-list-alt").click(function() {
            var a = $(this).attr("id");
            var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=pengolahan/viewdetail&det=" + a;
			$(this).attr("href", link);
        })

        $("a.glyphicon.glyphicon-pencil").click(function() {
            var a = $(this).attr("id");
            var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=pengolahan/editbuku&det=" + a;
            $(this).attr("href", link);
        })
	});
</script>

<!-- script jurnal sudah dibeli -->
<script>
$(document).ready(function(){
	var x = $("#selectsd2 option:selected").text();
	var start_time  = $("#t1sd2").val();
	var end_time    = $("#t2sd2").val();
	var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=cetak/CetakJurnal&status=sd2&bhs="+x +"&t1="+start_time +"&t2="+end_time;
	$("a#downloadsd2").attr("href", link);
		
	$("input[name='tanggalsd2'],select#selectsd2").change(function() {
        x = $("#selectsd2 option:selected").text();
		start_time  = $("#t1sd2").val(); //2013-09-5
		end_time    = $("#t2sd2").val(); //2013-09-10
		
        if (x == "Indonesia") {
             $("table#tsd2 tr:not(.heading)").hide();
             $("table#tsd2 tr#" + x).show();
			 filter_tgl(x,start_time,end_time);
        }
        if (x == "Inggris") {
            $("table#tsd2 tr:not(.heading)").hide();
    	    $("table#tsd2 tr#" + x).show();
			filter_tgl(x,start_time,end_time);
        }
        if (x == "Semua Bahasa") {
             $("table#tsd2 tr").show();
			 filter_tgl(x,start_time,end_time);
        }
		//set link
		var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=cetak/CetakJurnal&status=sd2&bhs="+x +"&t1="+start_time +"&t2="+end_time;
		$("a#downloadsd2").attr("href", link);
    });
  	
	function filter_tgl(x,start_time,end_time){
		$( "table#tsd2 tr.isi" ).filter(function() {
			return (new Date($(this).attr("name")) < new Date(start_time));
		}).hide();
			
		$( "table#tsd2 tr.isi" ).filter(function() {
			return (new Date($(this).attr("name")) > new Date(end_time));
		}).hide();
	}

});
</script>


<!-- script serial belum dibeli-->
<script>
	$(document).ready(function() {
    	var x;
		x = $("#selectbd3 option:selected").text();
		var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=cetak/CetakSerial&status=bd3&bhs=" + x;
		$("a#downloadbd3").attr("href", link);
		
        $("select#selectbd3").change(function() {
			x = $("#selectbd3 option:selected").text();
			if (x == "Indonesia") {
				$("table#tbd3 tr:not(.heading)").hide();
				$("table#tbd3 tr#" + x).show();
			}
			if (x == "Inggris") {
				$("table#tbd3 tr:not(.heading)").hide();
				$("table#tbd3 tr#" + x).show();
			}
			if (x == "Semua Bahasa") {
				$("table#tbd3 tr").show();
			}
			var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=cetak/CetakJurnal&status=bd3&bhs=" + x;
			$("a#downloadbd3").attr("href", link);
   		});

		$("table#bd1 a.glyphicon.glyphicon-list-alt,table#bd1 a.glyphicon.glyphicon-pencil,table#bd1 a.glyphicon.glyphicon-remove,table#sd1 a.glyphicon.glyphicon-list-alt,table#sd1 a.glyphicon.glyphicon-pencil,table#sd1 a.glyphicon.glyphicon-remove").click(function() {
            var a = $(this).attr("id");
			var b = $(this).attr("name");
            var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=pengolahan/editbuku&det=" + a+"&nama="+b;
			$(this).attr("href", link);
        })
		
		$("table#tbd2 a.glyphicon.glyphicon-list-alt,table#tbd2 a.glyphicon.glyphicon-pencil,table#tbd2 a.glyphicon.glyphicon-remove,table#tsd2 a.glyphicon.glyphicon-list-alt,table#tsd2 a.glyphicon.glyphicon-pencil,table#tsd2 a.glyphicon.glyphicon-remove").click(function() {
            var a = $(this).attr("id");
			var b = $(this).attr("name");
            var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=pengolahan/editjurnal&det=" + a+"&nama="+b;
			$(this).attr("href", link);
        })
		
		$("table#tbd3 a.glyphicon.glyphicon-list-alt,table#tbd3 a.glyphicon.glyphicon-pencil,table#tbd3 a.glyphicon.glyphicon-remove,table#tsd3 a.glyphicon.glyphicon-list-alt,table#tsd3 a.glyphicon.glyphicon-pencil,table#tsd3 a.glyphicon.glyphicon-remove").click(function() {
            var a = $(this).attr("id");
			var b = $(this).attr("name");
            var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=pengolahan/editserial&det=" + a+"&nama="+b;
			$(this).attr("href", link);
        })
		
		
	});
</script>

<!-- script serial sudah dibeli -->
<script>
$(document).ready(function(){
	var x = $("#selectsd3 option:selected").text();
	var start_time  = $("#t1sd3").val();
	var end_time    = $("#t2sd3").val();
	var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=cetak/CetakSerial&status=sd3&bhs="+x +"&t1="+start_time +"&t2="+end_time;
	$("a#downloadsd3").attr("href", link);
		
	$("input[name='tanggalsd3'],select#selectsd3").change(function() {
        x = $("#selectsd3 option:selected").text();
		start_time  = $("#t1sd3").val(); //2013-09-5
		end_time    = $("#t2sd3").val(); //2013-09-10
		
        if (x == "Indonesia") {
             $("table#tsd3 tr:not(.heading)").hide();
             $("table#tsd3 tr#" + x).show();
			 filter_tgl(x,start_time,end_time);
        }
        if (x == "Inggris") {
            $("table#tsd3 tr:not(.heading)").hide();
    	    $("table#tsd3 tr#" + x).show();
			filter_tgl(x,start_time,end_time);
        }
        if (x == "Semua Bahasa") {
             $("table#tsd3 tr").show();
			 filter_tgl(x,start_time,end_time);
        }
		//set link
		var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=cetak/CetakSerial&status=sd3&bhs="+x +"&t1="+start_time +"&t2="+end_time;
		$("a#downloadsd3").attr("href", link);
    });
  	
	function filter_tgl(x,start_time,end_time){
		$( "table#tsd3 tr.isi" ).filter(function() {
			return (new Date($(this).attr("name")) < new Date(start_time));
		}).hide();
			
		$( "table#tsd3 tr.isi" ).filter(function() {
			return (new Date($(this).attr("name")) > new Date(end_time));
		}).hide();
	}

});
</script>


<!-- Script Tabel -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#bd1,#sd1,#tbd2,#tsd2,#tbd3,#tsd3').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": false,
            "bSort": true,
            "bInfo": false,
            "bAutoWidth": false
        });
    });
</script>


<script>
$(document).ready(function() {
    $('#selectallbd1').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.cbx').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.cbx').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
});
</script>