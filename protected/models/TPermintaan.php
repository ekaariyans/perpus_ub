<?php

/**
 * This is the model class for table "t_permintaan".
 *
 * The followings are the available columns in table 't_permintaan':
 * @property integer $K_PERMINTAAN
 * @property string $ID_ANGGOTA
 * @property integer $K_JENIS
 * @property string $TGL_PERMINTAAN
 */
class TPermintaan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	  
	public function tableName()
	{
		return 't_permintaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('K_JENIS', 'required'),
			array('K_JENIS', 'numerical', 'integerOnly'=>true),
			array('ID_ANGGOTA', 'length', 'max'=>20),
			array('TGL_PERMINTAAN', 'safe'),
			//array('filee','file','types'=>'xls,xlsx','allowEmpty' => true),
			//array('filee','safe','on'=>'excel'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('K_PERMINTAAN, ID_ANGGOTA, K_JENIS, TGL_PERMINTAAN', 'safe', 'on'=>'search'),
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
			'K_PERMINTAAN' => 'K Permintaan',
			'ID_ANGGOTA' => 'Id Anggota',
			'K_JENIS' => 'K Jenis',
			'TGL_PERMINTAAN' => 'Tgl Permintaan',
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

		$criteria->compare('K_PERMINTAAN',$this->K_PERMINTAAN);
		$criteria->compare('ID_ANGGOTA',$this->ID_ANGGOTA,true);
		$criteria->compare('K_JENIS',$this->K_JENIS);
		$criteria->compare('TGL_PERMINTAAN',$this->TGL_PERMINTAAN,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TPermintaan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
