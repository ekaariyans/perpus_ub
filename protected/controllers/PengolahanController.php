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
		$this->render('/index');
			
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
	
	
	 	public function actionEditbuku(){
		
		$model1=new TPermintaanBuku; 
		
		if(isset($_GET['det'])&&($_GET['nama'])){
		$id_permintaan_buku = $_GET['det'];
		$aksi=($_GET['nama']);
		$command = Yii::app()->db->createCommand("[dbo].[show_lap_buku]  ");
        $data=$command->queryAll();
				
			if($aksi=='detailbuku'){
				
				$this->render('pengolahan/viewdetail', array('data'=>$data,'id_permintaan_buku'=>$id_permintaan_buku));
			}
			else if($aksi=='editbuku'){
				
					if(isset($_POST['TPermintaanBuku'])) 
					{ 
						$model1->attributes=$_POST['TPermintaanBuku']; 
						
						
							$ID_PERMINTAAN_BUKU	=$id_permintaan_buku;
							$NAMA_PEMINTA	=$_POST['TPermintaanBuku']['NAMA_PEMINTA'];
							$JUDUL			=$_POST['TPermintaanBuku']['JUDUL'];
							$PENGARANG		=$_POST['TPermintaanBuku']['PENGARANG'];
							$ISBN			=$_POST['TPermintaanBuku']['ISBN'];
							$JENIS			=$_POST['TPermintaanBuku']['JENIS'];
							$BAHASA			=$_POST['TPermintaanBuku']['BAHASA'];
							$PENERBIT		=$_POST['TPermintaanBuku']['PENERBIT'];
							$TAHUN_TERBIT	=$_POST['TPermintaanBuku']['TAHUN_TERBIT'];
							$HARGA			=$_POST['TPermintaanBuku']['HARGA'];
							$ID_STATUS		=$_POST['TPermintaanBuku']['ID_STATUS'];
							$LINK_WEBSITE	=$_POST['TPermintaanBuku']['LINK_WEBSITE'];
							$ID_PRIORITAS	=$_POST['TPermintaanBuku']['ID_PRIORITAS'];
						
						
						$command = Yii::app()->db->createCommand("[dbo].[editbuku]  
						@ID_PERMINTAAN_BUKU	='$ID_PERMINTAAN_BUKU',
						@NAMA_PEMINTA	='$NAMA_PEMINTA',
						@JUDUL			='$JUDUL',
						@PENGARANG		='$PENGARANG',
						@ISBN			='$ISBN',
						@JENIS			='$JENIS',
						@BAHASA			='$BAHASA',
						@PENERBIT		='$PENERBIT',
						@TAHUN_TERBIT	='$TAHUN_TERBIT',
						@HARGA			='$HARGA',
						@ID_STATUS		='$ID_STATUS',
						@LINK_WEBSITE	='$LINK_WEBSITE',
						@ID_PRIORITAS	='$ID_PRIORITAS'
						");
       					
						$data=$command->queryAll();
						
						$this->render('pengolahan/viewdetail', array('data'=>$data,'id_permintaan_buku'=>$id_permintaan_buku));
					} 
		
		
					else{
						$this->render('pengolahan/editbuku',array('model1'=>$model1, 'data'=>$data, 'id_permintaan_buku'=>$id_permintaan_buku));
					}
		
			}
			else{
				//echo $k_permintaan;
				$query = "delete from t_permintaan_buku where ID_PERMINTAAN_BUKU = $id_permintaan_buku";
				$command = Yii::app()->db->createCommand($query);
				$command->execute();
				$this->redirect('index.php?r=pengolahan/f_laporan_p');
			}
		}
	}
	
	public function actionEditjurnal() 
	{ 
		$model1=new TPermintaanJurnal; 
		if(isset($_GET['det'])&&($_GET['nama'])){
		$id_permintaan_jurnal = $_GET['det'];
		$aksi=($_GET['nama']);
		$command = Yii::app()->db->createCommand("[dbo].[show_lap_jurnal]  ");
        $data=$command->queryAll();
				
			if($aksi=='detailbuku'){
				
				$this->render('pengolahan/viewdetailjurnal', array('data'=>$data,'id_permintaan_jurnal'=>$id_permintaan_jurnal));
			}
			else if($aksi=='editbuku'){
	
				if(isset($_POST['TPermintaanJurnal'])) 
				{ 
					$model1->attributes=$_POST['TPermintaanJurnal']; 
							$ID_PERMINTAAN_JURNAL	=$id_permintaan_jurnal;
							$NAMA_PEMINTA	=$_POST['TPermintaanJurnal']['NAMA_PEMINTA'];
							$JUDUL			=$_POST['TPermintaanJurnal']['JUDUL'];
							$PENGARANG		=$_POST['TPermintaanJurnal']['PENGARANG'];
							$JENIS			=$_POST['TPermintaanJurnal']['JENIS'];
							$BAHASA			=$_POST['TPermintaanJurnal']['BAHASA'];
							$HARGA			=$_POST['TPermintaanJurnal']['HARGA'];
							$ID_STATUS		=$_POST['TPermintaanJurnal']['ID_STATUS'];
							$LINK_WEBSITE	=$_POST['TPermintaanJurnal']['LINK_WEBSITE'];
							$ID_PRIORITAS	=$_POST['TPermintaanJurnal']['ID_PRIORITAS'];
							
							$command = Yii::app()->db->createCommand("[dbo].[editjurnal]  
						@ID_PERMINTAAN_JURNAL	='$ID_PERMINTAAN_JURNAL',
						@NAMA_PEMINTA	='$NAMA_PEMINTA',
						@JUDUL			='$JUDUL',
						@PENGARANG		='$PENGARANG',
						@JENIS			='$JENIS',
						@BAHASA			='$BAHASA',
						@HARGA			='$HARGA',
						@ID_STATUS		='$ID_STATUS',
						@LINK_WEBSITE	='$LINK_WEBSITE',
						@ID_PRIORITAS	='$ID_PRIORITAS'
						");
       					
						$data=$command->queryAll();
						
						$this->render('pengolahan/viewdetailjurnal', array('data'=>$data,'id_permintaan_jurnal'=>$id_permintaan_jurnal));
					} 
		
		
				else{
						$this->render('pengolahan/editjurnal',array('model1'=>$model1, 'data'=>$data, 'id_permintaan_jurnal'=>$id_permintaan_jurnal));
				}
		}
		else{
				//echo $k_permintaan;
				$query = "delete from t_permintaan_jurnal where ID_PERMINTAAN_JURNAL = $id_permintaan_jurnal";
				$command = Yii::app()->db->createCommand($query);
				$command->execute();
				
				
				$this->redirect('index.php?r=pengolahan/f_laporan_p');
			}
	 
		}
	}
	
	public function actionEditserial() 
	{ 
		$model1=new TPermintaanSerial; 
	
		if(isset($_GET['det'])&&($_GET['nama'])){
		$id_permintaan_serial = $_GET['det'];
		$aksi=($_GET['nama']);
		$command = Yii::app()->db->createCommand("[dbo].[show_lap_serial]  ");
        $data=$command->queryAll();
				
			if($aksi=='detailbuku'){
				
				$this->render('pengolahan/viewdetailserial', array('data'=>$data,'id_permintaan_serial'=>$id_permintaan_serial));
			}
			else if($aksi=='editbuku'){
				
	
		if(isset($_POST['TPermintaanSerial'])) 
		{ 
			$model1->attributes=$_POST['TPermintaanSerial']; 
							$ID_PERMINTAAN_SERIAL	=$id_permintaan_serial;
							$NAMA_PEMINTA	=$_POST['TPermintaanSerial']['NAMA_PEMINTA'];
							$JUDUL			=$_POST['TPermintaanSerial']['JUDUL'];
							$VOLUME			=$_POST['TPermintaanSerial']['VOLUME'];
							$TAHUN			=$_POST['TPermintaanSerial']['TAHUN'];
							$FREKWENSI		=$_POST['TPermintaanSerial']['FREKWENSI'];
							$JENIS			=$_POST['TPermintaanSerial']['JENIS'];
							$BAHASA			=$_POST['TPermintaanSerial']['BAHASA'];
							$HARGA			=$_POST['TPermintaanSerial']['HARGA'];
							$ID_STATUS		=$_POST['TPermintaanSerial']['ID_STATUS'];
							$LINK_WEBSITE	=$_POST['TPermintaanSerial']['LINK_WEBSITE'];
							$ID_PRIORITAS	=$_POST['TPermintaanSerial']['ID_PRIORITAS'];
							
							$command = Yii::app()->db->createCommand("[dbo].[editserial]  
						@ID_PERMINTAAN_SERIAL	='$ID_PERMINTAAN_SERIAL',
						@NAMA_PEMINTA	='$NAMA_PEMINTA',
						@JUDUL			='$JUDUL',
						@VOLUME			='$VOLUME',
						@TAHUN			='$TAHUN',
						@FREKWENSI		='$FREKWENSI',
						@JENIS			='$JENIS',
						@BAHASA			='$BAHASA',
						@HARGA			='$HARGA',
						@ID_STATUS		='$ID_STATUS',
						@LINK_WEBSITE	='$LINK_WEBSITE',
						@ID_PRIORITAS	='$ID_PRIORITAS'
						");
       					
						$data=$command->queryAll();
						
						$this->render('pengolahan/viewdetailserial', array('data'=>$data,'id_permintaan_serial'=>$id_permintaan_serial));
		}
		else{
						$this->render('pengolahan/editserial',array('model1'=>$model1, 'data'=>$data, 'id_permintaan_serial'=>$id_permintaan_serial));
				}
		}
		else{
				//echo $k_permintaan;
				$query = "delete from t_permintaan_serial where ID_PERMINTAAN_SERIAL = $id_permintaan_serial";
				$command = Yii::app()->db->createCommand($query);
				$command->execute();
				
				
				$this->redirect('index.php?r=pengolahan/f_laporan_p');
			}
		} 
		 
	}
		
 	public function actionF_laporan_p()
	{
		
		$model = new TPermintaan;
		$modelBk = new TPermintaanBuku;
        $modelJur = new TPermintaanJurnal;
        $modelSer = new TPermintaanSerial;
		
		$user= Yii::app()->session['username'];
        
		
        $command = Yii::app()->db->createCommand("[dbo].[show_lap_buku]");
        $data=$command->queryAll();
		
         $commandJur = Yii::app()->db->createCommand("[dbo].[show_lap_jurnal]");
        $dataJur=$commandJur->queryAll();
        
        $commandSer = Yii::app()->db->createCommand("[dbo].[show_lap_serial]");
        $dataSer=$commandSer->queryAll();
                
		$this->render('pengolahan/f_laporan_p', array('model'=>$model,  'modelBk'=>$modelBk, 'data'=>$data,'dataJur'=>$dataJur,'dataSer'=>$dataSer));
	}
	
	
	public function actionDetail(){
		$detail = $_GET['det'];
		$this->render('pengolahan/viewdetail', array('detail'=>$detail));
		
	}
	

	
}