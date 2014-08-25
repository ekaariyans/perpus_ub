<?php

/**
 * This is the model class for table "upload".
 *
 * The followings are the available columns in table 'upload':
 * @property string $id_anggota
 * @property string $judul
 * @property string $pengarang
 * @property string $penerbit
 */
class Upload extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	 public $filee;
	 
	public function tableName()
	{
		return 'upload';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_anggota', 'required'),
			//array('id_anggota', 'length', 'max'=>20),
			//array('judul', 'length', 'max'=>40),
			//array('pengarang, penerbit', 'length', 'max'=>25),
			array('filee','file','types'=>'xls'),
			array('filee','safe','on'=>'excel'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			//array('id_anggota, judul, pengarang, penerbit', 'safe', 'on'=>'search'),
			array('id_anggota', 'safe', 'on'=>'search'),
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
			'id_anggota' => 'Id Anggota',
			
			//'judul' => 'Judul',
			//'pengarang' => 'Pengarang',
			//'penerbit' => 'Penerbit',
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

		$criteria->compare('id_anggota',$this->id_anggota,true);
		$criteria->compare('judul',$this->judul,true);
		$criteria->compare('pengarang',$this->pengarang,true);
		$criteria->compare('penerbit',$this->penerbit,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Upload the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
