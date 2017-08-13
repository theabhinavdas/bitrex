<?php

define('CORNJOB', TRUE);
include("index.php");


$link="https://bittrex.com/api/v1.1/public/getmarketsummaries";
$buy_result = @file_get_contents($link);
$buy_decoded = json_decode($buy_result, true);

if(count($buy_decoded['result'])>0)
{
    foreach($buy_decoded['result'] as $result)
    {       
        $summary = new Summary5min();
        $summary->market_name=$result['MarketName'];
        $summary->volume=$result['Volume'];
        $summary->high=$result['High'];
        $summary->low=$result['Low'];
        $summary->bid=$result['Bid'];
        $summary->ask=$result['Ask'];
        $summary->timestamp=$result['TimeStamp'];
        $summary->last=$result['Last'];
        $summary->open_buy_orders=$result['OpenBuyOrders'];
        $summary->open_sell_orders=$result['OpenSellOrders'];
        $summary->save();        
    }   
}

?>
