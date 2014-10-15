<?php

/**
 * This is the model class for table "t_bk_main".
 *
 * The followings are the available columns in table 't_bk_main':
 * @property string $REGISTER
 * @property string $ISBN
 * @property string $TITLE
 * @property string $VOLUME
 * @property string $PRINTING
 * @property string $EDITION
 * @property string $LANGUAGE
 * @property integer $COPIES
 * @property string $MEDIA_CODE
 * @property string $TYPE_CODE
 * @property string $DEWEY_NO
 * @property string $AUTHOR_CODE
 * @property string $TITLE_CODE
 * @property string $YEAR_PUB
 * @property string $CITY_PUB
 * @property string $PUB_NAME
 * @property string $PHYS_DESCRIPTION
 * @property string $INDEX_
 * @property string $BIBLIOGRAPHY
 * @property string $LOCATION_CODE
 * @property string $SPEC_LOCATION
 * @property string $PRICE
 * @property string $FUND_CODE
 * @property string $FUND_NOTE
 * @property string $ACCEPT_DATE
 * @property string $DATA_ENTRY
 * @property string $OPERATOR_CODE
 */
class TBkMain extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	 public $filee;
	public function tableName()
	{
		return 't_bk_main';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TITLE,ISBN', 'required'),
			array('COPIES', 'numerical', 'integerOnly'=>true),
			array('REGISTER, ISBN, VOLUME, PRINTING, EDITION, SPEC_LOCATION', 'length', 'max'=>12),
			array('TITLE, PUB_NAME', 'length', 'max'=>255),
			array('LANGUAGE, DEWEY_NO, INDEX_', 'length', 'max'=>15),
			array('MEDIA_CODE, TYPE_CODE, FUND_CODE, OPERATOR_CODE', 'length', 'max'=>5),
			array('AUTHOR_CODE', 'length', 'max'=>3),
			array('TITLE_CODE', 'length', 'max'=>1),
			array('YEAR_PUB', 'length', 'max'=>4),
			array('CITY_PUB, FUND_NOTE', 'length', 'max'=>50),
			array('PHYS_DESCRIPTION', 'length', 'max'=>75),
			array('BIBLIOGRAPHY', 'length', 'max'=>20),
			array('LOCATION_CODE', 'length', 'max'=>7),
			array('PRICE', 'length', 'max'=>19),
			array('ACCEPT_DATE, DATA_ENTRY', 'safe'),
			array('filee','file','types'=>'xls,xlsx','allowEmpty' => true),
			array('filee','safe','on'=>'excel'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('REGISTER, ISBN, TITLE, VOLUME, PRINTING, EDITION, LANGUAGE, COPIES, MEDIA_CODE, TYPE_CODE, DEWEY_NO, AUTHOR_CODE, TITLE_CODE, YEAR_PUB, CITY_PUB, PUB_NAME, PHYS_DESCRIPTION, INDEX_, BIBLIOGRAPHY, LOCATION_CODE, SPEC_LOCATION, PRICE, FUND_CODE, FUND_NOTE, ACCEPT_DATE, DATA_ENTRY, OPERATOR_CODE', 'safe', 'on'=>'search'),
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
			'REGISTER' => 'Register',
			'ISBN' => 'Isbn',
			'TITLE' => 'Title',
			'VOLUME' => 'Volume',
			'PRINTING' => 'Printing',
			'EDITION' => 'Edition',
			'LANGUAGE' => 'Language',
			'COPIES' => 'Copies',
			'MEDIA_CODE' => 'Media Code',
			'TYPE_CODE' => 'Type Code',
			'DEWEY_NO' => 'Dewey No',
			'AUTHOR_CODE' => 'Author Code',
			'TITLE_CODE' => 'Title Code',
			'YEAR_PUB' => 'Year Pub',
			'CITY_PUB' => 'City Pub',
			'PUB_NAME' => 'Pub Name',
			'PHYS_DESCRIPTION' => 'Phys Description',
			'INDEX_' => 'Index',
			'BIBLIOGRAPHY' => 'Bibliography',
			'LOCATION_CODE' => 'Location Code',
			'SPEC_LOCATION' => 'Spec Location',
			'PRICE' => 'Price',
			'FUND_CODE' => 'Fund Code',
			'FUND_NOTE' => 'Fund Note',
			'ACCEPT_DATE' => 'Accept Date',
			'DATA_ENTRY' => 'Data Entry',
			'OPERATOR_CODE' => 'Operator Code',
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

		$criteria->compare('REGISTER',$this->REGISTER,true);
		$criteria->compare('ISBN',$this->ISBN,true);
		$criteria->compare('TITLE',$this->TITLE,true);
		$criteria->compare('VOLUME',$this->VOLUME,true);
		$criteria->compare('PRINTING',$this->PRINTING,true);
		$criteria->compare('EDITION',$this->EDITION,true);
		$criteria->compare('LANGUAGE',$this->LANGUAGE,true);
		$criteria->compare('COPIES',$this->COPIES);
		$criteria->compare('MEDIA_CODE',$this->MEDIA_CODE,true);
		$criteria->compare('TYPE_CODE',$this->TYPE_CODE,true);
		$criteria->compare('DEWEY_NO',$this->DEWEY_NO,true);
		$criteria->compare('AUTHOR_CODE',$this->AUTHOR_CODE,true);
		$criteria->compare('TITLE_CODE',$this->TITLE_CODE,true);
		$criteria->compare('YEAR_PUB',$this->YEAR_PUB,true);
		$criteria->compare('CITY_PUB',$this->CITY_PUB,true);
		$criteria->compare('PUB_NAME',$this->PUB_NAME,true);
		$criteria->compare('PHYS_DESCRIPTION',$this->PHYS_DESCRIPTION,true);
		$criteria->compare('INDEX_',$this->INDEX_,true);
		$criteria->compare('BIBLIOGRAPHY',$this->BIBLIOGRAPHY,true);
		$criteria->compare('LOCATION_CODE',$this->LOCATION_CODE,true);
		$criteria->compare('SPEC_LOCATION',$this->SPEC_LOCATION,true);
		$criteria->compare('PRICE',$this->PRICE,true);
		$criteria->compare('FUND_CODE',$this->FUND_CODE,true);
		$criteria->compare('FUND_NOTE',$this->FUND_NOTE,true);
		$criteria->compare('ACCEPT_DATE',$this->ACCEPT_DATE,true);
		$criteria->compare('DATA_ENTRY',$this->DATA_ENTRY,true);
		$criteria->compare('OPERATOR_CODE',$this->OPERATOR_CODE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->dblentera;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TBkMain the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
