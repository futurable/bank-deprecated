<?php

/**
 * This is the model class for table "bank_account_transaction".
 *
 * The followings are the available columns in table 'bank_account_transaction':
 * @property integer $id
 * @property string $recipient_iban
 * @property string $recipient_bic
 * @property string $recipient_name
 * @property string $event_date
 * @property string $create_date
 * @property string $modify_date
 * @property string $amount
 * @property string $reference_number
 * @property string $message
 * @property string $exchange_rate
 * @property string $currency
 * @property integer $bank_account_id
 *
 * The followings are the available model relations:
 * @property Account $bankAccount
 */
class AccountTransaction extends CActiveRecord
{
        public $form_step = 1;
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bank_account_transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('recipient_iban', 'ext.validators.validIban'),
			array('recipient_bic, bank_account_id, recipient_iban, recipient_name, event_date, amount', 'required', 'on'=>'-stepOne'),
                        array('recipient_iban', 'required'),
			array('bank_account_id', 'numerical', 'integerOnly'=>true),
			array('reference_number', 'numerical'),
			array('recipient_iban', 'length', 'max'=>32),
			array('recipient_bic, exchange_rate', 'length', 'max'=>11),
			array('recipient_name', 'length', 'max'=>35),
                        array('event_date', 'date', 'format'=>'dd.MM.yyyy'),
			array('amount', 'length', 'max'=>19),
                        array('amount', 'numerical'),
			array('reference_number', 'length', 'max'=>20),
			array('message', 'length', 'max'=>420),
			array('currency', 'length', 'max'=>3),
			array('event_date, create_date, modify_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, recipient_iban, recipient_bic, recipient_name, event_date, create_date, modify_date, amount, reference_number, message, exchange_rate, currency, bank_account_id', 'safe', 'on'=>'search'),
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
			'bankAccount' => array(self::BELONGS_TO, 'Account', 'bank_account_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'recipient_iban' => Yii::t('AccountTransaction', 'RecipientIban'),
			'recipient_bic' => Yii::t('AccountTransaction', 'RecipientBic'),
			'recipient_name' => Yii::t('AccountTransaction', 'RecipientName'),
			'event_date' => Yii::t('AccountTransaction', 'EventDate'),
			'create_date' => Yii::t('AccountTransaction', 'CreateDate'),
			'modify_date' => Yii::t('AccountTransaction', 'ModifyDate'),
			'amount' => Yii::t('AccountTransaction', 'Amount'),
			'reference_number' => Yii::t('AccountTransaction', 'ReferenceNumber'),
			'message' => Yii::t('AccountTransaction', 'Message'),
			'exchange_rate' => Yii::t('AccountTransaction', 'ExchangeRate'),
			'currency' => Yii::t('AccountTransaction', 'Currency'),
			'bank_account_id' => Yii::t('AccountTransaction', 'BankAccount'),
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
		$criteria->compare('recipient_iban',$this->recipient_iban,true);
		$criteria->compare('recipient_bic',$this->recipient_bic,true);
		$criteria->compare('recipient_name',$this->recipient_name,true);
		$criteria->compare('event_date',$this->event_date,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('modify_date',$this->modify_date,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('reference_number',$this->reference_number,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('exchange_rate',$this->exchange_rate,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('bank_account_id',$this->bank_account_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AccountTransaction the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
