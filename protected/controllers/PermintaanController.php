<?php

class PermintaanController extends Controller {
	public $layout='//layouts/main2';
    
    public $sukses;
	public $gagal;

    public function actionIndex() {
        $this->render('index');
        //echo "Selamat datang di controller Permintaan";
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
     /*
    public function actionF_permintaan() {
        $model = new Permintaan;

        if (isset($_POST['Permintaan'])) {
            $model->attributes = $_POST['Permintaan'];
            if ($model->validate()) {
                // form inputs PERMINTAAN BUKU BARU
                $model->id_anggota=Yii::app()->session['username'];
                $model->judul = $_POST['Permintaan']['judul'];
                $model->jenis = $_POST['Permintaan']['jenis'];
                $model->pengarang = $_POST['Permintaan']['pengarang'];
                $model->penerbit = $_POST['Permintaan']['penerbit'];
                $model->tahun_terbit = $_POST['Permintaan']['tahun_terbit'];
                $model->bahasa = $_POST['Permintaan']['bahasa'];
                $model->harga = $_POST['Permintaan']['harga'];
                $model->ISBN = $_POST['Permintaan']['ISBN'];
                $model->link_website = $_POST['Permintaan']['link_website'];
                $model->tgl_request=date('Y-m-d');
                $model->save();
                $this->redirect(array('Permintaan/f_permintaan#Fakultas'));
                return;
            }
        }
        $data = Permintaan::model()->findAll();
		//$this->render('listPermintaan',array('data'=>$data));
        $this->render('f_permintaan', array('model' => $model,'data'=>$data));
    }*/
    
     public function actionUpload() {
        $model = new FileUpload();
    $form = new CForm('application.views.fileUpload.uploadForm', $model);
        if ($form->submitted('submit') && $form->validate()) {
            $form->model->image = CUploadedFile::getInstance($form->model, 'image');
            //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            //do something with your image here
            //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            Yii::app()->user->setFlash('success', 'File Uploaded');
            $this->redirect(array('upload'));
        }
        $this->render('upload', array('form' => $form));
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
    
    
    public function actionF_permintaan_f(){
		Yii::import('ext.phpexcelreader.JPhpExcelReader');
    	
    	$model = new TPermintaan;
        $model->attributes=$_POST['TPermintaan'];
        
        $k_jenis = $_POST['TPermintaan']['K_JENIS'];
        
        if($k_jenis==1){
        	//$model2 = new TPermintaanBuku;
			$tabel2 = 'TPermintaanBuku';
        	$namaTabel = 't_permintaan_buku';
        }
        else if($k_jenis==2){
        	//$model2 = new TPermintaanJurnal;
        	$tabel2 = 'TPermintaanJurnal';
        	$namaTabel = 't_permintaan_jurnal';
		}
        else {
        	//$model2 = new TPermintaanSerial;
			$tabel2 = 'TPermintaanSerial';
			$namaTabel = 't_permintaan_serial';
		}
        
        $model2 = new $tabel2;
        $model2->attributes=$_POST[$tabel2];
        

		if(isset($_POST['TPermintaan'], $_POST[$tabel2]))
		{
			// validate BOTH $a and $b
			$valid=$model->validate();
			$valid=$model2->validate() && $valid;

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
				$fileUpload=CUploadedFile::getInstance($model2,'filee');
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
		}//isset
        
        $command = Yii::app()->db->createCommand('[dbo].[permintaan_bk]');
        $data=$command->queryAll();
        $this->render('f_permintaan_f', array('model' => $model, 'model2'=>$model2,'data'=>$data));
         
	}//f_permintaan_f
    

}


/*
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
*/