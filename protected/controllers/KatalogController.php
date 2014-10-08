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
				echo "oke";
			}
			else echo "no";
				/*
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
				}*/
		}
		else $this->render('f_katalog',array('model'=>$model,
							'modSpecLoc'=>$modSpecLoc,
							'modLoc'=>$modLoc,
							'modFund'=>$modFund,
							'modTbk'=>$modTbk,
							'modTMedia'=>$modTMedia));
	}


	public function regBukuKolektif(){
		Yii::import('ext.phpexcelreader.JPhpExcelReader');
		
		//upload file excel			
		$fileUpload=CUploadedFile::getInstance($model,'filee');
		$path=Yii::getPathOfAlias('webroot').'/upload/'.$fileUpload;
		$fileUpload->saveAs($path);
		
		if( !file_exists( $path ) ) die( 'File could not be found at: ' . $path );
		$data=new JPhpExcelReader($path);
		
		$baris = $data->rowcount($sheet_index=0);
		$sukses = 0;
		$gagal = 0;
		
		//Baca File Excel
			for ($i=2; $i<=$baris; $i++)
			{
				$peminta   =$data->val($i,1);
				$judul     =$data->val($i,2);
				$pengarang =$data->val($i,3);
				$ISBN      =$data->val($i,4);
				$jenis     =$data->val($i,5);
				$bahasa    =$data->val($i,6);
				$penerbit  =$data->val($i,7);
				$tahun     =$data->val($i,8);
				$harga     =$data->val($i,9);
				$link      =$data->val($i,10);
				$status    =0;
				$prioritas =$data->val($i,11);
				if(strtolower($prioritas)=='wajib'){
					$idprioritas =1;
				}elseif(strtolower($prioritas)=='penunjang'){
					$idprioritas =2;
				}
				//Input Data Excel Ke Database	
				$command = Yii::app()->db->createCommand();
				$command->insert('t_bk_main', array(
					 //'id_permintaan'=>'',
					 'K_PERMINTAAN'=>$k_permintaan,
					 'NAMA_PEMINTA'=>$peminta,
					 'JUDUL'       =>$judul,
					 'PENGARANG'   =>$pengarang,
					 'ISBN'        =>$ISBN,
					 'JENIS'       =>$jenis,
					 'BAHASA'      =>$bahasa,
					 'PENERBIT'    =>$penerbit,
					 'TAHUN_TERBIT'=>$tahun,
					 'HARGA'       =>$harga,
					 'LINK_WEBSITE'=>$link,
					 'ID_STATUS'   =>$status,
					 'ID_PRIORITAS'=>$idprioritas,
				));
				if ($command) $sukses++;
				else $gagal++;
			 }//for
			 Yii::app()->user->setFlash('success',"Success import $sukses failed $gagal");
			 return;
		
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