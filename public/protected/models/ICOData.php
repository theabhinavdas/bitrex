<?php

/**
 * This is the model class for table "ico_data".
 *
 * The followings are the available columns in table 'ico_data':
 * @property string $id
 * @property string $name
 * @property string $description
 * @property double $management_social_score
 * @property double $advisors_social_score
 * @property double $social_chatter_score
 * @property double $science_advisors_long_hold_scale
 * @property double $pre_ico_price
 * @property double $ico_price
 * @property double $current_market_price
 * @property string $advisor_linkedin
 *
 * The followings are the available model relations:
 * @property IcoSocial[] $icoSocials
 */
class ICOData extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ICOData the static model class
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
		return 'ico_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description, management_social_score, advisors_social_score, social_chatter_score, science_advisors_long_hold_scale, pre_ico_price, ico_price, current_market_price', 'required'),
			array('management_social_score, advisors_social_score, social_chatter_score, science_advisors_long_hold_scale, pre_ico_price, ico_price, current_market_price', 'numerical'),
			array('name, advisor_linkedin', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, management_social_score, advisors_social_score, social_chatter_score, science_advisors_long_hold_scale, pre_ico_price, ico_price, current_market_price, advisor_linkedin', 'safe', 'on'=>'search'),
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
			'icoSocials' => array(self::HAS_MANY, 'IcoSocial', 'ico_company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'management_social_score' => 'Management Social Score',
			'advisors_social_score' => 'Advisors Social Score',
			'social_chatter_score' => 'Social Chatter Score',
			'science_advisors_long_hold_scale' => 'Science Advisors Long Hold Scale',
			'pre_ico_price' => 'Pre Ico Price',
			'ico_price' => 'Ico Price',
			'current_market_price' => 'Current Market Price',
			'advisor_linkedin' => 'Advisor Linkedin',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('management_social_score',$this->management_social_score);
		$criteria->compare('advisors_social_score',$this->advisors_social_score);
		$criteria->compare('social_chatter_score',$this->social_chatter_score);
		$criteria->compare('science_advisors_long_hold_scale',$this->science_advisors_long_hold_scale);
		$criteria->compare('pre_ico_price',$this->pre_ico_price);
		$criteria->compare('ico_price',$this->ico_price);
		$criteria->compare('current_market_price',$this->current_market_price);
		$criteria->compare('advisor_linkedin',$this->advisor_linkedin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}