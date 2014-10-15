<?php

class CetakController extends Controller
{
	public $layout='//layouts/column3';
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionCetakBarcode(){
		if(isset($_POST['checkbk'])){
			$register = $_POST['checkbk'];
		}
		$this->render('barcode',array('register'=>$register));
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