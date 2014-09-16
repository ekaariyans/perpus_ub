<?php

class CetakController extends Controller
{
	public $layout='//layouts/column3';
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionCetak(){
		$bahasa = $_GET['bhs'];
		
		//echo $bahasa;
		if($bahasa=="Semua Bahasa"){
			$command = Yii::app()->db->createCommand("[dbo].[lap_buku_all]");
		}
		else{
			$command = Yii::app()->db->createCommand("[dbo].[lap_buku] @bahasa =$bahasa ");
		}
		
        $data=$command->queryAll();
		$this->render('cetak',array('data'=>$data));
		
	}
}