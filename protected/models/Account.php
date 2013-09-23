<?php

/**
 * This is the model class for table "bank_account".
 *
 * The followings are the available columns in table 'bank_account':
 * @property integer $id
 * @property string $iban
 * @property string $name
 * @property string $status
 * @property string $create_date
 * @property string $modify_date
 * @property integer $bank_user_id
 * @property integer $bank_bic_id
 * @property integer $bank_interest_id
 * @property integer $bank_currency_id
 * @property integer $bank_account_type_id
 *
 * The followings are the available model relations:
 * @property AccountType $bankAccountType
 * @property Bic $bankBic
 * @property Currency $bankCurrency
 * @property Interest $bankInterest
 * @property User $bankUser
 * @property AccountTransaction[] $accountTransactions
 */
class Account extends CActiveRecord
{
    public $start_date;
    public $end_date;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bank_account';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bank_user_id, bank_bic_id, bank_interest_id, bank_currency_id, bank_account_type_id, status', 'required'),
            array('iban', 'required', 'except'=>'selectAccount'),
			array('bank_user_id, bank_bic_id, bank_interest_id, bank_currency_id, bank_account_type_id', 'numerical', 'integerOnly'=>true),
            array('iban', 'unique', 'except'=>'selectAccount'),
			array('iban', 'length', 'max'=>32),
			array('name', 'length', 'max'=>64),
			array('status', 'length', 'max'=>8),
            array('start_date, end_date', 'date', 'format'=>'dd.mm.yyyy'),
			array('create_date, modify_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, iban, name, status, create_date, modify_date, bank_user_id, bank_bic_id, bank_interest_id, bank_currency_id, bank_account_type_id', 'safe', 'on'=>'search'),
            array('create_date','default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false,'on'=>'insert'),
            array('modify_date','default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false,'on'=>'update'),
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
			'bankAccountType' => array(self::BELONGS_TO, 'AccountType', 'bank_account_type_id'),
			'bankBic' => array(self::BELONGS_TO, 'Bic', 'bank_bic_id'),
			'bankCurrency' => array(self::BELONGS_TO, 'Currency', 'bank_currency_id'),
			'bankInterest' => array(self::BELONGS_TO, 'Interest', 'bank_interest_id'),
			'bankUser' => array(self::BELONGS_TO, 'User', 'bank_user_id'),
			'accountTransactionDebit' => array(self::HAS_MANY, 'AccountTransaction', 'payer_iban'),
			'accountTransactionCredit' => array(self::HAS_MANY, 'AccountTransaction', 'recipient_iban'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'iban' => 'Iban',
			'name' => 'Name',
			'status' => 'Status',
			'create_date' => 'Create Date',
			'modify_date' => 'Modify Date',
			'bank_user_id' => 'Bank User',
			'bank_bic_id' => 'Bank Bic',
			'bank_interest_id' => 'Bank Interest',
			'bank_currency_id' => 'Bank Currency',
			'bank_account_type_id' => 'Bank Account Type',
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
		$criteria->compare('iban',$this->iban,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('modify_date',$this->modify_date,true);
		$criteria->compare('bank_user_id',$this->bank_user_id);
		$criteria->compare('bank_bic_id',$this->bank_bic_id);
		$criteria->compare('bank_interest_id',$this->bank_interest_id);
		$criteria->compare('bank_currency_id',$this->bank_currency_id);
		$criteria->compare('bank_account_type_id',$this->bank_account_type_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Account the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
