<div class="form-horizontal" role="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'permintaan-f_permintaan-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // See class documentation of CActiveForm for details on this,
        // you need to use the performAjaxValidation()-method described there.
        'enableAjaxValidation' => false,
    ));
    ?>


    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#Form" role="tab" data-toggle="tab">FORM PERMINTAAN </a></li>
        <li><a href="#Permintaan" role="tab" data-toggle="tab">DAFTAR PERMINTAAN</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="Form"><?php echo $form->errorSummary($modelJur); ?>
            <div class="box box-primary">
                <div class="box-header">
                    <h4 class="box-title">Form Permintaan Katalog</h4>
                </div>
                    <?php echo $form->errorSummary($model); ?>
                <div class="form-group">
                    <label class="col-sm-1 control-label"></label>
                    <?php
                    echo $form->dropDownList($model, 'K_JENIS', array('prompt' => '----- Jenis Permintaan -----', '1' => 'Buku', '2' => 'Jurnal', '3' => 'Serial'), array(
                        'onchange' => '	
                  							 if(this.value==1)
											{ 	
                  								document.getElementById("buku").style.display="block";
                  								document.getElementById("jurnal").style.display="none";
                  								document.getElementById("serial").style.display="none";
                  								document.getElementById("button").style.visibility="visible";
                  								}
                  							else if(this.value==2)
											{ 
                  								document.getElementById("buku").style.display="none";
                  								document.getElementById("jurnal").style.display="block";
                  								document.getElementById("serial").style.display="none";
                  								document.getElementById("button").style.visibility="visible";
                  								}
                  							else if(this.value==3)
											{ 
                  								document.getElementById("buku").style.display="none";
                  								document.getElementById("jurnal").style.display="none";
                  								document.getElementById("serial").style.display="block";
                  								document.getElementById("button").style.visibility="visible";
                  								}
                  							'
                    ));
                    ?>

                </div>     

                <div id="buku">
                    <div class="form-group">
                            <?php echo $form->labelEx($modelBk, 'NAMA_PEMINTA', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->textField($modelBk, 'NAMA_PEMINTA', array('class' => 'form-control', 'placeholder' => 'Nama Peminta')); ?>
                        <?php echo CHtml::error($modelBk, 'NAMA_PEMINTA'); ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                            <?php echo $form->labelEx($modelBk, 'JUDUL', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->textField($modelBk, 'JUDUL', array('class' => 'form-control', 'placeholder' => 'Judul Buku')); ?>
<?php echo CHtml::error($modelBk, 'JUDUL'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                            <?php echo $form->labelEx($modelBk, 'PENGARANG', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->textField($modelBk, 'PENGARANG', array('class' => 'form-control', 'placeholder' => 'Judul Pengarang Buku')); ?>
<?php echo CHtml::error($modelBk, 'PENGARANG'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                            <?php echo $form->labelEx($modelBk, 'ISBN', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->textField($modelBk, 'ISBN', array('class' => 'form-control', 'placeholder' => 'ISBN Buku')); ?>
<?php echo CHtml::error($modelBk, 'ISBN'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                            <?php echo $form->labelEx($modelBk, 'JENIS', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->dropDownList($modelBk, 'JENIS', array('Cetak' => 'Cetak', 'Elektronik' => 'Elektronik')); ?>
<?php echo CHtml::error($modelBk, 'JENIS'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                            <?php echo $form->labelEx($modelBk, 'BAHASA', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->textField($modelBk, 'BAHASA', array('class' => 'form-control', 'placeholder' => 'Bahasa yang Digunakan Buku')); ?>
<?php echo CHtml::error($modelBk, 'BAHASA'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                            <?php echo $form->labelEx($modelBk, 'PENERBIT', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->textField($modelBk, 'PENERBIT', array('class' => 'form-control', 'placeholder' => 'Nama Penerbit Buku')); ?>
<?php echo CHtml::error($modelBk, 'PENERBIT'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                            <?php echo $form->labelEx($modelBk, 'TAHUN_TERBIT', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->textField($modelBk, 'TAHUN_TERBIT', array('class' => 'form-control', 'placeholder' => 'Tahun Terbit Buku')); ?>
<?php echo CHtml::error($modelBk, 'TAHUN_TERBIT'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                            <?php echo $form->labelEx($modelBk, 'HARGA', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->textField($modelBk, 'HARGA', array('class' => 'form-control', 'placeholder' => 'Judul Pengarang Buku')); ?>
<?php echo CHtml::error($modelBk, 'HARGA'); ?>
                        </div>
                    </div>       

                    <div class="form-group">
                            <?php echo $form->labelEx($modelBk, 'LINK_WEBSITE', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->textField($modelBk, 'LINK_WEBSITE', array('class' => 'form-control', 'placeholder' => 'Link Website Buku')); ?>
                        <?php echo CHtml::error($modelBk, 'LINK_WEBSITE'); ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                            <?php echo $form->labelEx($modelBk, 'PRIORITAS', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->dropDownList($modelBk, 'ID_PRIORITAS', array('1' => 'WAJIB', '2' => 'PENUMJANG')); ?>
<?php echo CHtml::error($modelBk, 'ID_PRIORITAS'); ?>
                        </div>
                    </div>
                </div> <!--Buku-->

                <div id="jurnal">
                    <div class="form-group">
                            <?php echo $form->labelEx($modelJur, 'JUDUL', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->textField($modelJur, 'JUDUL', array('class' => 'form-control', 'placeholder' => 'Judul Jurnal')); ?>
                        <?php echo $form->error($modelJur, 'JUDUL'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                            <?php echo $form->labelEx($modelJur, 'PENGARANG', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->textField($modelJur, 'PENGARANG', array('class' => 'form-control', 'placeholder' => 'Pengarang Jurnal')); ?>
                        <?php echo $form->error($modelJur, 'PENGARANG'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                            <?php echo $form->labelEx($modelJur, 'JENIS', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->dropDownList($modelJur, 'JENIS', array('Cetak' => 'Cetak', 'Elektronik' => 'Elektronik')); ?>
                        <?php echo $form->error($modelJur, 'JENIS'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                            <?php echo $form->labelEx($modelJur, 'BAHASA', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->textField($modelJur, 'BAHASA', array('class' => 'form-control', 'placeholder' => 'Bahasa yang Digunakan')); ?>
                        <?php echo $form->error($modelJur, 'BAHASA'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                            <?php echo $form->labelEx($modelJur, 'HARGA', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->textField($modelJur, 'HARGA', array('class' => 'form-control', 'placeholder' => 'Harga Jurnal')); ?>
                        <?php echo $form->error($modelJur, 'HARGA'); ?>
                        </div>
                    </div>       
                    <div class="form-group">
                            <?php echo $form->labelEx($modelJur, 'LINK_WEBSITE', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->textField($modelJur, 'LINK_WEBSITE', array('class' => 'form-control', 'placeholder' => 'Link Website Jurnal')); ?>
<?php echo $form->error($modelJur, 'LINK_WEBSITE'); ?>
                        </div>
                    </div>
                </div> <!--Jurnal-->
                
                <div id="serial">
                    <div class="form-group">
                            <?php echo $form->labelEx($modelSer, 'JUDUL', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->textField($modelSer, 'JUDUL', array('class' => 'form-control', 'placeholder' => 'Judul')); ?>
                        <?php echo $form->error($modelSer, 'JUDUL'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                            <?php echo $form->labelEx($modelSer, 'VOLUME', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->textField($modelSer, 'VOLUME', array('class' => 'form-control', 'placeholder' => 'Volume')); ?>
                        <?php echo $form->error($modelSer, 'VOLUME'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                            <?php echo $form->labelEx($modelSer, 'TAHUN', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->textField($modelSer, 'TAHUN', array('class' => 'form-control', 'placeholder' => 'Tahun')); ?>
                        <?php echo $form->error($modelSer, 'TAHUN'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                            <?php echo $form->labelEx($modelSer, 'FREKUENSI', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->textField($modelSer, 'FREKWENSI', array('class' => 'form-control', 'placeholder' => 'Frekuensi')); ?>
                        <?php echo $form->error($modelSer, 'FREKWENSI'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                            <?php echo $form->labelEx($modelSer, 'JENIS', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->dropDownList($modelSer, 'JENIS', array('Cetak' => 'Cetak', 'Elektronik' => 'Elektronik')); ?>
                        <?php echo $form->error($modelSer, 'JENIS'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                            <?php echo $form->labelEx($modelSer, 'BAHASA', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->textField($modelSer, 'BAHASA', array('class' => 'form-control', 'placeholder' => 'Bahasa yang Digunakan')); ?>
                        <?php echo $form->error($modelSer, 'BAHASA'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                            <?php echo $form->labelEx($modelSer, 'HARGA', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->textField($modelSer, 'HARGA', array('class' => 'form-control', 'placeholder' => 'Harga')); ?>
                        <?php echo $form->error($modelSer, 'HARGA'); ?>
                        </div>
                    </div>       
                    <div class="form-group">
                            <?php echo $form->labelEx($modelSer, 'LINK_WEBSITE', array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-10">
<?php echo $form->textField($modelSer, 'LINK_WEBSITE', array('class' => 'form-control', 'placeholder' => 'Link Website')); ?>
<?php echo $form->error($modelSer, 'LINK_WEBSITE'); ?>
                        </div>
                    </div>
                </div> <!--serial-->

                <div class="form-group" id="button">
                    <div class="col-sm-offset-2 col-sm-10">
<?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-default')); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="Permintaan">
            <div class="box box-primary">
                <div class="box-header">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#bk" role="tab" data-toggle="tab">Buku </a></li>
                        <li><a href="#jr" role="tab" data-toggle="tab">Jurnal</a></li>
                        <li><a href="#sr" role="tab" data-toggle="tab">Serial</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="bk">
                            <div class="box-header">
                                <h4 class="box-title">DAFTAR PERMINTAAN BUKU</h4>
                                <div class="box">
                                    <h2>Daftar Permintaan Buku</h2>
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID Anggota</th>
                                                <th>Tgl.Permintaan</th>
                                                <th>Judul</th>
                                                <th>Pengarang</th>
                                                <th>ISBN</th>
                                                <th>Jenis</th>
                                                <th>Penerbit</th>
                                                <th>Tahun Terbit</th>
                                                <th>Harga</th>
                                                <th>Link Website</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php foreach ($data as $model): ?>
                                                <tr>
                                                    <td><?php echo $model['ID_ANGGOTA']; ?></td>
                                                    <td><?php echo $model['TGL_PERMINTAAN']; ?></td>
                                                    <td><?php echo $model['JUDUL']; ?></td>
                                                    <td><?php echo $model['PENGARANG']; ?></td>
                                                    <td><?php echo $model['ISBN']; ?></td>
                                                    <td><?php echo $model['JENIS']; ?></td>
                                                    <td><?php echo $model['PENERBIT']; ?></td>
                                                    <td><?php echo $model['TAHUN_TERBIT']; ?></td>
                                                    <td><?php echo $model['HARGA']; ?></td>
                                                    <td><?php echo $model['LINK_WEBSITE']; ?></td>
                                                </tr>
<?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>           
                                <!-- jQuery 2.0.2 -->
                                <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
                                <!-- page script -->
                                <script type="text/javascript">
                                    $(function() {
                                        document.getElementById("button").style.visibility = "hidden";
                                        $("#example1").dataTable();
                                        $('#example2').dataTable({
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
                        <div class="tab-pane " id="jr">
                            <div class="box-header">
                                <h4 class="box-title">DAFTAR PERMINTAAN JURNAL</h4>
                                <div class="box">
                                    <h2>Daftar Permintaan Jurnal</h2>
                                    <table id="example3" class="table table-bordered table-striped">
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
                                </div>           
                                <!-- jQuery 2.0.2 -->
                                <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
                                <!-- page script -->
                                <script type="text/javascript">
                                    $(function() {
                                        $('#example3').dataTable({
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
                        <div class="tab-pane " id="sr">
                            <div class="box-header">
                                <h4 class="box-title">DAFTAR PERMINTAAN SERIAL</h4>
                                <div class="box">
                                    <h2>Daftar Permintaan Serial</h2>
                                    <table id="example4" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID Anggota</th>
                                                <th>Tgl.Permintaan</th>
                                                <th>Judul</th>
                                                <th>Volume</th>
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
                                </div>           
                                <!-- jQuery 2.0.2 -->
                                <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
                                <!-- page script -->
                                <script type="text/javascript">
                                    $(function() {
                                        $('#example4').dataTable({
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
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->endWidget(); ?>

    </div><!-- form -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
                                    $(document).ready(function() {

                                        $("div#buku").hide();
                                        $("div#jurnal").hide();
                                        $("div#serial").hide();

                                    });
    </script>