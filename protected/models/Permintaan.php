<?php

/**
 * This is the model class for table "permintaan".
 *
 * The followings are the available columns in table 'permintaan':
 * @property integer $id_permintaan
 * @property string $id_anggota
 * @property string $judul
 * @property string $jenis
 * @property string $pengarang
 * @property string $penerbit
 * @property integer $tahun_terbit
 * @property string $kota
 * @property string $edisi
 * @property string $isbn
 * @property string $keterangan
 */
class Permintaan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'permintaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 judul, jenis, pengarang, penerbit, tahun_terbit, kota, edisi, isbn, keterangan
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_anggota', 'required'),
			array('tahun_terbit', 'numerical', 'integerOnly'=>true),
			array('id_anggota, jenis, kota', 'length', 'max'=>20),
			array('judul, pengarang, penerbit, isbn', 'length', 'max'=>50),
			array('edisi', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_permintaan, id_anggota, judul, jenis, pengarang, penerbit, tahun_terbit, kota, edisi, isbn, keterangan', 'safe', 'on'=>'search'),
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
			'id_permintaan' => 'Id Permintaan',
			'id_anggota' => 'Id Anggota',
			'judul' => 'Judul',
			'jenis' => 'Jenis',
			'pengarang' => 'Pengarang',
			'penerbit' => 'Penerbit',
			'tahun_terbit' => 'Tahun Terbit',
			'kota' => 'Kota',
			'edisi' => 'Edisi',
			'isbn' => 'Isbn',
			'keterangan' => 'Keterangan',
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

		$criteria->compare('id_permintaan',$this->id_permintaan);
		$criteria->compare('id_anggota',$this->id_anggota,true);
		$criteria->compare('judul',$this->judul,true);
		$criteria->compare('jenis',$this->jenis,true);
		$criteria->compare('pengarang',$this->pengarang,true);
		$criteria->compare('penerbit',$this->penerbit,true);
		$criteria->compare('tahun_terbit',$this->tahun_terbit);
		$criteria->compare('kota',$this->kota,true);
		$criteria->compare('edisi',$this->edisi,true);
		$criteria->compare('isbn',$this->isbn,true);
		$criteria->compare('keterangan',$this->keterangan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Permintaan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
