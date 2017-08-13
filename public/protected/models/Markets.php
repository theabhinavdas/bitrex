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
class Markets extends CActiveRecord {

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
        return 'markets';
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
            array('id, market_name', 'safe'),
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
    
    public function fetch_last_values()
    {
        $sql="select market_name,volume from summary where id in (select max(id) from summary group by market_name)";
        $data = Yii::app()->db->createCommand($sql)->queryAll();
        $mapped_result=array();
        foreach($data as $summary)
        {
            $mapped_result[$summary['market_name']]=$summary['volume'];
        }
        return $mapped_result;
    }
    
    public function fetch_all_markets()
    {
       $sql="select market_name from markets"; 
       $data = Yii::app()->db->createCommand($sql)->queryAll();
       return $data;
    }
    
    public function fetch_summary($market)
    {
        $sql="select volume,market_name,high,low,timestamp,bid,ask,open_buy_orders,open_sell_orders,last from summary where market_name='$market'";
        $data = Yii::app()->db->createCommand($sql)->queryAll();
        return $data;
    }
    
    public function fetch_summary_5min($market)
    {
        $sql="select volume,market_name,high,low,timestamp,bid,ask,open_buy_orders,open_sell_orders,last from summary5min where market_name='$market'";
        $data = Yii::app()->db->createCommand($sql)->queryAll();
        return $data;
    }
    public function fetch_summary_30min($market)
    {
        $sql="select volume,market_name,high,low,timestamp,bid,ask,open_buy_orders,open_sell_orders,last from summary30min where market_name='$market'";
        $data = Yii::app()->db->createCommand($sql)->queryAll();
        return $data;
    }
    public function fetch_summary_1hr($market)
    {
        $sql="select volume,market_name,high,low,timestamp,bid,ask,open_buy_orders,open_sell_orders,last from summary1hr where market_name='$market'";
        $data = Yii::app()->db->createCommand($sql)->queryAll();
        return $data;
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
       
    }
    

}