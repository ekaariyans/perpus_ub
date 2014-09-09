<?php

class SiteController extends Controller
{
	public $layout='//layouts/column3';
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
		$this->redirect('index.php?r=site/loginForm');
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

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->User()){
				//$this->redirect(Yii::app()->user->returnUrl);
				//$layout='//layouts/main2';
				
				
				
				//echo "Halo session ".Yii::app()->session['username'];
				//unset(Yii::app()->session['username']);
				$this->redirect('index.php?r=permintaan');
				//$this->redirect($this->createUrl('permintaan'));
			}
				//echo "Halo ".$_POST['LoginForm']['username'];
		//		
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
	public function actionLoginForm() 
{ 
    $model=new User; 
    $data = null;
    if(isset($_POST['User'])) 
    { 
        $model->attributes=$_POST['User']; 
        if($model->validate()) 
        { 
            // form inputs are valid, do something here 
			$userid = $_POST['User']['USERNAME'];
			$password = $_POST['User']['PASSWORD'];
			$challenge = "123ab";
			$passport = md5($challenge.$password).'_'.$userid;
			$appid = "EKS1";
			$ipaddr = $_SERVER['REMOTE_ADDR'];
			//$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
			$url = "https://bais.ub.ac.id/api/login/xmlapi/?";
			$xml = simplexml_load_file($url.'userid='.$userid.'&passport='.$passport.'&challenge='.$challenge.'&appid='.$appid.'&ipaddr='.$ipaddr);

			$kenal = $xml->CONTENT->AUTHORITY->DIKENAL." </p>";
			$passwd = $xml->CONTENT->AUTHORITY->PASSWD." </p>";

			if($kenal==1){
				if($passwd == 1){
					Yii::app()->session['username'] = $userid;
					$this->redirect('index.php?r=permintaan');
				}
				else {
					//echo "<h2>Gagal Login!</h2>";
					//echo "<p>Password Salah!</p>";
					$data = "Password Salah!";
				}
			}
			else{
			   //echo "<h2>Gagal Login!</h2>";
			   //echo "<p>User Tidak Dikenal!</p>";
			   $data = "User Tidak Dikenal!";
			}
        } 
    } 
    $this->render('loginForm',array('model'=>$model, 'data'=>$data)); 
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