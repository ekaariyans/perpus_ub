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
    public function actionF_permintaan() {
        $model = new Permintaan;

        // uncomment the following code to enable ajax-based validation
        /*
          if(isset($_POST['ajax']) && $_POST['ajax']==='permintaan-f_permintaan-form')
          {
          echo CActiveForm::validate($model);
          Yii::app()->end();
          }
         */

        if (isset($_POST['Permintaan'])) {
            $model->attributes = $_POST['Permintaan'];
            if ($model->validate()) {
                // form inputs PERMINTAAN BUKU BARU
                $model->id_anggota = $_POST['Permintaan']['id_anggota'];
                $model->judul = $_POST['Permintaan']['judul'];
                $model->jenis = $_POST['Permintaan']['jenis'];
                $model->pengarang = $_POST['Permintaan']['pengarang'];
                $model->penerbit = $_POST['Permintaan']['penerbit'];
                $model->tahun_terbit = $_POST['Permintaan']['tahun_terbit'];
                $model->kota = $_POST['Permintaan']['kota'];
                $model->edisi = $_POST['Permintaan']['edisi'];
                $model->isbn = $_POST['Permintaan']['isbn'];
                $model->keterangan = $_POST['Permintaan']['keterangan'];
                $model->save();
                $this->redirect(array('Permintaan/Index'));
                return;
            }
        }
        $data = Permintaan::model()->findAll();
		//$this->render('listPermintaan',array('data'=>$data));
        $this->render('f_permintaan', array('model' => $model,'data'=>$data));
    }
    
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
    	$model = new Permintaan;

        if (isset($_POST['Permintaan'])) {
			//$model = new Upload2;
            $model->attributes = $_POST['Permintaan'];
			
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
				$jenis = $data->val($i, 2);
				$pengarang = $data->val($i, 3);
				$penerbit = $data->val($i, 4);
				$tahun=$data->val($i, 5);
				$kota=$data->val($i, 6);
				$edisi=$data->val($i, 7);
				$isbn=$data->val($i, 8);
				$ket=$data->val($i, 9);
				
				$command = Yii::app()->db->createCommand();
				$command->insert('Permintaan', array(
					 'id_permintaan'=>'',
					 'id_anggota'=>$_POST['Permintaan']['id_anggota'],
					 'judul'=>$judul,
					 'jenis'=>$jenis,
					 'pengarang'=>$pengarang,
					 'penerbit'=>$penerbit,
					 'tahun_terbit'=>$tahun,
					 'kota'=>$kota,
					 'edisi'=>$edisi,
					 'isbn'=>$isbn,
					 'keterangan'=>$ket,
			 	));
			 if ($command) $sukses++;
			 else $gagal++;
			 }
			 echo "<h3>Proses import data selesai.</h3>";
			 echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
			 echo "Jumlah data yang gagal diimport : ".$gagal."</p>";
			 
			 unlink($path);
        }
        $data = Permintaan::model()->findAll();
		//$this->render('listPermintaan',array('data'=>$data));
        $this->render('f_permintaan_f', array('model' => $model,'data'=>$data));
	}
    

}
