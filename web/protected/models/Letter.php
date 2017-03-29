<?php

/**
 * This is the model class for table "letter".
 *
 * The followings are the available columns in table 'letter':
 * @property integer $idLetter
 * @property string $email
 * @property string $senderName
 * @property string $senderEmail
 * @property string $subject
 * @property string $body
 * @property string $listId
 * @property string $createDate
 * @property string $sendDate
 * @property string $sendReport
 */
class Letter extends CActiveRecord
{
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'letter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, senderName, senderEmail, subject, body, listId, createDate', 'required'),
			array('sendDate, sendReport', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idLetter, email, senderName, senderEmail, subject, body, listId, createDate, sendDate, sendReport', 'safe', 'on'=>'search'),
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
			'idLetter' => 'Id Letter',
			'email' => 'Email',
			'senderName' => 'Sender Name',
			'senderEmail' => 'Sender Email',
			'subject' => 'Subject',
			'body' => 'Body',
			'listId' => 'List',
			'createDate' => 'Create Date',
			'sendDate' => 'Send Date',
			'sendReport' => 'Send Report',
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

		$criteria->compare('idLetter',$this->idLetter);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('senderName',$this->senderName,true);
		$criteria->compare('senderEmail',$this->senderEmail,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('listId',$this->listId,true);
		$criteria->compare('createDate',$this->createDate,true);
		$criteria->compare('sendDate',$this->sendDate,true);
		$criteria->compare('sendReport',$this->sendReport,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Letter the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
