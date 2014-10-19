<html>
    <head>
        <title>PERPUSTAKAAN UB</title>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/bootstrap.min.css" rel="stylesheet" > 
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/AdminLTE.css.css" rel="stylesheet" > 
         <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/main-new.css" rel="stylesheet" >      
    </head>
    <body style="background-image:url(<?php echo Yii::app()->request->baseUrl; ?>/assets/img/bg.png)">
        <div id="header">
            <div id="logo-wrapper">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/ublogo.png" />
            </div><!-- end logo -->
            <div style="float:right;margin:5px 10pt 0;">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/ukas.jpg" style="border:1px solid #000;padding:1px;background:white"/>
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/logo_UBx60.png" width="57" class="img-polaroid" style="border:1px solid #000;padding:1px;background:white"/>
            </div>
        </div><!-- end banner -->

        <div id="wrap" style="margin-bottom: 50px;">
            <div class="panel panel-default">

                <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'login-form',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                'validateOnSubmit'=>true,
                ),
                )); ?>

                <div class="panel-body">            
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'USERNAME'); ?>
                        <?php echo $form->textField($model,'USERNAME', array('class'=>'form-control','placeholder'=>'Username','required')); ?>
                        <?php echo $form->error($model,'USERNAME'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'PASSWORD'); ?>
                        <?php echo $form->passwordField($model,'PASSWORD',array('class'=>'form-control','placeholder'=>'Password','required')); ?>
                        <?php echo $form->error($model,'PASSWORD'); ?>
                    </div>      
                    <div class="form-group last" style="float:right">
                        <div class="col-sm-offset-3 col-sm-9" style="float:right">
                            <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-blue5')); ?>
                        </div>
                    </div>

                </div>
                <?php if($data!=null) : ?>
                <?php echo '<div class="alert alert-warning" role="alert">' . $data . "</div>\n"; ?>
                <?php endif; ?>
            </div>
        </div>
        <?php $this->endWidget(); ?>
         <div id="content">
                   <div class="box-body">
                            <blockquote>
                                <h4><b>Selamat Datang!</b></h4>
                                <p align="justify">
                                    Website ini merupakan salah satu layanan Perpustakaan Universitas Brawijaya.
                                </p><br />
                            </blockquote>
                            <blockquote>
                                <h4><b><p>Alur Permintaan Bahan Pustaka</p></b></h4>
                                <ol>
                                    <li><p>Individu</p></li>
                                    <ul>
                                        <li><p>Memilih Jenis Permintaan (buku, jurnal, serial).</p></li>
                                        <li><p>Mengisi dan mengirim Form Permintaan.</p></li>
                                        <li><p>Menunggu pemberitahuan tersedianya bahan pustaka via email/ SMS.</p></li>
                                        <li><p>Pengecekan status permintaan bahan pustaka juga dapat dilakukan di website ini pada bagian daftar permintaan.</p></li>
                                    </ul>
                                    <li><p>Kolektif</p></li>
                                    <ul>
                                        <li><p>Petugas Fakultas/ Jurusan/ Program Studi mendownload Form Permintaan sesuai dengan jenis permintaan.</p></li>
                                        <li><p>Petugas Fakultas/ Jurusan/ Program Studi memilih kategori permintaan, </p></li>
                                        <li><p>Kemudian mengupload Form Permintan yang sudah diisi sesuai dengan kategori yang dipilih pada poin sebelumnya.</p></li>
                                        <li><p>Menunggu pemberitahuan tersedianya bahan pustaka via email/ SMS.</li>
                                        <li><p>Pengecekan status permintaan bahan pustaka juga dapat dilakukan di website ini pada bagian daftar permintaan.</p></li>
                                    </ul>
                                </ol>

                            </blockquote>
                        </div><!-- /.box-body -->

            </div>
             <div id="footer" > <center>&copy; PENGEMBANGAN IT PERPUSTAKAAN UNIVERSITAS BRAWIJAYA</center></div>

    </body>
</html>
