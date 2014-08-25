<?php
	class HelloController extends Controller{
		public $layout="NULL";
		
		function actionIndex(){
			echo "helo word!!";
		}
		
		function actionHellov(){
			$this->render("Hellov");
		}
	}
?>