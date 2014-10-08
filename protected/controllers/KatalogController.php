<?php

class KatalogController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionF_katalog()
	{
		$model=new TBkMain;
		$modLoc = new TLocation;
		$modSpecLoc = new TSpecLocation;
		$modFund = new TFunding;
		$modTbk = new TBkType;
		$modTMedia = new TMediaType;
		

		if(isset($_POST['TBkMain']))
		{
			$model->attributes=$_POST['TBkMain'];
			
			//cek jika kolektif
			if(isset($_POST['TBkMain']['filee'])){
				$this->regBukuKolektif($model);
			}
			else {
				if($model->validate())
				{
					$model->OPERATOR_CODE = Yii::app()->session['username'];
					$model->REGISTER = $_POST['TBkMain']['REGISTER'];
					$model->ISBN = $_POST['TBkMain']['ISBN'];
					$model->TITLE = $_POST['TBkMain']['TITLE'];
					$model->VOLUME = $_POST['TBkMain']['VOLUME'];
					$model->PRINTING = $_POST['TBkMain']['PRINTING'];
					$model->EDITION = $_POST['TBkMain']['EDITION'];
					$model->LANGUAGE = $_POST['selectbhs'];
					$model->COPIES = $_POST['TBkMain']['COPIES'];
					$model->MEDIA_CODE = $_POST['TMediaType']['MEDIA_CODE'];
					$model->TYPE_CODE = $_POST['TBkType']['TYPE_CODE'];
					$model->DEWEY_NO = $_POST['TBkMain']['DEWEY_NO'];
					$model->AUTHOR_CODE = $_POST['TBkMain']['AUTHOR_CODE'];
					$model->TITLE_CODE = $_POST['TBkMain']['TITLE_CODE'];
					$model->YEAR_PUB = $_POST['TBkMain']['YEAR_PUB'];
					$model->CITY_PUB = $_POST['TBkMain']['CITY_PUB'];
					$model->PUB_NAME = $_POST['TBkMain']['PUB_NAME'];
					$model->PHYS_DESCRIPTION = $_POST['TBkMain']['PHYS_DESCRIPTION'];
					$model->INDEX_ = $_POST['TBkMain']['INDEX_'];
					$model->BIBLIOGRAPHY = $_POST['TBkMain']['BIBLIOGRAPHY'];
					$model->LOCATION_CODE = $_POST['TLocation']['LOCATION_CODE'];
					$model->SPEC_LOCATION = $_POST['TSpecLocation']['SPEC_LOCATION'];
					$model->PRICE = $_POST['TBkMain']['PRICE'];
					$model->FUND_CODE = $_POST['TFunding']['FUND_CODE'];
					$model->FUND_NOTE = $_POST['TBkMain']['FUND_NOTE'];
					$model->ACCEPT_DATE = $_POST['DATA_ENTRY'];
					$model->DATA_ENTRY = $_POST['DATA_ENTRY'];
					
					$model->save();
					$model->unsetAttributes();
					Yii::app()->user->setFlash('success',"Proses Input Data Berhasil!");
					$this->redirect(array('Katalog/F_katalog'));
				}
				else {
					Yii::app()->user->setFlash('error',"Proses Input Gagal!");
				}
			}
		}
		else $this->render('f_katalog',array('model'=>$model,
							'modSpecLoc'=>$modSpecLoc,
							'modLoc'=>$modLoc,
							'modFund'=>$modFund,
							'modTbk'=>$modTbk,
							'modTMedia'=>$modTMedia));
	}


	public function regBukuKolektif($model){
		Yii::import('ext.phpexcelreader.JPhpExcelReader');
		
		$isTrue = false;
		//upload file excel			
			$fileUpload=CUploadedFile::getInstance($model,'filee');
			$path=Yii::getPathOfAlias('webroot').'/upload/'.$fileUpload;
			$fileUpload->saveAs($path);
			
			if( !file_exists( $path ) ) die( 'File could not be found at: ' . $path );
			$data=new JPhpExcelReader($path);
			
			$baris = $data->rowcount($sheet_index=0);
			
		for($col=1; $col<24; $col++){
			$kolom = $data->val(5,$col);
			if(strtolower($kolom)=='isbn'){
				$isTrue = true;	
			}
		}
		
		if($isTrue) {
			$sukses = 0;
			$gagal = 0;
			
			//Baca File Excel
			for ($i=6; $i<=$baris; $i++)
			{
				$media_type 	=$data->val($i,9);
				$media_code		= strstr($media_type, ' ', true);
				$type_bk      	=$data->val($i,10);
				$type_code		=strstr($type_bk, ' ', true);
				$loc			=$data->val($i,20);
				$loc_code		=strstr($loc, ' ', true);
				$spec			=$data->val($i,21);
				$spec_loc		=strstr($spec, ' ', true);
				$fund			=$data->val($i,23);
				$fund_code		=strstr($fund, ' ', true);
				$date			= date('Y-m-d');
				
				$model->OPERATOR_CODE = Yii::app()->session['username'];
				$model->REGISTER = $data->val($i,1);
				$model->ISBN = $data->val($i,2);
				$model->TITLE = $data->val($i,3);
				$model->VOLUME = $data->val($i,4);
				$model->PRINTING = $data->val($i,5);
				$model->EDITION = $data->val($i,6);
				$model->LANGUAGE = $data->val($i,7);
				$model->COPIES = $data->val($i,8);
				$model->MEDIA_CODE = $media_code;
				$model->TYPE_CODE = $type_code;
				$model->DEWEY_NO = $data->val($i,11);
				$model->AUTHOR_CODE = $data->val($i,12);
				$model->TITLE_CODE = $data->val($i,13);
				$model->YEAR_PUB = $data->val($i,14);
				$model->CITY_PUB = $data->val($i,15);
				$model->PUB_NAME = $data->val($i,16);
				$model->PHYS_DESCRIPTION = $data->val($i,17);
				$model->INDEX_ = $data->val($i,18);
				$model->BIBLIOGRAPHY = $data->val($i,19);
				$model->LOCATION_CODE = $loc_code;
				$model->SPEC_LOCATION = $spec_loc;
				$model->PRICE = $data->val($i,22);
				$model->FUND_CODE = $fund_code;
				$model->FUND_NOTE = $data->val($i,24);
				$model->ACCEPT_DATE = $date;
				$model->DATA_ENTRY = $date;
					
				if($model->validate()){
					$model->save();
					$sukses++;
				}
				else{
					$gagal++;
				}
			}//for
			//$model->unsetAttributes();
			Yii::app()->user->setFlash('success',"Success import $sukses failed $gagal");
			$this->redirect(array('Katalog/F_katalog'));
		}
		else {
			//$model->unsetAttributes();
			Yii::app()->user->setFlash('error',"Form yang Diupload Salah!");
			$this->redirect(array('Katalog/F_katalog'));
		}
		unlink($path);
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