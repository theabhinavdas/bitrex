<?php

define('CORNJOB', TRUE);
include("index.php");


$link="https://bittrex.com/api/v1.1/public/getmarketsummaries";
$buy_result = @file_get_contents($link);
$buy_decoded = json_decode($buy_result, true);

/**
* $allMarketChangeMessage contains full message string because of
* Slack's rate cutting measures for bots (1 message per second)
* also had to break up the whole string into two parts as it kept breaking
* mid-way.
**/
$allMarketChangeMessage = "";

if(count($buy_decoded['result'])>0)
{
    foreach($buy_decoded['result'] as $result)
    {
        // Check if $allMarketChangeMessage array has 126 elements
        // if so, change index to 1
        $summary = new Summary();
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
        $latestId = $summary->getPrimaryKey();
        compareWithPrevious($latestId);
    }
    curlSendSlack("https://hooks.slack.com/services/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",$allMarketChangeMessage);
    curlSendSlack("https://hooks.slack.com/services/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",$allMarketChangeMessage);
    curlSendSlack("https://hooks.slack.com/services/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",$allMarketChangeMessage);

}

/**
* Code to check for the rules give:
* (1) 10% change/spread in bid/ask
* (2) Switch between buy orders and sell orders
*
* Message Format:
* Name of market - Change - What changed by how much - Changed values 
**/

/**
* Code to send message to the Slack channel - Bitrex-Tests
*
**/
function curlSendSlack($url,$postData)
{

    $postData = '{"text":' . '"' . $postData . '"' . "}";

    $ch = curl_init();  

    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
    curl_setopt($ch, CURLOPT_POST, count($postData));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    

    $output=curl_exec($ch);

    curl_close($ch);
}

/**
* Code that performs the rule-base comparison to trigger Slack notifs/messages
*/ 
function compareWithPrevious($mLatestId) {
    global $allMarketChangeMessage;

    // Get the current bid & ask
    $summary = Summary::model()->findByPk($mLatestId);
    $currentBid = $summary['bid'];
    $currentAsk = $summary['ask'];
    $currentBuyOrders = $summary['open_buy_orders'];
    $currentSellOrders = $summary['open_sell_orders'];
    $marketName = $summary['market_name'];

    // Get last two rows based on the market name

    $records = Summary::model()->findAll(
         array('select'=>'id, bid, ask, open_buy_orders, open_sell_orders', 'condition'=>'market_name=:market_name' , 'order'=>'id DESC', 'limit'=>2, 'params'=>array(':market_name'=>$marketName)));
    $previousRecord = $records[1];

    // Get the previous bid & ask
    $previousBid = $previousRecord['bid'];
    $previousAsk = $previousRecord['ask'];
    $previousBuyOrders = $previousRecord['open_buy_orders'];
    $previousSellOrders = $previousRecord['open_sell_orders'];

    // Calculating spread, rounding it off to 2 decimals
    $spread = round(((($currentBid - $currentAsk)/$currentBid)*100), 2);
    
    // The whole message based on all the conditions below
    $messageString = "";
    $anyMessage = false;
    // Check for 10% change
    if (abs($spread) >= 10) {
        $messageString = $messageString . 'Change in spread: ' . $spread . '% | Current Bid: ' . $currentBid . ' | Current Ask: ' . $currentAsk . "\n";
        $anyMessage = true;
    }

    if ($previousBuyOrders > $previousSellOrders && $currentBuyOrders < $currentSellOrders) {
        $messageString = $messageString . 'Current Trend: Buy Orders (' . $currentBuyOrders . ') *More* Than Sell Orders ('. $currentSellOrders .')';
        $anyMessage = true;
    } else if ($previousBuyOrders < $previousSellOrders && $currentBuyOrders > $currentSellOrders) {
        $messageString = $messageString . 'Current Trend: Buy Orders (' . $currentBuyOrders . ') *Less* Than Sell Orders ('. $currentSellOrders .')';
        $anyMessage = true;
    }

    if ($anyMessage == true) {
        $messageString = '*Market:'. $marketName . "*\n" . $messageString . "\n" ;
    }

    $allMarketChangeMessage = $allMarketChangeMessage . $messageString;
    
}

?>
