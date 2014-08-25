<?php
	class TanggalController extends Controller{
		public $layout="NULL";
		
		function actionIndex(){
			echo "helo word!!";
		}
		
		function actionTanggal(){
					$model=new pengolahan;
	
		// uncomment the following code to enable ajax-based validation
		/*
		if(isset($_POST['ajax']) && $_POST['ajax']==='pengolahan-formPermintaan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		*/
	
		if(isset($_POST['pengolahan']))
		{
			$model->attributes=$_POST['pengolahan'];
			if($model->validate())
			{
				// form inputs are valid, do something here
				
				return;
			}
		}
		$this->render('tanggal',array('model'=>$model));
			//$this->render("tanggal");
		}
	}
?>