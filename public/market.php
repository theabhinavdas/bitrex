<?php

define('CORNJOB', TRUE);
include("index.php");

$link="https://bittrex.com/api/v1.1/public/getmarkets";
$buy_result = @file_get_contents($link);
$buy_decoded = json_decode($buy_result, true);
if(count($buy_decoded['result'])>0)
{
    foreach($buy_decoded['result'] as $result)
    {
        $market_value=$result['MarketName'];
        $market=  Markets::model()->findByAttributes(array('market_name'=>$market_value));
        if(is_null($market))
        {
            $market = new Markets();
            $market->market_name=$market_value;
            $market->save();
        }
    }
}
?>