<?php

class PengolahanController extends Controller
{
	public function __construct()
    {
        if (empty(Yii::app()->session['username'])){
			$this->redirect('index.php?r=site/loginForm');	  
     	}
     }
     
	public function actionIndex()
	{
		$this->render('Pengolahan/index');
	}
	
	public function actionDaftarPermintaan(){
		//echo "halaman daftar permintaan";
		$data = Pengolahan::model()->findAll();
		$this->render('listPermintaan',array('data'=>$data));
		
	}

	public function actionFormPermintaan()
	{
		$model=new Pengolahan;
	
		// uncomment the following code to enable ajax-based validation
		/*
		if(isset($_POST['ajax']) && $_POST['ajax']==='pengolahan-formPermintaan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		*/
	
		if(isset($_POST['Pengolahan']))
		{
			$model->attributes=$_POST['Pengolahan'];
			if($model->validate())
			{
				// form inputs are valid, do something here
				$model->id_anggota=$_POST['Pengolahan']['id_anggota'];
				$model->judul=$_POST['Pengolahan']['judul'];
				$model->jenis=$_POST['Pengolahan']['jenis'];
				$model->pengarang=$_POST['Pengolahan']['pengarang'];
				$model->penerbit=$_POST['Pengolahan']['penerbit'];
				$model->tahun_terbit=$_POST['Pengolahan']['tahun_terbit'];
				$model->kota=$_POST['Pengolahan']['kota'];
				$model->edisi=$_POST['Pengolahan']['edisi'];
				$model->isbn=$_POST['Pengolahan']['isbn'];
				$model->keterangan=$_POST['Pengolahan']['keterangan'];
				$model->save();
				$this->redirect(array('Pengolahan/DaftarPermintaan'));
			}
		}
		$this->render('formPermintaan',array('model'=>$model));
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