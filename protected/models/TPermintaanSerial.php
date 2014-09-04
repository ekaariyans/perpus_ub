<?php

/**
 * This is the model class for table "t_permintaan_serial".
 *
 * The followings are the available columns in table 't_permintaan_serial':
 * @property integer $K_PERMINTAAN
 * @property string $JUDUL
 * @property string $VOLUME
 * @property integer $TAHUN
 * @property string $FREKWENSI
 * @property string $JENIS
 * @property string $BAHASA
 * @property string $HARGA
 * @property string $LINK_WEBSITE
 */
class TPermintaanSerial extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_permintaan_serial';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('JUDUL, VOLUME, TAHUN, FREKWENSI, JENIS, BAHASA, HARGA', 'required'),
			array('K_PERMINTAAN, TAHUN', 'numerical', 'integerOnly'=>true),
			array('JUDUL', 'length', 'max'=>250),
			array('VOLUME, FREKWENSI, JENIS, BAHASA, HARGA, LINK_WEBSITE', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('K_PERMINTAAN, JUDUL, VOLUME, TAHUN, FREKWENSI, JENIS, BAHASA, HARGA, LINK_WEBSITE', 'safe', 'on'=>'search'),
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
			'JUDUL' => 'Judul',
			'VOLUME' => 'Volume',
			'TAHUN' => 'Tahun',
			'FREKWENSI' => 'Frekwensi',
			'JENIS' => 'Jenis',
			'BAHASA' => 'Bahasa',
			'HARGA' => 'Harga',
			'LINK_WEBSITE' => 'Link Website',
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
		$criteria->compare('JUDUL',$this->JUDUL,true);
		$criteria->compare('VOLUME',$this->VOLUME,true);
		$criteria->compare('TAHUN',$this->TAHUN);
		$criteria->compare('FREKWENSI',$this->FREKWENSI,true);
		$criteria->compare('JENIS',$this->JENIS,true);
		$criteria->compare('BAHASA',$this->BAHASA,true);
		$criteria->compare('HARGA',$this->HARGA,true);
		$criteria->compare('LINK_WEBSITE',$this->LINK_WEBSITE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TPermintaanSerial the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
