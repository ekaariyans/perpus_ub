<?php

/**
 * This is the model class for table "t_user_request".
 *
 * The followings are the available columns in table 't_user_request':
 * @property string $ID_ANGGOTA
 * @property string $ID_PRIVILEGE
 * @property string $USERNAME
 * @property string $PASSWORD
 */
class UserWeb extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	 private $_identity;
	  public $username;
	public $password;
	public $rememberMe;
	
	public function tableName()
	{
		return 't_user_request';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' USERNAME, PASSWORD', 'required'),
			array('ID_ANGGOTA', 'length', 'max'=>20),
			array('ID_PRIVILEGE', 'length', 'max'=>5),
			array('USERNAME, PASSWORD', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_ANGGOTA, ID_PRIVILEGE, USERNAME, PASSWORD', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_ANGGOTA' => 'Id Anggota',
			'ID_PRIVILEGE' => 'Id Privilege',
			'USERNAME' => 'Username',
			'PASSWORD' => 'Password',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID_ANGGOTA',$this->ID_ANGGOTA,true);
		$criteria->compare('ID_PRIVILEGE',$this->ID_PRIVILEGE,true);
		$criteria->compare('USERNAME',$this->USERNAME,true);
		$criteria->compare('PASSWORD',$this->PASSWORD,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
		
		
		
		
		public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->USERNAME,$this->PASSWORD);
			if(!$this->_identity->authenticate())
				$this->addError('PASSWORD','Incorrect username or password.');
		}
	}

		public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->USERNAME,$this->PASSWORD);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
		public function encrypt($value){
		
		return md5($value);
	}
	
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
