<?php

/**
 * This is the model class for table "ico_social".
 *
 * The followings are the available columns in table 'ico_social':
 * @property string $id
 * @property string $ico_company_id
 * @property string $telegram_channel
 * @property string $slack_channel
 * @property string $linkedin
 *
 * The followings are the available model relations:
 * @property IcoData $icoCompany
 */
class ICOSocial extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ICOSocial the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ico_social';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ico_company_id', 'required'),
			array('ico_company_id', 'length', 'max'=>10),
			array('telegram_channel, slack_channel, linkedin', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ico_company_id, telegram_channel, slack_channel, linkedin', 'safe', 'on'=>'search'),
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
			'icoCompany' => array(self::BELONGS_TO, 'IcoData', 'ico_company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'ico_company_id' => 'Ico Company',
			'telegram_channel' => 'Telegram Channel',
			'slack_channel' => 'Slack Channel',
			'linkedin' => 'Linkedin',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('ico_company_id',$this->ico_company_id,true);
		$criteria->compare('telegram_channel',$this->telegram_channel,true);
		$criteria->compare('slack_channel',$this->slack_channel,true);
		$criteria->compare('linkedin',$this->linkedin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}