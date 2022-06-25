<?php

/**
 * This is the model class for table "mst_soal".
 *
 * The followings are the available columns in table 'mst_soal':
 * @property string $id
 * @property string $idkategori
 * @property integer $no_soal
 * @property string $ket_soal
 * @property string $jwb_a
 * @property string $jwb_b
 * @property string $jwb_c
 * @property string $jwb_kunci
 */
class MstSoal extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mst_soal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idkategori', 'required'),
			array('no_soal', 'numerical', 'integerOnly'=>true),
			array('idkategori', 'length', 'max'=>8),
			array('jwb_a, jwb_b, jwb_c', 'length', 'max'=>45),
			array('jwb_kunci', 'length', 'max'=>1),
			array('ket_soal', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idkategori, no_soal, ket_soal, jwb_a, jwb_b, jwb_c, jwb_kunci', 'safe', 'on'=>'search'),
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
			'idkategori' => 'Idkategori',
			'no_soal' => 'No Soal',
			'ket_soal' => 'Ket Soal',
			'jwb_a' => 'Jwb A',
			'jwb_b' => 'Jwb B',
			'jwb_c' => 'Jwb C',
			'jwb_kunci' => 'Jwb Kunci',
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
		$criteria->compare('idkategori',$this->idkategori,true);
		$criteria->compare('no_soal',$this->no_soal);
		$criteria->compare('ket_soal',$this->ket_soal,true);
		$criteria->compare('jwb_a',$this->jwb_a,true);
		$criteria->compare('jwb_b',$this->jwb_b,true);
		$criteria->compare('jwb_c',$this->jwb_c,true);
		$criteria->compare('jwb_kunci',$this->jwb_kunci,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MstSoal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
