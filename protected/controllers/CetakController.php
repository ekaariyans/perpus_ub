<?php

class CetakController extends Controller
{
	public $layout='//layouts/column3';
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function hapus($register){
		$n = count($register);
		for($i=0; $i<$n; $i++){
			//belum bisa delete banyak
			$reg = $register[$i];
			$command = Yii::app()->dblentera->createCommand("[dbo].[sp_bk_del] @REGISTER = '$reg'");
			$command->execute();
			if($command->execute()){
				Yii::app()->user->setFlash('success',"Data berhasil dihapus!");
			}
			else{
				Yii::app()->user->setFlash('error',"Gagal menghapus data!");
			}
			//$url = Yii::app()->createUrl(array('Katalog/f_katalog','#'=>'daftar'));
			//$this->redirect($url);
			$this->redirect(array('Katalog/f_katalog'));
		}
	}
	
	public function actionCetakBarcode(){
		if(isset($_POST['checkbk'])){
			$register = $_POST['checkbk'];
		  	if(isset($_POST['label'])){
				$this->render('barcode',array('register'=>$register));
			}
			if(isset($_POST['hapus'])){
				$this->hapus($register);		
			}
			if(isset($_POST['addcopy'])){
				$this->redirect(array('Katalog/CopyList','register'=>$register));
			}
		}
		else{
			Yii::app()->user->setFlash('error',"Harap pilih buku yang akan dicetak register dan labelnya/ add copy/ ingin dihapus!");
			$this->redirect(array('Katalog/f_katalog'));
		}
		
	}
	
	public function actionCetak(){
		$bahasa = $_GET['bhs'];
		$status = $_GET['status'];
		//$this->render('cetak',array('status'=>$status));

		//untuk laporan buku belum dibeli
		if($status=='bd1'){
			$command = Yii::app()->db->createCommand("[dbo].[lap_buku] @bahasa = '$bahasa'");
		}
		
		//untuk laporan buku sudah dibeli
		else if($status=='sd1'){
			if($_GET['t1']!=''){
				$t1 = $_GET['t1'];
			}
			else $t1 = 'null';
			
			if($_GET['t2']!=''){
				$t2 = $_GET['t2'];
			}
			else $t2 = 'null';
			
			//echo $bahasa."t1".$t1."t2".$t2;
			$command = Yii::app()->db->createCommand("[dbo].[lap_buku_sd] @bahasa = '$bahasa',@t1 = '$t1',@t2 = '$t2'");
		}
       $data=$command->queryAll();
	   $this->render('cetak',array('status'=>$status,'data'=>$data));
	}
	
	public function actionCetakJurnal(){
		$bahasa = $_GET['bhs'];
		$status = $_GET['status'];

		//untuk laporan jurnal belum dibeli
		if($status=='bd2'){
			$command = Yii::app()->db->createCommand("[dbo].[lap_jurnal] @bahasa = '$bahasa'");
		}
		
		//untuk laporan jurnal sudah dibeli
		else if($status=='sd2'){
			if($_GET['t1']!=''){
				$t1 = $_GET['t1'];
			}
			else $t1 = 'null';
			
			if($_GET['t2']!=''){
				$t2 = $_GET['t2'];
			}
			else $t2 = 'null';
			
			$command = Yii::app()->db->createCommand("[dbo].[lap_jurnal_sd] @bahasa = '$bahasa',@t1 = '$t1',@t2 = '$t2'");
		}
       $data=$command->queryAll();
	   $this->render('cetak',array('status'=>$status,'data'=>$data));
	}
	
	public function actionCetakSerial(){
		$bahasa = $_GET['bhs'];
		$status = $_GET['status'];

		//untuk laporan jurnal belum dibeli
		if($status=='bd3'){
			$command = Yii::app()->db->createCommand("[dbo].[lap_serial] @bahasa = '$bahasa'");
		}
		
		//untuk laporan jurnal sudah dibeli
		else if($status=='sd3'){
			if($_GET['t1']!=''){
				$t1 = $_GET['t1'];
			}
			else $t1 = 'null';
			
			if($_GET['t2']!=''){
				$t2 = $_GET['t2'];
			}
			else $t2 = 'null';
			
			$command = Yii::app()->db->createCommand("[dbo].[lap_serial_sd] @bahasa = '$bahasa',@t1 = '$t1',@t2 = '$t2'");
		}
       $data=$command->queryAll();
	   $this->render('cetak',array('status'=>$status,'data'=>$data));
	}
	
	
}