<?php

/**
 * This is the model class for table "report".
 *
 * The followings are the available columns in table 'report':
 * @property integer $id
 * @property string $pengirim
 * @property string $judul
 * @property string $berita
 * @property string $image
 * @property string $lokasi
 * @property string $dateposted
 * @property integer $status
 */
class Report extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public $verifyCode;
	public function tableName()
	{
		return 'report';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pengirim, judul, berita, lokasi, verifyCode', 'required'),
			array('pengirim','email'),
			array('image,', 'file', 
        		'types'=> 'jpg, jpeg, png',
        		'allowEmpty'=>true,
        		'maxSize' => (1024 * 400)
        		), 
			array('status', 'numerical', 'integerOnly'=>true),
			array('pengirim, lokasi', 'length', 'max'=>50),
			array('judul, image', 'length', 'max'=>100),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pengirim, judul, berita, lokasi, dateposted, status', 'safe', 'on'=>'search'),
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
			'pengirim' => 'Pengirim',
			'judul' => 'Judul',
			'berita' => 'Berita',
			'image' => 'Image',
			'lokasi' => 'Lokasi',
			'dateposted' => 'Dateposted',
			'status' => 'Status',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('pengirim',$this->pengirim,true);
		$criteria->compare('judul',$this->judul,true);
		$criteria->compare('berita',$this->berita,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('lokasi',$this->lokasi,true);
		$criteria->compare('dateposted',$this->dateposted,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Report the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
