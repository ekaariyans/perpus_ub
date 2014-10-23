<?php

/**
 * This is the model class for table "t_bk_add_copy".
 *
 * The followings are the available columns in table 't_bk_add_copy':
 * @property string $REGISTER
 * @property string $GROUP_NO
 * @property string $PRINTING
 * @property string $YEAR_PUB
 * @property string $COPY_NO
 * @property integer $STATUS
 * @property string $PRICE
 * @property string $FUND_CODE
 * @property string $FUND_NOTE
 * @property string $LOCATION_CODE
 * @property string $SPEC_LOCATION
 * @property string $ACCEPT_DATE
 * @property string $DATA_ENTRY
 * @property string $OPERATOR_CODE
 *
 * The followings are the available model relations:
 * @property BkNoteAdd $bkNoteAdd
 * @property Loanhist[] $loanhists
 * @property Member[] $tMembers
 * @property Funding $fUNDCODE
 * @property Location $lOCATIONCODE
 * @property BkMain $gROUPNO
 * @property Operator $oPERATORCODE
 * @property LocationSpec $sPECLOCATION
 * @property Operator[] $tOperators
 */
class BkAddCopy extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_bk_add_copy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('REGISTER', 'required'),
			array('STATUS', 'numerical', 'integerOnly'=>true),
			array('REGISTER, GROUP_NO, OPERATOR_CODE', 'length', 'max'=>12),
			array('PRINTING, COPY_NO, SPEC_LOCATION', 'length', 'max'=>10),
			array('YEAR_PUB', 'length', 'max'=>4),
			array('PRICE', 'length', 'max'=>19),
			array('FUND_CODE', 'length', 'max'=>5),
			array('FUND_NOTE', 'length', 'max'=>50),
			array('LOCATION_CODE', 'length', 'max'=>7),
			array('ACCEPT_DATE, DATA_ENTRY', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('REGISTER, GROUP_NO, PRINTING, YEAR_PUB, COPY_NO, STATUS, PRICE, FUND_CODE, FUND_NOTE, LOCATION_CODE, SPEC_LOCATION, ACCEPT_DATE, DATA_ENTRY, OPERATOR_CODE', 'safe', 'on'=>'search'),
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
			'bkNoteAdd' => array(self::HAS_ONE, 'BkNoteAdd', 'REGISTER'),
			'loanhists' => array(self::HAS_MANY, 'Loanhist', 'REGISTER'),
			'tMembers' => array(self::MANY_MANY, 'Member', 't_loan(REGISTER, MEMBER_ID)'),
			'fUNDCODE' => array(self::BELONGS_TO, 'Funding', 'FUND_CODE'),
			'lOCATIONCODE' => array(self::BELONGS_TO, 'Location', 'LOCATION_CODE'),
			'gROUPNO' => array(self::BELONGS_TO, 'BkMain', 'GROUP_NO'),
			'oPERATORCODE' => array(self::BELONGS_TO, 'Operator', 'OPERATOR_CODE'),
			'sPECLOCATION' => array(self::BELONGS_TO, 'LocationSpec', 'SPEC_LOCATION'),
			'tOperators' => array(self::MANY_MANY, 'Operator', 't_print(REGISTER, OPERATOR_CODE)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'REGISTER' => 'Register',
			'GROUP_NO' => 'Group No',
			'PRINTING' => 'Printing',
			'YEAR_PUB' => 'Year Pub',
			'COPY_NO' => 'Copy No',
			'STATUS' => 'Status',
			'PRICE' => 'Price',
			'FUND_CODE' => 'Fund Code',
			'FUND_NOTE' => 'Fund Note',
			'LOCATION_CODE' => 'Location Code',
			'SPEC_LOCATION' => 'Spec Location',
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
		$criteria->compare('GROUP_NO',$this->GROUP_NO,true);
		$criteria->compare('PRINTING',$this->PRINTING,true);
		$criteria->compare('YEAR_PUB',$this->YEAR_PUB,true);
		$criteria->compare('COPY_NO',$this->COPY_NO,true);
		$criteria->compare('STATUS',$this->STATUS);
		$criteria->compare('PRICE',$this->PRICE,true);
		$criteria->compare('FUND_CODE',$this->FUND_CODE,true);
		$criteria->compare('FUND_NOTE',$this->FUND_NOTE,true);
		$criteria->compare('LOCATION_CODE',$this->LOCATION_CODE,true);
		$criteria->compare('SPEC_LOCATION',$this->SPEC_LOCATION,true);
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
	 * @return BkAddCopy the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
