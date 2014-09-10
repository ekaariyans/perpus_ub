<?php

/**
 * This is the model class for table "t_permintaan_buku".
 *
 * The followings are the available columns in table 't_permintaan_buku':
 * @property integer $K_PERMINTAAN
 * @property string $JUDUL
 * @property string $PENGARANG
 * @property string $ISBN
 * @property string $JENIS
 * @property string $BAHASA
 * @property string $PENERBIT
 * @property integer $TAHUN_TERBIT
 * @property string $HARGA
 * @property string $LINK_WEBSITE
 */
class TPermintaanBuku extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $filee;
	public function tableName()
	{
		return 't_permintaan_buku';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('JUDUL, PENGARANG, JENIS, BAHASA, PENERBIT, TAHUN_TERBIT', 'required'),
			array('K_PERMINTAAN, TAHUN_TERBIT', 'numerical', 'integerOnly'=>true),
			array('JUDUL, PENGARANG, ISBN, JENIS, BAHASA, PENERBIT, HARGA', 'length', 'max'=>50),
			array('LINK_WEBSITE', 'length', 'max'=>250),
			array('filee','file','types'=>'xls,xlsx','allowEmpty' => true),
			array('filee','safe','on'=>'excel'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('K_PERMINTAAN, JUDUL, PENGARANG, ISBN, JENIS, BAHASA, PENERBIT, TAHUN_TERBIT, HARGA, LINK_WEBSITE', 'safe', 'on'=>'search'),
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
			'PENGARANG' => 'Pengarang',
			'ISBN' => 'Isbn',
			'JENIS' => 'Jenis',
			'BAHASA' => 'Bahasa',
			'PENERBIT' => 'Penerbit',
			'TAHUN_TERBIT' => 'Tahun Terbit',
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
		$criteria->compare('PENGARANG',$this->PENGARANG,true);
		$criteria->compare('ISBN',$this->ISBN,true);
		$criteria->compare('JENIS',$this->JENIS,true);
		$criteria->compare('BAHASA',$this->BAHASA,true);
		$criteria->compare('PENERBIT',$this->PENERBIT,true);
		$criteria->compare('TAHUN_TERBIT',$this->TAHUN_TERBIT);
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
	 * @return TPermintaanBuku the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
