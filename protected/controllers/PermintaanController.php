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
	
	public function tes(){
		echo "halo ".$_POST['dat'];
	}
	public function actionKirimemail()
	{
    	$mailer = Yii::createComponent('application.extensions.mailer.EMailer');
     	$mailer->IsSMTP();
     	$mailer->IsHTML(true);
     	$mailer->SMTPAuth = true;
     	$mailer->SMTPSecure = "ssl";
     	$mailer->Host = "smtp.gmail.com";
     	$mailer->Port = 465;
     	$mailer->Username = "experizhal@gmail.com";
     	$mailer->Password = 'magazine354';
     	$mailer->From = "Sabit Huraira";
     	$mailer->FromName = "Percobaan Kirim Email";
     	$mailer->AddAddress("djoekam_dmc@yahoo.com");
     	$mailer->Subject = "Percobaan.";
     	$mailer->Body = "Ini hanya percobaan mengirim email.";
     	if($mailer->Send()) 
     	{
          	echo "Message sent successfully!";
     	}
     	else 
     	{
          echo "Fail to send your message!";
     	}
	}
	
 	public function actionViewdetail(){
		
		
		if(isset($_GET['det'])){
		$k_permintaan = $_GET['det'];
		
		}
		
		$command = Yii::app()->db->createCommand("[dbo].[show_lap_buku]  ");
        $data=$command->queryAll();
		
		$this->render('permintaan/viewdetail', array('data'=>$data,'k_permintaan'=>$k_permintaan));
	}
	
	
	public function actionEditbuku() 
	{ 
		$model1=new TPermintaanBuku; 
	
		// uncomment the following code to enable ajax-based validation 
		/* 
		if(isset($_POST['ajax']) && $_POST['ajax']==='tpermintaan-buku-editbuku-form') 
		{ 
			echo CActiveForm::validate($model); 
			Yii::app()->end(); 
		} 
		*/ 
	
		if(isset($_POST['TPermintaanBuku'])) 
		{ 
			$model1->attributes=$_POST['TPermintaanBuku']; 
			if($model1->validate()) 
			{ 
				// form inputs are valid, do something here 
				return; 
			} 
		} 
		
		if(isset($_GET['det'])){
			$k_permintaan = $_GET['det'];
			
			}
			
			$command = Yii::app()->db->createCommand("[dbo].[show_lap_buku]  ");
			$data=$command->queryAll();
			
		$this->render('permintaan/editbuku',array('model1'=>$model1, 'data'=>$data, 'k_permintaan'=>$k_permintaan)); 
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
			
            
				// form inputs PERMINTAAN BUKU BARU
                $model->ID_ANGGOTA=Yii::app()->session['username'];
                $model->K_JENIS = $_POST['TPermintaan']['K_JENIS'];
                $model->TGL_PERMINTAAN=date('Y-m-d');
                $model->save();
                //ambil id_terakhir
				$k_permintaan = $model->K_PERMINTAAN;
                $model2->attributes = $_POST[$namaModel];
                
                $valid2=$model2->validate();
                if($valid2){
                if($k_jenis==1){
					$this->inputBukuIndividu($k_permintaan,$model2);
					
				}
				else if($k_jenis==2){
					$this->inputJurnalIndividu($k_permintaan,$model2);
				}
				else if($k_jenis==3) {
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
		$model2->NAMA_PEMINTA=$_POST['TPermintaanBuku']['NAMA_PEMINTA'];
		$model2->JUDUL=$_POST['TPermintaanBuku']['JUDUL'];
		$model2->PENGARANG=$_POST['TPermintaanBuku']['PENGARANG'];
		$model2->ISBN=$_POST['TPermintaanBuku']['ISBN'];
		$model2->JENIS=$_POST['TPermintaanBuku']['JENIS'];
		$model2->BAHASA=$_POST['TPermintaanBuku']['BAHASA'];
		$model2->PENERBIT=$_POST['TPermintaanBuku']['PENERBIT'];
		$model2->TAHUN_TERBIT=$_POST['TPermintaanBuku']['TAHUN_TERBIT'];
		$model2->HARGA=$_POST['TPermintaanBuku']['HARGA'];
		$model2->LINK_WEBSITE=$_POST['TPermintaanBuku']['LINK_WEBSITE'];
		$model2->ID_STATUS=0;
		$model2->ID_PRIORITAS=$_POST['TPermintaanBuku']['ID_PRIORITAS'];
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
			$peminta=$data->val($i,1);
			$judul = $data->val($i, 2);
			$pengarang = $data->val($i, 3);
			$ISBN=$data->val($i, 4);
			$jenis = $data->val($i, 5);
			$bahasa=$data->val($i, 6);
			$penerbit = $data->val($i, 7);
			$tahun=$data->val($i, 8);
			$harga=$data->val($i, 9);
			$link=$data->val($i, 10);
			$status=0;
			$prioritas=$data->val($i, 11);
			if($prioritas=='wajib'){
			$prioritas=1;
			}elseif($prioritas=='penunjang'){
			$prioritas=2;
			}
			//Input Data Excel Ke Database	
			$command = Yii::app()->db->createCommand();
			$command->insert($namaTabel, array(
				 //'id_permintaan'=>'',
				 'K_PERMINTAAN'=>$k_permintaan,
				 'NAMA_PEMINTA'=>$peminta,
				 'JUDUL'=>$judul,
				 'PENGARANG'=>$pengarang,
				 'ISBN'=>$ISBN,
				 'JENIS'=>$jenis,
				 'BAHASA'=>$bahasa,
				 'PENERBIT'=>$penerbit,
				 'TAHUN_TERBIT'=>$tahun,
				 'HARGA'=>$harga,
				 'LINK_WEBSITE'=>$link,
				 'ID_STATUS'=>$status,
				 'ID_PRIORITAS'=>$prioritas,
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