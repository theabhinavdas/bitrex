<?php

/**
 * This is the model class for table "BitcoinPrice".
 *
 * The followings are the available columns in table 'BitcoinPrice':
 * @property integer $id
 * @property string $currency
 * @property double $price
 * @property string $last_updated
 */
class Summary1hour extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return BitcoinPrice the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'summary1hr';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(            
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id,open,low,high,timestamp,market_name,volume,timestamp,bid,ask,open_buy_orders,open_sell_orders,last', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        
    }
    
    public function get_summary($market)
    {
        $criteria=new CDbCriteria;
        $criteria->compare('market_name',$market);
        $criteria->order='timestamp DESC';
        $data= Summary1hour::model()->findAll($criteria);
        return $data;
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
       
    }
    

}