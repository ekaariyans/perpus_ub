<html>
    <head>
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/jquery.fancybox.css" rel="stylesheet" >
		        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/styles.css" rel="stylesheet" >
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/main-new.css" rel="stylesheet" >
        
        <title>PERPUSTAKAAN UB</title>

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
    </head>
    
    <body>
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
        <div class="container">
            
                <div class="col-md-6 col-md-offset-3" style="padding-top:100px;">
                    <div class="panel panel-default">
                        <div class="panel-heading"> 
                        <center><h4>Welcome to the login page</h4></center>
                        </div>
                        
                        <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	
	<div class="panel-body">
	
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'USERNAME', array('class'=>'col-sm-3 control-label')); ?>
		<div class="col-sm-9"> 
		<?php echo $form->textField($model,'USERNAME', array('class'=>'form-control','placeholder'=>'Username')); ?>
		</div>
		<?php echo $form->error($model,'USERNAME'); ?>
	</div>
<br><br>
	<div class="form-group">
		<?php echo $form->labelEx($model,'PASSWORD', array('class'=>'col-sm-3 control-label')); ?>
        <div class="col-sm-9">
		<?php echo $form->passwordField($model,'PASSWORD',array('class'=>'form-control','placeholder'=>'Password')); ?>
        </div>
		<?php echo $form->error($model,'PASSWORD'); ?>
		
	</div>
	
	
<br><br>
    <div class="form-group last" style="float:right">
       <div class="col-sm-offset-3 col-sm-9" style="float:right"><i class="ic-external-white"></i>
       		<?php echo CHtml::submitButton('Login', array('class' => 'btn btn-blue5')); ?>
       		       <?php if($data!=null) : ?>
			<?php echo $data; ?>
		<?php endif; ?>
       </div>

    </div>
    	
</div>

          <div class="panel-footer"> <center>&copy; PERPUSTAKAAN UNIVERSITAS BRAWIJAYA</center>

  </div>
  </div>
</div> 
<?php $this->endWidget(); ?>
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
                       <script type="text/javascript">
		$(".wrap").hide();


		function redir() {
			$('#alert').fadeOut('slow', function() { location.href = "<?php echo site_url(); ?>";});

		}
		function fadout_(){
			$("#alert").fadeOut("slow");

		}
		$('#form-login').submit(function(e) {
			e.preventDefault();

			data = $(this).serialize();

			$.post('<?php echo site_url('user_control/verify'); ?>', data, function() {}, 'json')
			.success(function(data) {

				$('#alert').html(data.status_message).removeClass('alert-success alert-error').addClass(data.status).fadeIn('medium');

				if (data.status == 'alert-success')
					setTimeout('redir()', 1800);
				else
					setTimeout('fadout_()', 2000);

			})
			.error(function(data, textStatus) {
				$('#alert').html("<strong>Failed!</strong> <br> Username and password did not match.").removeClass('alert-success alert-error').addClass("alert-error").fadeIn('medium');
				// $('#alert').html(data.status_message).removeClass('alert-success alert-error').addClass(data.status).fadeIn('medium');
				setTimeout('$("#alert").fadeOut("slow")',2000);
			});
		});

		$(document).ready(function() {
			$(".wrap").fadeIn(1550,function(){
				$('#username').focus();
			});
			$(window).keyup(function(e) {
				e.preventDefault();

				if (e.which == 114) {
					alert('asdasd');
				}
			});

		});
	</script>
                       
                    
    </body>
</html>
