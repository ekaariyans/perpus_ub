<?php

/**
 * This is the model class for table "anggota".
 *
 * The followings are the available columns in table 'anggota':
 * @property string $nama
 * @property string $nim
 * @property string $k_fakultas
 * @property string $k_prodi
 * @property string $k_jenjang
 * @property string $angkatan
 * @property string $tgl_lahir
 * @property string $alamat1
 * @property string $kodepos1
 * @property string $notelp1
 * @property string $alamat2
 * @property string $kodepos2
 * @property string $notelp2
 */
class Anggota extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'anggota';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, nim, k_fakultas, k_prodi, k_jenjang, angkatan, tgl_lahir, alamat1, kodepos1, notelp1, alamat2, kodepos2, notelp2', 'required'),
			array('nama', 'length', 'max'=>50),
			array('nim, notelp1, notelp2', 'length', 'max'=>20),
			array('k_fakultas, k_prodi, k_jenjang, angkatan, kodepos1, kodepos2', 'length', 'max'=>10),
			array('alamat1, alamat2', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nama, nim, k_fakultas, k_prodi, k_jenjang, angkatan, tgl_lahir, alamat1, kodepos1, notelp1, alamat2, kodepos2, notelp2', 'safe', 'on'=>'search'),
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
			'nama' => 'Nama',
			'nim' => 'Nim',
			'k_fakultas' => 'K Fakultas',
			'k_prodi' => 'K Prodi',
			'k_jenjang' => 'K Jenjang',
			'angkatan' => 'Angkatan',
			'tgl_lahir' => 'Tgl Lahir',
			'alamat1' => 'Alamat1',
			'kodepos1' => 'Kodepos1',
			'notelp1' => 'Notelp1',
			'alamat2' => 'Alamat2',
			'kodepos2' => 'Kodepos2',
			'notelp2' => 'Notelp2',
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

		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('nim',$this->nim,true);
		$criteria->compare('k_fakultas',$this->k_fakultas,true);
		$criteria->compare('k_prodi',$this->k_prodi,true);
		$criteria->compare('k_jenjang',$this->k_jenjang,true);
		$criteria->compare('angkatan',$this->angkatan,true);
		$criteria->compare('tgl_lahir',$this->tgl_lahir,true);
		$criteria->compare('alamat1',$this->alamat1,true);
		$criteria->compare('kodepos1',$this->kodepos1,true);
		$criteria->compare('notelp1',$this->notelp1,true);
		$criteria->compare('alamat2',$this->alamat2,true);
		$criteria->compare('kodepos2',$this->kodepos2,true);
		$criteria->compare('notelp2',$this->notelp2,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Anggota the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getFakultas()
	{
		$fak=Yii::app()->db->createCommand()
		->select ('fakultas')
		->from ('fakultas')
		->queryAll();
		return $fak;
	}
	
	public function getJenjang()
	{
		$fak=Yii::app()->db->createCommand()
		->select ('k_jenjang')
		->from ('jenjang')
		->queryAll();
		return $fak;
	}
	public function getProdi()
	{
		$fak=Yii::app()->db->createCommand()
		->select ('k_prodi')
		->from ('prodi')
		->queryAll();
		return $fak;
	}
}
