<?php

class Site1Controller extends CController
{
	public function actionbaru()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('baru');
	}
}