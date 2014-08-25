<?php

class PermintaanController extends Controller {
	public $layout='//layouts/main2';
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
    
    
    public function actionF_permintaan_f(){
		Yii::import('ext.phpexcelreader.JPhpExcelReader');
    	
    	$model = new TPermintaan;
        
        if (isset($_POST['TPermintaan'])) {
        	$model->attributes = $_POST['TPermintaan'];
            
            if ($model->validate()) {
            	//Input Data ke Tabel TPermintaan
				$model->ID_ANGGOTA=Yii::app()->session['username'];
				//$model->K_PERMINTAAN='';
				//$model->ID_ANGGOTA=001;
				$model->K_JENIS = $_POST['TPermintaan']['K_JENIS'];
				$model->TGL_PERMINTAAN=date('Y-m-d');
				//Yii::app()->user->setFlash('success', 'jenis: '.$model->K_JENIS);
				//echo Yii::app()->user->getFlash('success');
				$model->save();
				//$k_permintaan = $model->K_PERMINTAAN;
				
			}         
            
            /*
            $model->attributes = $_POST['TPermintaanBuku'];
			
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
				$isbn=$data->val($i, 3);
				$jenis = $data->val($i, 4);
				$bahasa=$data->val($i, 5);
				$penerbit = $data->val($i, 6);
				$tahun=$data->val($i, 7);
				$harga=$data->val($i, 8);
				$link=$data->val($i, 9);
				

		
				$command = Yii::app()->db->createCommand();
				$command->insert('TPermintaanBuku', array(
					 //'id_permintaan'=>'',
					 
					 'judul'=>$judul,
					 'pengarang'=>$pengarang,
					 'ISBN'=>$isbn,
					 'jenis'=>$jenis,
					 'bahasa'=>$bahasa,
					 'penerbit'=>$penerbit,
					 'tahun_terbit'=>$tahun,
					 'harga'=>$harga,
					 'link_website'=>$link,
					 'tgl_request'=>$tgl,
			 	));
			 if ($command) $sukses++;
			 else $gagal++;
			 }
			 echo "<h3>Proses import data selesai.</h3>";
			 echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
			 echo "Jumlah data yang gagal diimport : ".$gagal."</p>";
			 
			 unlink($path);
        
        */
        }

        $command = Yii::app()->db->createCommand('[dbo].[permintaan_bk]');
    	/*print_r($command->queryAll());
    	
		foreach ($command->queryAll() as $row) {
			echo $row['ID_ANGGOTA'];
			echo $row['JUDUL'];
		}
		*/
        $data=$command->queryAll();
        $this->render('f_permintaan_f', array('model' => $model,'data'=>$data));
    
	}
    

}
