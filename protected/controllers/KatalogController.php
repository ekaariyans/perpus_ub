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
					Yii::app()->user->setFlash('success',"Proses Input Data Berhasil!");
				}
				else {
					Yii::app()->user->setFlash('error',"Proses Input Gagal!");
				}
			}
		}
		$this->render('f_katalog',array('model'=>$model,
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
			
		for($col=1; $col<12; $col++){
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
				$register   	=$data->val($i,1);
				$ISBN     		=$data->val($i,2);
				$title 			=$data->val($i,3);
				$volume     	=$data->val($i,4);
				$printing   	=$data->val($i,5);
				$edition    	=$data->val($i,6);
				$language  		=$data->val($i,7);
				$copies     	=$data->val($i,8);
				$media_type 	=$data->val($i,9);
				$media_code		= strstr($media_type, ' ', true);
				$type_bk      	=$data->val($i,10);
				$type_code		=strstr($type_bk, ' ', true);
				$dewey_no    	=$data->val($i,11);
				$author_code	=$data->val($i,12);
				$title_code		=$data->val($i,13);
				$year_pub		=$data->val($i,14);
				$city_pub		=$data->val($i,15);
				$pub_name		=$data->val($i,16);
				$phys_desc		=$data->val($i,17);
				$index			=$data->val($i,18);
				$bibliography	=$data->val($i,19);			
				$loc			=$data->val($i,20);
				$loc_code		=strstr($loc, ' ', true);
				$spec			=$data->val($i,21);
				$spec_loc		=strstr($spec, ' ', true);
				$price			=$data->val($i,22);
				$fund			=$data->val($i,23);
				$fund_code		=strstr($fund, ' ', true);
				$fund_note		=$data->val($i,24);
				$date			= date('Y-m-d');
	
				//Input Data Excel Ke Database	
				$command = Yii::app()->dblentera->createCommand();
				$command->insert('t_bk_main', array(

					'OPERATOR_CODE' 	=> Yii::app()->session['username'],
					'REGISTER'			=> $register,
					'ISBN' 				=> $ISBN,
					'TITLE' 			=> $title,
					'VOLUME'			=> $volume,
					'PRINTING' 			=> $printing,
					'EDITION' 			=> $edition,
					'LANGUAGE' 			=> $language,
					'COPIES'			=> $copies,
					'MEDIA_CODE' 		=> $media_code,
					'TYPE_CODE' 		=> $type_code,
					'DEWEY_NO' 			=> $dewey_no,
					'AUTHOR_CODE' 		=> $author_code,
					'TITLE_CODE' 		=> $title_code,
					'YEAR_PUB' 			=> $year_pub,
					'CITY_PUB' 			=> $city_pub,
					'PUB_NAME' 			=> $pub_name,
					'PHYS_DESCRIPTION' 	=> $phys_desc,
					'INDEX_' 			=> $index,
					'BIBLIOGRAPHY' 		=> $bibliography,
					'LOCATION_CODE' 	=> $loc_code,
					'SPEC_LOCATION' 	=> $spec_loc,
					'PRICE'				=> $price,
					'FUND_CODE' 		=> $fund_code,
					'FUND_NOTE'			=> $fund_note,
					'ACCEPT_DATE' 		=> $date,
					'DATA_ENTRY'		=> $date
				));
				if ($command) $sukses++;
				else $gagal++;
			}//for
			Yii::app()->user->setFlash('success',"Success import $sukses failed $gagal");
			return;
			unlink($path);
		}
		else {
			Yii::app()->user->setFlash('error',"Form yang Diupload Salah!");
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