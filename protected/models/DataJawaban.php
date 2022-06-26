<?php

/**
 * This is the model class for table "data_jawaban".
 *
 * The followings are the available columns in table 'data_jawaban':
 * @property string $id
 * @property string $idjawab
 * @property string $iduser
 * @property string $idkategori
 * @property integer $jml_soal
 * @property string $tgl_mulai
 * @property string $tgl_selesai
 * @property integer $benar
 * @property integer $salah
 */
class DataJawaban extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'data_jawaban';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idjawab, iduser, idkategori', 'required'),
			array('jml_soal, benar, salah', 'numerical', 'integerOnly'=>true),
			array('idjawab', 'length', 'max'=>10),
			array('iduser', 'length', 'max'=>25),
			array('idkategori', 'length', 'max'=>8),
			array('tgl_mulai, tgl_selesai', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idjawab, iduser, idkategori, jml_soal, tgl_mulai, tgl_selesai, benar, salah', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'idjawab' => 'Idjawab',
			'iduser' => 'Iduser',
			'idkategori' => 'Idkategori',
			'jml_soal' => 'Jml Soal',
			'tgl_mulai' => 'Tgl Mulai',
			'tgl_selesai' => 'Tgl Selesai',
			'benar' => 'Benar',
			'salah' => 'Salah',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('idjawab',$this->idjawab,true);
		$criteria->compare('iduser',$this->iduser,true);
		$criteria->compare('idkategori',$this->idkategori,true);
		$criteria->compare('jml_soal',$this->jml_soal);
		$criteria->compare('tgl_mulai',$this->tgl_mulai,true);
		$criteria->compare('tgl_selesai',$this->tgl_selesai,true);
		$criteria->compare('benar',$this->benar);
		$criteria->compare('salah',$this->salah);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DataJawaban the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
