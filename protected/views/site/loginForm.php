<html>
    <head>
        <title>PERPUSTAKAAN UB</title>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/styles.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
    </head>
    <body>
        <div class="container">
            
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading"> <strong class="">Login</strong>

                        </div>
                        
                        <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-loginForm-form',
	'enableAjaxValidation'=>false,
)); ?>

	
	<div class="panel-body">
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'USERNAME', array('class'=>'col-sm-3 control-label', 'placeholder'=>'Username')); ?>
		<div class="col-sm-9">
		<?php echo $form->textField($model,'USERNAME', array('class'=>'form-control')); ?>
		</div>
		<?php echo $form->error($model,'USERNAME'); ?>
	</div>
<br><br>
	<div class="form-group">
		<?php echo $form->labelEx($model,'PASSWORD', array('class'=>'col-sm-3 control-label', 'placeholder'=>'Password')); ?>
        <div class="col-sm-9">
		<?php echo $form->passwordField($model,'PASSWORD',array('class'=>'form-control')); ?>
        </div>
		<?php echo $form->error($model,'PASSWORD'); ?>
		
	</div>
<br><br>
    <div class="form-group last">
                                    <div class="col-sm-offset-3 col-sm-9">
                                      <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-default')); ?>

                                    </div>
                                </div>
</div>

          <div class="panel-footer"> <center>&copy; PERPUSTAKAAN UNIVERSITAS BRAWIJAYA</center>

  </div>
  </div>
</div> 
<?php $this->endWidget(); ?>
                       
                    
    </body>
</html>
