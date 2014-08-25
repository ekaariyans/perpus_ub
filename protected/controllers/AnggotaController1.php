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
				$model->k_jenjang=$_POST['Anggota']['k_jenjang'];
				$model->angkatan=$_POST['Anggota']['angkatan'];
				$model->tgl_lahir=$_POST['Anggota']['tgl_lahir'];
				$model->alamat1=$_POST['Anggota']['alamat1'];
				$model->kodepos1=$_POST['Anggota']['kodepos1'];
				$model->notelp1=$_POST['Anggota']['notelp1'];
				$model->alamat2=$_POST['Anggota']['alamat2'];
				$model->kodepos2=$_POST['Anggota']['kodepos2'];
				$model->notelp2=$_POST['Anggota']['notelp2'];
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