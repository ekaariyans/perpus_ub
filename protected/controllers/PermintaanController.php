<?php

class PermintaanController extends Controller {

    public function actionIndex() {
        $this->render('index');
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
                return;
            }
        }
        $this->render('f_permintaan', array('model' => $model));
    }

}
