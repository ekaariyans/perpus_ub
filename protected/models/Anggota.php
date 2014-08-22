<?php

/**
 * This is the model class for table "anggota".
 *
 * The followings are the available columns in table 'anggota':
 * @property string $nama
 * @property string $nim
 * @property string $k_fakultas
 * @property string $k_prodi
 * @property string $jenjang
 * @property string $angkatan
 * @property string $tgl_lahir
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
			array('nama, nim, k_fakultas, k_prodi, jenjang, angkatan, tgl_lahir', 'required'),
			array('nama', 'length', 'max'=>50),
			array('nim, tgl_lahir', 'length', 'max'=>20),
			array('k_fakultas, k_prodi, jenjang, angkatan', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nama, nim, k_fakultas, k_prodi, jenjang, angkatan, tgl_lahir', 'safe', 'on'=>'search'),
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
			'jenjang' => 'Jenjang',
			'angkatan' => 'Angkatan',
			'tgl_lahir' => 'Tgl Lahir',
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
		$criteria->compare('jenjang',$this->jenjang,true);
		$criteria->compare('angkatan',$this->angkatan,true);
		$criteria->compare('tgl_lahir',$this->tgl_lahir,true);

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
}
