<?php

class AnggotaController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}


	public function actionFormanggota() 
	{ 
		$model=new Anggota; 
	
		// uncomment the following code to enable ajax-based validation 
		/* 
		if(isset($_POST['ajax']) && $_POST['ajax']==='anggota-formanggota-form') 
		{ 
			echo CActiveForm::validate($model); 
			Yii::app()->end(); 
		} 
		*/ 
	
		if(isset($_POST['Anggota'])) 
		{ 
			$model->attributes=$_POST['Anggota']; 
			if($model->validate()) 
			{ 
				$model->nama=$_POST['Anggota']['nama'];
				$model->nim=$_POST['Anggota']['nim'];
				$model->k_fakultas=$_POST['Anggota']['k_fakultas'];
				$model->k_prodi=$_POST['Anggota']['k_prodi'];
				$model->jenjang=$_POST['Anggota']['jenjang'];
				$model->angkatan=$_POST['Anggota']['angkatan'];
				$model->tgl_lahir=$_POST['Anggota']['tgl_lahir'];
				$model->save();
				// form inputs are valid, do something here 
				return; 
			} 
		} 
		$this->render('formanggota',array('model'=>$model)); 
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}