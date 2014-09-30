<!-- Start Nav tabs -->
<ul class="nav nav-tabs" role="tablist no-padding">
    <li class="active"><a href="#tambah" role="tab" data-toggle="tab">TAMBAH KATALOG</a></li>
    <li><a href="#daftar" role="tab" data-toggle="tab">DAFTAR KATALOG</a></li>
    <li><a href="#label" role="tab" data-toggle="tab">BARCODE DAN LABEL</a></li>
</ul>
<!-- End Nav tabs -->

<!-- Mulai Isi Tab -->
<div class="tab-content no-padding">
<div class="tab-pane active" id="tambah">
								<div class="nav-tabs-custom">
                                <!-- Tabs within a box -->
                                <ul class="nav nav-tabs role="tablist"">
                                    <li class="active"><a href="#individu" data-toggle="tab">INDIVIDU</a></li>
                                    <li><a href="#kolektif" data-toggle="tab">KOLEKTIF</a></li>
                                </ul>
                                <div class="tab-content no-padding">
                                    <!-- Morris chart - Sales -->
                                    <div class="tab-pane active" id="individu">
                                    	<div class="box box-primary" style="padding:15px 15px 15px 50px;">
                <div class="box-header">
                    <h4 class="box-title">Tambah Katalog</h4>
                </div>
                                    	<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbk-main-f_katalog-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'REGISTER'); ?>
		<?php echo $form->textField($model,'REGISTER'); ?>
		<?php echo $form->error($model,'REGISTER'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TITLE'); ?>
		<?php echo $form->textField($model,'TITLE'); ?>
		<?php echo $form->error($model,'TITLE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'COPIES'); ?>
		<?php echo $form->textField($model,'COPIES'); ?>
		<?php echo $form->error($model,'COPIES'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ISBN'); ?>
		<?php echo $form->textField($model,'ISBN'); ?>
		<?php echo $form->error($model,'ISBN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'VOLUME'); ?>
		<?php echo $form->textField($model,'VOLUME'); ?>
		<?php echo $form->error($model,'VOLUME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PRINTING'); ?>
		<?php echo $form->textField($model,'PRINTING'); ?>
		<?php echo $form->error($model,'PRINTING'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EDITION'); ?>
		<?php echo $form->textField($model,'EDITION'); ?>
		<?php echo $form->error($model,'EDITION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SPEC_LOCATION'); ?>
		<?php echo $form->textField($model,'SPEC_LOCATION'); ?>
		<?php echo $form->error($model,'SPEC_LOCATION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PUB_NAME'); ?>
		<?php echo $form->textField($model,'PUB_NAME'); ?>
		<?php echo $form->error($model,'PUB_NAME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LANGUAGE'); ?>
		<?php echo $form->textField($model,'LANGUAGE'); ?>
		<?php echo $form->error($model,'LANGUAGE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DEWEY_NO'); ?>
		<?php echo $form->textField($model,'DEWEY_NO'); ?>
		<?php echo $form->error($model,'DEWEY_NO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'INDEX_'); ?>
		<?php echo $form->textField($model,'INDEX_'); ?>
		<?php echo $form->error($model,'INDEX_'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MEDIA_CODE'); ?>
		<?php echo $form->textField($model,'MEDIA_CODE'); ?>
		<?php echo $form->error($model,'MEDIA_CODE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TYPE_CODE'); ?>
		<?php echo $form->textField($model,'TYPE_CODE'); ?>
		<?php echo $form->error($model,'TYPE_CODE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FUND_CODE'); ?>
		<?php echo $form->textField($model,'FUND_CODE'); ?>
		<?php echo $form->error($model,'FUND_CODE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'OPERATOR_CODE'); ?>
		<?php echo $form->textField($model,'OPERATOR_CODE'); ?>
		<?php echo $form->error($model,'OPERATOR_CODE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'AUTHOR_CODE'); ?>
		<?php echo $form->textField($model,'AUTHOR_CODE'); ?>
		<?php echo $form->error($model,'AUTHOR_CODE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TITLE_CODE'); ?>
		<?php echo $form->textField($model,'TITLE_CODE'); ?>
		<?php echo $form->error($model,'TITLE_CODE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'YEAR_PUB'); ?>
		<?php echo $form->textField($model,'YEAR_PUB'); ?>
		<?php echo $form->error($model,'YEAR_PUB'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CITY_PUB'); ?>
		<?php echo $form->textField($model,'CITY_PUB'); ?>
		<?php echo $form->error($model,'CITY_PUB'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FUND_NOTE'); ?>
		<?php echo $form->textField($model,'FUND_NOTE'); ?>
		<?php echo $form->error($model,'FUND_NOTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PHYS_DESCRIPTION'); ?>
		<?php echo $form->textField($model,'PHYS_DESCRIPTION'); ?>
		<?php echo $form->error($model,'PHYS_DESCRIPTION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BIBLIOGRAPHY'); ?>
		<?php echo $form->textField($model,'BIBLIOGRAPHY'); ?>
		<?php echo $form->error($model,'BIBLIOGRAPHY'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LOCATION_CODE'); ?>
		<?php echo $form->textField($model,'LOCATION_CODE'); ?>
		<?php echo $form->error($model,'LOCATION_CODE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PRICE'); ?>
		<?php echo $form->textField($model,'PRICE'); ?>
		<?php echo $form->error($model,'PRICE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ACCEPT_DATE'); ?>
		<?php echo $form->textField($model,'ACCEPT_DATE'); ?>
		<?php echo $form->error($model,'ACCEPT_DATE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DATA_ENTRY'); ?>
		<?php echo $form->textField($model,'DATA_ENTRY'); ?>
		<?php echo $form->error($model,'DATA_ENTRY'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
                                    	</div>
                                    	
                                    	
	
                                    </div>
                                    
                                    <div class="tab-pane" id="kolektif" style="position: relative; height: 300px;"></div>
                                </div>
                            </div><!-- /.nav-tabs-custom -->
</div>




<div class="tab-pane active" id="daftar">
</div>
</div>
<!-- akhir Isi Tab -->




