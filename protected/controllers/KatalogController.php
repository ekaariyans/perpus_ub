<?php

class KatalogController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionAksi()
	{
		$model1=new TBkMain; 
		$modLoc = new TLocation;
		$modSpecLoc = new TSpecLocation;
		$modFund = new TFunding;
		$modTbk = new TBkType;
		$modTMedia = new TMediaType;
		
		if(isset($_GET['det'])&&($_GET['nama'])){
		$register = $_GET['det'];
		$aksi=($_GET['nama']);
		$command = Yii::app()->dblentera->createCommand("[dbo].[sp_bk_main_all]");
        $data=$command->queryAll();
				
			if($aksi=='detailbuku'){
				
				$this->render('view', array('data'=>$data,'register'=>$register));
			}
			else if($aksi=='editbuku'){
				
					if(isset($_POST['TBkMain'])) 
					{ 
						$model1->attributes=$_POST['TBkMain']; 
						
						
						$OPERATOR_CODE = Yii::app()->session['username'];
						$REGISTER = $_POST['TBkMain']['REGISTER'];
						$ISBN = $_POST['TBkMain']['ISBN'];
						$TITLE = $_POST['TBkMain']['TITLE'];
						$VOLUME = $_POST['TBkMain']['VOLUME'];
						$PRINTING = $_POST['TBkMain']['PRINTING'];
						$EDITION = $_POST['TBkMain']['EDITION'];
						$LANGUAGE = $_POST['TBkMain']['LANGUAGE'];
						$COPIES = $_POST['TBkMain']['COPIES'];
						$MEDIA_CODE = $_POST['TMediaType']['MEDIA_CODE'];
						$TYPE_CODE = $_POST['TBkType']['TYPE_CODE'];
						$DEWEY_NO = $_POST['TBkMain']['DEWEY_NO'];
						$AUTHOR_CODE = $_POST['TBkMain']['AUTHOR_CODE'];
						$TITLE_CODE = $_POST['TBkMain']['TITLE_CODE'];
						$YEAR_PUB = $_POST['TBkMain']['YEAR_PUB'];
						$CITY_PUB = $_POST['TBkMain']['CITY_PUB'];
						$PUB_NAME = $_POST['TBkMain']['PUB_NAME'];
						$PHYS_DESCRIPTION = $_POST['TBkMain']['PHYS_DESCRIPTION'];
						$INDEX_ = $_POST['TBkMain']['INDEX_'];
						$BIBLIOGRAPHY = $_POST['TBkMain']['BIBLIOGRAPHY'];
						$LOCATION_CODE = $_POST['TLocation']['LOCATION_CODE'];
						$SPEC_LOCATION = $_POST['TSpecLocation']['SPEC_LOCATION'];
						$PRICE = $_POST['TBkMain']['PRICE'];
						$FUND_CODE = $_POST['TFunding']['FUND_CODE'];
						$FUND_NOTE = $_POST['TBkMain']['FUND_NOTE'];
						$ACCEPT_DATE = $_POST['DATA_ENTRY'];
						$DATA_ENTRY = date('Y-m-d');;
							
						
						
						$command = Yii::app()->dblentera->createCommand("[dbo].[sp_bk_editbuku]  
						@OPERATOR_CODE		='$OPERATOR_CODE',
						@REGISTER			='$REGISTER',
						@ISBN				='$ISBN',
						@TITLE				='$TITLE',
						@VOLUME				='$VOLUME',
						@PRINTING			='$PRINTING',
						@EDITION			='$EDITION',
						@LANGUAGE			='$LANGUAGE',
						@COPIES				='$COPIES',
						@MEDIA_CODE			='$MEDIA_CODE',
						@TYPE_CODE			='$TYPE_CODE',
						@DEWEY_NO			='$DEWEY_NO',
						@AUTHOR_CODE		='$AUTHOR_CODE',
						@TITLE_CODE			='$TITLE_CODE',
						@YEAR_PUB			='$YEAR_PUB',
						@CITY_PUB			='$CITY_PUB',
						@PUB_NAME			='$PUB_NAME',
						@PHYS_DESCRIPTION	='$PHYS_DESCRIPTION',
						@INDEX_				='$INDEX_',
						@BIBLIOGRAPHY		='$BIBLIOGRAPHY',
						@LOCATION_CODE		='$LOCATION_CODE',
						@SPEC_LOCATION		='$SPEC_LOCATION',
						@PRICE				='$PRICE',
						@FUND_CODE			='$FUND_CODE',
						@FUND_NOTE			='$FUND_NOTE',
						@ACCEPT_DATE		='$ACCEPT_DATE',
						@DATA_ENTRY			='$DATA_ENTRY'
						");
       					
						$data=$command->execute();
						
						$this->redirect('katalog/f_katalog', array('data'=>$data,'register'=>$register));
					} 
		
		
					else{
						$this->render('edit',array('model1'=>$model1, 
													'data'=>$data, 
													'modSpecLoc'=>$modSpecLoc,
													'modLoc'=>$modLoc,
													'modFund'=>$modFund,
													'modTbk'=>$modTbk,
													'modTMedia'=>$modTMedia,
													'register'=>$register));
					}
		
			}
		}
	}
	
	public function actionF_katalog()
	{
		$model=new TBkMain;
		$modLoc = new TLocation;
		$modSpecLoc = new TSpecLocation;
		$modFund = new TFunding;
		$modTbk = new TBkType;
		$modTMedia = new TMediaType;
		/*
					if(isset($_POST['register']))
					{
						$register = $_POST['register'];
						$command = Yii::app()->dblentera->createCommand("[dbo].[sp_bk_main] @register='$register' ");
						$data=$command->queryAll();		
					}
						
					if(isset($_POST['tanggal1'])&&($_POST['tanggal2']))
					{
						$tanggal1 = $_POST['tanggal1'];
						$tanggal2 = $_POST['tanggal2'];
						$command = Yii::app()->dblentera->createCommand("[dbo].[sp_bk_main_date] @tanggal1='$tanggal1',@tanggal2='$tanggal2' ");
						$data=$command->queryAll();
					}
					else if(!isset($_POST['register'])&&!isset($_POST['tanggal1'])&&!isset($_POST['tanggal2']))
					{
						$register=0;
						$command = Yii::app()->dblentera->createCommand("[dbo].[sp_bk_main_all]");
						$data=$command->queryAll();
					}
		*/
		
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
					$newreg = $this->generateRegister();
					$model->OPERATOR_CODE = Yii::app()->session['username'];
					$model->REGISTER = $newreg;
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
					$model->DATA_ENTRY = date('Y-m-d');;
					
					$model->save();
					Yii::app()->user->setFlash('success',"Proses Input Data Berhasil!");
					$newreg = $this->generateRegister();
					$this->redirect(array('Katalog/F_katalog'));
				}
				else {
					if(isset($_POST['register']))
					{
						$register = $_POST['register'];
						$command = Yii::app()->dblentera->createCommand("[dbo].[sp_bk_main] @register='$register' ");
						$data=$command->queryAll();
						$newreg = $this->generateRegister();
						$this->render('f_katalog',array('model'=>$model,
							'modSpecLoc'=>$modSpecLoc,
							'modLoc'=>$modLoc,
							'modFund'=>$modFund,
							'modTbk'=>$modTbk,
							'modTMedia'=>$modTMedia,
							'data'=>$data,
							'newreg' => $newreg));						
					}
					else if(isset($_POST['tanggal1'])&&($_POST['tanggal2']))
					{
						$tanggal1 = $_POST['tanggal1'];
						$tanggal2 = $_POST['tanggal2'];
						$command = Yii::app()->dblentera->createCommand("[dbo].[sp_bk_main_date] @tanggal1='$tanggal1',@tanggal2='$tanggal2' ");
						$data=$command->queryAll();
						$newreg = $this->generateRegister();
						$this->render('f_katalog',array('model'=>$model,
							'modSpecLoc'=>$modSpecLoc,
							'modLoc'=>$modLoc,
							'modFund'=>$modFund,
							'modTbk'=>$modTbk,
							'modTMedia'=>$modTMedia,
							'data'=>$data,
							'newreg' => $newreg));
					}
					else if(!$model->validate()){
						Yii::app()->user->setFlash('error',"Proses Input Gagal!");
						$this->redirect(array('Katalog/F_katalog'));
					}
				}
			}
		}
		else{
			$register=0;
			$command = Yii::app()->dblentera->createCommand("[dbo].[sp_bk_main_all]");
			$data=$command->queryAll();
			
			$newreg = $this->generateRegister();
			$this->render('f_katalog',array('model'=>$model,
				'modSpecLoc'=>$modSpecLoc,
				'modLoc'=>$modLoc,
				'modFund'=>$modFund,
				'modTbk'=>$modTbk,
				'modTMedia'=>$modTMedia,
				'data'=>$data,
				'newreg' => $newreg));
		}
	}
	
	
	public function generateRegister(){
		$newreg = null;
		//generate register
		$sql = Yii::app()->db->createCommand()
			->select('REGISTER')
			->from('lentera.dbo.t_bk_main')
			->where("OPERATOR_CODE = '".Yii::app()->session['username']."'")
			->order('REGISTER desc')
			//->text;
			->queryRow();	
			
		if(!empty($sql)){
			$reg = $sql['REGISTER'];
			$numb = (int)substr($reg,6);
			$newnum = str_pad($numb+1, 6, "0", STR_PAD_LEFT);	
		}
		else{
			$newnum = '000001';
		}	
		$r_baca = substr(Yii::app()->session['bagian'], -2);
		$tahun  = substr(date("Y"), -2);
		//register baru
		$newreg = "01".$r_baca.$tahun.$newnum;
		return $newreg;
	}


	public function regBukuKolektif($model){
		Yii::import('ext.phpexcelreader.JPhpExcelReader');
		$register = null;
		$isTrue = false;
		//upload file excel			
		$fileUpload=CUploadedFile::getInstance($model,'filee');
		$path=Yii::getPathOfAlias('webroot').'/upload/'.$fileUpload;
		$fileUpload->saveAs($path);
			
		if( !file_exists( $path ) ) die( 'File could not be found at: ' . $path );
		$data=new JPhpExcelReader($path);
			
		$baris = $data->rowcount($sheet_index=0);
			
		for($col=1; $col<23; $col++){
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
				if(!empty($register)){
					$register = (float)$register+1;
					$newreg = str_pad($register, 12, "0", STR_PAD_LEFT);
					//echo "gak empty".$newreg;
				}
				else {
					$register = $this->generateRegister();
					$newreg = $register;
					//echo "empty".$register;
				}
				
				$media_type 	=$data->val($i,8);
				$media_code		= strstr($media_type, ' ', true);
				$type_bk      	=$data->val($i,9);
				$type_code		=strstr($type_bk, ' ', true);
				$loc			=$data->val($i,19);
				$loc_code		=strstr($loc, ' ', true);
				$spec			=$data->val($i,20);
				$spec_loc		=strstr($spec, ' ', true);
				$fund			=$data->val($i,22);
				$fund_code		=strstr($fund, ' ', true);
				$date			= date('Y-m-d');
				
				$command = Yii::app()->dblentera->createCommand()
				->insert('t_bk_main', array(
					'OPERATOR_CODE' => Yii::app()->session['username'],
					'REGISTER' => $newreg,
					'ISBN' => $data->val($i,1),
					'TITLE' => $data->val($i,2),
					'VOLUME' => $data->val($i,3),
					'PRINTING' => $data->val($i,4),
					'EDITION' => $data->val($i,5),
					'LANGUAGE' => $data->val($i,6),
					'COPIES' => $data->val($i,7),
					'MEDIA_CODE' => $media_code,
					'TYPE_CODE' => $type_code,
					'DEWEY_NO' => $data->val($i,10),
					'AUTHOR_CODE' => $data->val($i,11),
					'TITLE_CODE' => $data->val($i,12),
					'YEAR_PUB' => $data->val($i,13),
					'CITY_PUB' => $data->val($i,14),
					'PUB_NAME' => $data->val($i,15),
					'PHYS_DESCRIPTION' => $data->val($i,16),
					'INDEX_' => $data->val($i,17),
					'BIBLIOGRAPHY' => $data->val($i,18),
					'LOCATION_CODE' => $loc_code,
					'SPEC_LOCATION' => $spec_loc,
					'PRICE' => $data->val($i,21),
					'FUND_CODE' => $fund_code,
					'FUND_NOTE' => $data->val($i,23),
					'ACCEPT_DATE' => $date,
					'DATA_ENTRY' => $date,
				));
				if ($command) $sukses++;
				else $gagal++;
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