<?php

class PermintaanController extends Controller {
	public $layout='//layouts/main2';
    
    public $sukses;
	public $gagal;

    public function __construct()
    {
        if (empty(Yii::app()->session['username'])){
			$this->redirect('index.php?r=site/loginForm');	  
     	}
     }
    
    public function actionIndex() {
        $this->render('Permintaan/index');
    }
    
	public function actionDetail(){
		$detail = $_GET['det'];
		$this->render('permintaan/viewdetail', array('detail'=>$detail));
		
	}
	
 	public function actionF_laporan_p()
	{
		
		$model = new TPermintaan;
		$modelBk = new TPermintaanBuku;
        $modelJur = new TPermintaanJurnal;
        $modelSer = new TPermintaanSerial;
		
		$user= Yii::app()->session['username'];
        
		if(isset($_GET['kpermintaan'])){
		$k_permintaan = $_GET['kpermintaan'];
		$command = Yii::app()->db->createCommand("[dbo].[detailbuku] @k_permintaan=$k_permintaan");
		$datadetail=$command->queryAll();
		}
        $command = Yii::app()->db->createCommand("[dbo].[show_lap_buku]  ");
        $data=$command->queryAll();
		$command = Yii::app()->db->createCommand("[dbo].[show_lap_buku1]  ");
        $data1=$command->queryAll();
		
         $commandJur = Yii::app()->db->createCommand("[dbo].[permintaanJurnal] @id_anggota =$user ");
        $dataJur=$commandJur->queryAll();
        
        $commandSer = Yii::app()->db->createCommand("[dbo].[permintaanSerial] @id_anggota =$user ");
        $dataSer=$commandSer->queryAll();
                
		$this->render('Permintaan/f_laporan_p', array('model'=>$model,  'modelBk'=>$modelBk, 'data'=>$data,'data1'=>$data1,'dataJur'=>$dataJur,'dataSer'=>$dataSer));
	}
    
	
    
    public function actionF_permintaan() {
        $model = new TPermintaan;
		$modelBk = new TPermintaanBuku;
        $modelJur = new TPermintaanJurnal;
        $modelSer = new TPermintaanSerial;
        
        if (isset($_POST['TPermintaan'])) {
            $model->attributes = $_POST['TPermintaan'];
        	$k_jenis = $_POST['TPermintaan']['K_JENIS'];

			if($k_jenis==1){
				$model2 = $modelBk;
				$namaModel = 'TPermintaanBuku';
			}
			else if($k_jenis==2){
				$model2 = $modelJur;
				$namaModel = 'TPermintaanJurnal';
			}
			else {
				$model2 = $modelSer;
				$namaModel = 'TPermintaanSerial';
			}
        
			// validate BOTH $a and $b
			$valid=$model->validate();
            //&& $model2->validate()
            if($valid){
				// form inputs PERMINTAAN BUKU BARU
                $model->ID_ANGGOTA=Yii::app()->session['username'];
                $model->K_JENIS = $_POST['TPermintaan']['K_JENIS'];
                $model->TGL_PERMINTAAN=date('Y-m-d');
                $model->save();
                //ambil id_terakhir
				$k_permintaan = $model->K_PERMINTAAN;
                $model2->attributes = $_POST[$namaModel];
                
                $valid2=$model2->validate();
                
                if($k_jenis==1 && $valid2){
					$this->inputBukuIndividu($k_permintaan,$model2);
				}
				else if($k_jenis==2 && $valid2){
					$this->inputJurnalIndividu($k_permintaan,$model2);
				}
				else if($k_jenis==3 && $valid2) {
					$this->inputSerialIndividu($k_permintaan,$model2);
				}
                $this->redirect(array('Permintaan/f_permintaan'));
                return;
            }
                   
        }
        $user= Yii::app()->session['username'];
        $command = Yii::app()->db->createCommand("[dbo].[permintaanBuku] @id_anggota =$user ");
        $data=$command->queryAll();
        
        $commandJur = Yii::app()->db->createCommand("[dbo].[permintaanJurnal] @id_anggota =$user ");
        $dataJur=$commandJur->queryAll();
        
        $commandSer = Yii::app()->db->createCommand("[dbo].[permintaanSerial] @id_anggota =$user ");
        $dataSer=$commandSer->queryAll();
        
        $this->render('Permintaan/f_permintaan', array('model' => $model,'modelBk' => $modelBk,'modelJur' => $modelJur,'modelSer' => $modelSer,'data'=>$data,'dataJur'=>$dataJur,'dataSer'=>$dataSer));
    }
    
    
    public function inputBukuIndividu($k_permintaan,$model2){
		$model2->K_PERMINTAAN=$k_permintaan;
		$model2->JUDUL=$_POST['TPermintaanBuku']['JUDUL'];
		$model2->PENGARANG=$_POST['TPermintaanBuku']['PENGARANG'];
		$model2->ISBN=$_POST['TPermintaanBuku']['ISBN'];
		$model2->JENIS=$_POST['TPermintaanBuku']['JENIS'];
		$model2->BAHASA=$_POST['TPermintaanBuku']['BAHASA'];
		$model2->PENERBIT=$_POST['TPermintaanBuku']['PENERBIT'];
		$model2->TAHUN_TERBIT=$_POST['TPermintaanBuku']['TAHUN_TERBIT'];
		$model2->HARGA=$_POST['TPermintaanBuku']['HARGA'];
		$model2->LINK_WEBSITE=$_POST['TPermintaanBuku']['LINK_WEBSITE'];
		$model2->save();
		return;
	}
    
    public function inputJurnalIndividu($k_permintaan,$model2){
    	$model2->K_PERMINTAAN=$k_permintaan;
		$model2->JUDUL=$_POST['TPermintaanJurnal']['JUDUL'];
		$model2->PENGARANG=$_POST['TPermintaanJurnal']['PENGARANG'];
		$model2->JENIS=$_POST['TPermintaanJurnal']['JENIS'];
		$model2->BAHASA=$_POST['TPermintaanJurnal']['BAHASA'];
		$model2->HARGA=$_POST['TPermintaanJurnal']['HARGA'];
		$model2->LINK_WEBSITE=$_POST['TPermintaanJurnal']['LINK_WEBSITE'];
		$model2->save();
		return;
	}
    	
    public function inputSerialIndividu($k_permintaan,$model2){
    	$model2->K_PERMINTAAN=$k_permintaan;
		$model2->JUDUL=$_POST['TPermintaanSerial']['JUDUL'];
		$model2->VOLUME=$_POST['TPermintaanSerial']['VOLUME'];
		$model2->TAHUN=$_POST['TPermintaanSerial']['TAHUN'];
		$model2->FREKWENSI=$_POST['TPermintaanSerial']['FREKWENSI'];
		$model2->JENIS=$_POST['TPermintaanSerial']['JENIS'];
		$model2->BAHASA=$_POST['TPermintaanSerial']['BAHASA'];
		$model2->HARGA=$_POST['TPermintaanSerial']['HARGA'];
		$model2->LINK_WEBSITE=$_POST['TPermintaanSerial']['LINK_WEBSITE'];
		$model2->save();
		return;
	}   	
    	
    	
    public function BacaPermintaanBuku($path,$namaTabel,$k_permintaan){
    	if( !file_exists( $path ) ) die( 'File could not be found at: ' . $path );
		$data=new JPhpExcelReader($path);

		$baris = $data->rowcount($sheet_index=0);
    	$sukses = 0;
		$gagal = 0;
				
		//Baca File Excel
		for ($i=2; $i<=$baris; $i++)
		{
			$judul = $data->val($i, 1);
			$pengarang = $data->val($i, 2);
			$ISBN=$data->val($i, 3);
			$jenis = $data->val($i, 4);
			$bahasa=$data->val($i, 5);
			$penerbit = $data->val($i, 6);
			$tahun=$data->val($i, 7);
			$harga=$data->val($i, 8);
			$link=$data->val($i, 9);
			//Input Data Excel Ke Database	
			$command = Yii::app()->db->createCommand();
			$command->insert($namaTabel, array(
				 //'id_permintaan'=>'',
				 'K_PERMINTAAN'=>$k_permintaan,
				 'JUDUL'=>$judul,
				 'PENGARANG'=>$pengarang,
				 'ISBN'=>$ISBN,
				 'JENIS'=>$jenis,
				 'BAHASA'=>$bahasa,
				 'PENERBIT'=>$penerbit,
				 'TAHUN_TERBIT'=>$tahun,
				 'HARGA'=>$harga,
				 'LINK_WEBSITE'=>$link,
			));
		 	if ($command) $sukses++;
		 	else $gagal++;
		 }//for
		 return;
	}
    
    public function BacaPermintaanJurnal($path,$namaTabel,$k_permintaan){
    	if( !file_exists( $path ) ) die( 'File could not be found at: ' . $path );
		$data=new JPhpExcelReader($path);

		$baris = $data->rowcount($sheet_index=0);
    	$sukses = 0;
		$gagal = 0;
				
		//Baca File Excel
		for ($i=2; $i<=$baris; $i++)
		{
			$judul = $data->val($i, 1);
			$pengarang = $data->val($i, 2);
			$jenis = $data->val($i, 3);
			$bahasa=$data->val($i, 4);
			$harga=$data->val($i, 5);
			$link=$data->val($i, 6);
			//Input Data Excel Ke Database	
			$command = Yii::app()->db->createCommand();
			$command->insert($namaTabel, array(
				 'K_PERMINTAAN'=>$k_permintaan,
				 'JUDUL'=>$judul,
				 'PENGARANG'=>$pengarang,
				 'JENIS'=>$jenis,
				 'BAHASA'=>$bahasa,
				 'HARGA'=>$harga,
				 'LINK_WEBSITE'=>$link,
			));
		 	if ($command) $sukses++;
		 	else $gagal++;
		 }//for
		 return;
	}
    
    public function BacaPermintaanSerial($path,$namaTabel,$k_permintaan){
    	if( !file_exists( $path ) ) die( 'File could not be found at: ' . $path );
		$data=new JPhpExcelReader($path);

		$baris = $data->rowcount($sheet_index=0);
    	$sukses = 0;
		$gagal = 0;
				
		//Baca File Excel
		for ($i=2; $i<=$baris; $i++)
		{
			$judul = $data->val($i, 1);
			$pengarang = $data->val($i, 2);
			$jenis = $data->val($i, 3);
			$bahasa=$data->val($i, 4);
			$harga=$data->val($i, 5);
			$link=$data->val($i, 6);
			//Input Data Excel Ke Database	
			$command = Yii::app()->db->createCommand();
			$command->insert($namaTabel, array(
				 'K_PERMINTAAN'=>$k_permintaan,
				 'JUDUL'=>$judul,
				 'VOLUME'=>$volume,
				 'TAHUN'=>$tahun,
				 'FREKWENSI'=>$frekwensi,
				 'JENIS'=>$jenis,
				 'BAHASA'=>$bahasa,
				 'HARGA'=>$harga,
				 'LINK_WEBSITE'=>$link,
			));
		 	if ($command) $sukses++;
		 	else $gagal++;
		 }//for
		 return;
	}
    
    
    public function actionF_permintaan_f(){
		Yii::import('ext.phpexcelreader.JPhpExcelReader');
    
		$model = new TPermintaan;
		if(isset($_POST['TPermintaan']))
			{

			$model->attributes=$_POST['TPermintaan'];

			$k_jenis = $_POST['TPermintaan']['K_JENIS'];

			if($k_jenis==1){
				$namaTabel = 't_permintaan_buku';
			}
			else if($k_jenis==2){
				$namaTabel = 't_permintaan_jurnal';
			}
			else {
				$namaTabel = 't_permintaan_serial';
			}
        
			// validate BOTH $a and $b
			$valid=$model->validate();

			if($valid)
			{
				//Input Data ke Tabel TPermintaan
				//$k_jenis = $_POST['TPermintaan']['K_JENIS'];
				$model->ID_ANGGOTA=Yii::app()->session['username'];
				$model->K_JENIS=$k_jenis;
				$model->TGL_PERMINTAAN=date('Y-m-d');
				$model->save();
				//ambil id_terakhir
				$k_permintaan = $model->K_PERMINTAAN;
				
				//upload file excel			
				$fileUpload=CUploadedFile::getInstance($model,'filee');
				$path=Yii::getPathOfAlias('webroot').'/upload/'.$fileUpload;
				$fileUpload->saveAs($path);

				//PANGGIL FUNGSI BACA FILE
				if($k_jenis==1){
					$this->BacaPermintaanBuku($path, $namaTabel, $k_permintaan);
				}
				else if($k_jenis==2){
					$this->BacaPermintaanJurnal($path, $namaTabel, $k_permintaan);
				}
				else {
					$this->BacaPermintaanSerial($path, $namaTabel, $k_permintaan);
				}				 
				 
				echo "<h3>Proses import data selesai.</h3>";
				echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
				echo "Jumlah data yang gagal diimport : ".$gagal."</p>";

				unlink($path);
			}
		}//isset@id_anggota = 'demo'
     	
       	$user= Yii::app()->session['username'];
        $command = Yii::app()->db->createCommand("[dbo].[permintaanBuku] @id_anggota =$user ");
        $data=$command->queryAll();
        
        $commandJur = Yii::app()->db->createCommand("[dbo].[permintaanJurnal] @id_anggota =$user ");
        $dataJur=$commandJur->queryAll();
        
        $commandSer = Yii::app()->db->createCommand("[dbo].[permintaanSerial] @id_anggota =$user ");
        $dataSer=$commandSer->queryAll();
        
         $this->render('Permintaan/f_permintaan_f', array('model' => $model,'data'=>$data,'dataJur'=>$dataJur,'dataSer'=>$dataSer));
         
	}//f_permintaan_f
    
}