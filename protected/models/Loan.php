<?php

/**
 * This is the model class for table "bank_loan".
 *
 * The followings are the available columns in table 'bank_loan':
 * @property integer $id
 * @property string $type
 * @property string $amount
 * @property integer $term
 * @property string $instalment
 * @property string $repayment
 * @property string $interval
 * @property integer $event_day
 * @property string $create_date
 * @property string $grant_date
 * @property string $accept_date
 * @property string $modify_date
 * @property string $status
 * @property integer $bank_interest_id
 * @property integer $bank_account_id
 */
class Loan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bank_loan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('accept_date, bank_interest_id, bank_account_id', 'required'),
			array('term, event_day, bank_interest_id, bank_account_id', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>15),
			array('amount, instalment, repayment', 'length', 'max'=>19),
			array('interval', 'length', 'max'=>5),
			array('status', 'length', 'max'=>8),
			array('create_date, grant_date, modify_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type, amount, term, instalment, repayment, interval, event_day, create_date, grant_date, accept_date, modify_date, status, bank_interest_id, bank_account_id', 'safe', 'on'=>'search'),
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
			'type' => 'Type',
			'amount' => 'Amount',
			'term' => 'Term',
			'instalment' => 'Instalment',
			'repayment' => 'Repayment',
			'interval' => 'Interval',
			'event_day' => 'Event Day',
			'create_date' => 'Create Date',
			'grant_date' => 'Grant Date',
			'accept_date' => 'Accept Date',
			'modify_date' => 'Modify Date',
			'status' => 'Status',
			'bank_interest_id' => 'Bank Interest',
			'bank_account_id' => 'Bank Account',
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('term',$this->term);
		$criteria->compare('instalment',$this->instalment,true);
		$criteria->compare('repayment',$this->repayment,true);
		$criteria->compare('interval',$this->interval,true);
		$criteria->compare('event_day',$this->event_day);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('grant_date',$this->grant_date,true);
		$criteria->compare('accept_date',$this->accept_date,true);
		$criteria->compare('modify_date',$this->modify_date,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('bank_interest_id',$this->bank_interest_id);
		$criteria->compare('bank_account_id',$this->bank_account_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Loan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
