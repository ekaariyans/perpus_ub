<?php

class SiteController extends Controller
{
	public $layout='//layouts/column3';
	//public $userid;
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->render('login');
		$this->redirect('index.php?r=site/login');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	public function actionLogin() { 
		$model=new UserWeb; 
		$data = null;
		if(isset($_POST['UserWeb'])) 
		{ 
			$model->attributes=$_POST['UserWeb']; 
			if($model->validate()) 
			{ 
				// form inputs are valid, do something here 
				$userid = $_POST['UserWeb']['USERNAME'];
				$password = $_POST['UserWeb']['PASSWORD'];
				$challenge = "123ab";
				$passport = md5($challenge.$password).'_'.$userid;
				$appid = "EKS1";
				$ipaddr = $_SERVER['REMOTE_ADDR'];
				//$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
				$url = "https://bais.ub.ac.id/api/login/xmlapi/?";
				$xml = simplexml_load_file($url.'userid='.$userid.'&passport='.$passport.'&challenge='.$challenge.'&appid='.$appid.'&ipaddr='.$ipaddr);

				$kenal = $xml->CONTENT->AUTHORITY->DIKENAL." </p>";
				$passwd = $xml->CONTENT->AUTHORITY->PASSWD." </p>";
				$nama = $xml->CONTENT->USER->NAMA." </p>";

				if($kenal==1){
					if($passwd == 1){
						Yii::app()->session['username'] = $userid;
						Yii::app()->session['bagian'] = "116";
						Yii::app()->session['level'] = "02";
						$this->redirect('index.php?r=permintaan');
					}
					else {
						$data = "Password Salah!";
						$this->LogiDb($data);
					}
				}
				else{
					$data = "User Tidak Dikenal!";
					$this->LogiDb($data);
				}
			} 
		}//isset
		else $this->render('login',array('model'=>$model, 'data'=>$data)); 
    
	}//function

	public function LogiDb($data)
	{
		$model=new UserWeb;
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}		
		
		$model->attributes=$_POST['UserWeb'];
		// validate user input and redirect to the previous page if valid
		if($model->validate() && $model->login()){		
			$userid = $_POST['UserWeb']['USERNAME'];
			Yii::app()->session['username']=$userid;
			//Yii::app()->session['bagian'] = "116";
			//Yii::app()->session['level'] = "02";
			$this->redirect('index.php?r=permintaan');
		}
		// display the login form
		else $this->render('login',array('model'=>$model, 'data'=>$data)); 
	}
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}