<?php

class UploadController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionUpload()
	{
		Yii::import('ext.phpexcelreader.JPhpExcelReader');
		$model=new Upload;
		
		// uncomment the following code to enable ajax-based validation
		/*
		if(isset($_POST['ajax']) && $_POST['ajax']==='upload-upload-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		*/
	
		if(isset($_POST['Upload']))
		{
			$model->attributes=$_POST['Upload'];
			
			$fileUpload=CUploadedFile::getInstance($model,'filee');
			$path=Yii::getPathOfAlias('webroot').'/upload/'.$fileUpload;
			$fileUpload->saveAs($path);
			
			if( !file_exists( $path ) ) die( 'File could not be found at: ' . $path );
			$data=new JPhpExcelReader($path);
			 
			$baris = $data->rowcount($sheet_index=0);
			 
			$sukses = 0;
			$gagal = 0;
			 
			for ($i=2; $i<=$baris; $i++)
			{
				$judul = $data->val($i, 1);
				$pengarang = $data->val($i, 2);
				$penerbit = $data->val($i, 3);
				//$model->id_anggota=$_POST['Pengolahan']['id_anggota'];
				
				$command = Yii::app()->db->createCommand();
				$command->insert('Upload', array(
					 'id_anggota'=>$_POST['Upload']['id_anggota'],
					 'judul'=>$judul,
					 'pengarang'=>$pengarang,
					 'penerbit'=>$penerbit,
			 	));
			 if ($command) $sukses++;
			 else $gagal++;
			 }
			 echo "<h3>Proses import data selesai.</h3>";
			 echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
			 echo "Jumlah data yang gagal diimport : ".$gagal."</p>";
			 
			 unlink($path);
			 //$this->redirect(array('admin'));
 			/*
			if($model->validate())
			{
				// form inputs are valid, do something here
				return;
			}
			*/
		} //isset
		$this->render('upload',array('model'=>$model));
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