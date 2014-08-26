<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li class="active"><a href="#form" role="tab" data-toggle="tab">FORM</a></li>
    <li><a href="#upload" role="tab" data-toggle="tab">UPLOAD</a></li>
    <li><a href="#list" role="tab" data-toggle="tab">DAFTAR PERMINTAAN</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="form">FOrm


    </div><!--TAB FORM-->


    <div class="tab-pane" id="upload">Upload
        <div class="form">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'upload-upload-form',
                'enableAjaxValidation' => false,
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // See class documentation of CActiveForm for details on this,
                // you need to use the performAjaxValidation()-method described there.
                'enableAjaxValidation' => false,
            ));
            ?>

            <p class="note">Fields with <span class="required">*</span> are required.</p>

            <?php echo $form->errorSummary($model); ?>

            <div class="row">
                <?php echo $form->labelEx($model, 'id_anggota'); ?>
                <?php echo $form->textField($model, 'id_anggota'); ?>
                <?php echo $form->error($model, 'id_anggota'); ?>
            </div>

            <div class="row">
                <b>Masukkan Data Excel :</b>
                <?php echo $form->fileField($model, 'filee', array('size' => 60, 'maxlength' => 200)); ?>
            </div>

            <div class="row buttons">
                <?php echo CHtml::submitButton('Submit'); ?>
            </div>
            <?php $this->endWidget(); ?>

        </div><!-- form -->
    </div><!--UPLOAD-->


    <div class="tab-pane" id="list">LISt


        <div class="box box-primary">
            <div class="box-header">
                <h4 class="box-title">lIST PERMINTAAN BUKU</h4>
                <div class="box">
                    <h2>Daftar Permintaan Buku</h2>
                    <?php
                    echo CHtml::link('Cetak dokumen', array('cetak/cetak'));
                    ?>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID Anggota</th>
                                <th>Judul</th>
                                <th>Jenis</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Kota</th>
                                <th>Edisi</th>
                                <th>ISBN</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $model): ?>
                                <tr>
                                    <td><?php echo $model->id_anggota; ?></td>
                                    <td><?php echo $model->judul; ?></td>
                                    <td><?php echo $model->jenis; ?></td>
                                    <td><?php echo $model->pengarang; ?></td>
                                    <td><?php echo $model->penerbit; ?></td>
                                    <td><?php echo $model->tahun_terbit; ?></td>
                                    <td><?php echo $model->kota; ?></td>
                                    <td><?php echo $model->edisi; ?></td>
                                    <td><?php echo $model->isbn; ?></td>
                                    <td><?php echo $model->keterangan; ?></td>
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

    </div>

</div><!--LIST-->

</div>