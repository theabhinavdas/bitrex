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
$allMarketChangeMessage = array("", "");
$halfMark = 126;
$allMarketChangeMessageIndex = 0;

if(count($buy_decoded['result'])>0)
{
    foreach($buy_decoded['result'] as $result)
    {
        // Check if $allMarketChangeMessage array has 126 elements
        // if so, change index to 1
        if ($halfMark == 0) {
            $allMarketChangeMessageIndex = 1;
        }
        $summary = new Summary();
        $summary->market_name=$result['MarketName'];
        $summary->volume=$result['Volume'];
        $summary->high=$result['High'];
        $summary->low=$result['Low'];
        $summary->bid=$result['Bid'];
        $summary->ask=$result['Ask'];
        $summary->timestamp=$result['TimeStamp'];
        $summary->open_buy_orders=$result['OpenBuyOrders'];
        $summary->open_sell_orders=$result['OpenSellOrders'];
        $summary->save();
        $latestId = $summary->getPrimaryKey();
        compareWithPrevious($latestId);

        $halfMark--;
    }
    curlSendSlack($allMarketChangeMessage[0]);
    curlSendSlack($allMarketChangeMessage[1]);

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
function curlSendSlack($postData)
{
    $url = "https://hooks.slack.com/services/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";

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
    global $allMarketChangeMessage, $allMarketChangeMessageIndex;

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

    // Quick calculations
    $deltaBid = $currentBid - $previousBid;
    $deltaAsk = $currentAsk - $previousAsk;
    $deltaBuyOrders = $currentBuyOrders - $previousBuyOrders;
    $deltaSellOrders = $currentSellOrders - $previousSellOrders;
    
    // The whole message based on all the conditions below
    $messageString = "";
    $anyMessage = false;
    // Check 10% difference in ask
    if (($currentAsk-$previousAsk) >= 10 || ($currentAsk-$previousAsk) <= -10) {
        $messageString = $messageString . ' | Ask Delta %: ' . $deltaAsk/100 . ' | Previous: ' . $previousAsk . ' | Current: ' . $currentAsk . "\n";
        $anyMessage = true;
    }
    // Check 10% difference in bid
    if (($currentBid-$previousBid) >= 10 || ($currentBid-$previousBid) <= -10) {
        $messageString = $messageString . ' | Bid Delta %: ' . $deltaBid/100 . ' | Previous: ' . $previousBid . ' | Current: ' . $currentBid . "\n";
        $anyMessage = true;
    }
    /**
    // Check for increase in buy orders 
    if (($currentBuyOrders > $previousBuyOrders)) {
        $messageString = $messageString . 'There is an increase in buy orders. Previous Buy Orders: ' . $previousBuyOrders . ' | Current Buy Orders: ' . $currentBuyOrders . "\n";   
        $anyMessage = true;
    }
    // Check for decrease in buy orders 
    if (($currentBuyOrders < $previousBuyOrders)) {
        $messageString = $messageString . 'There is a decrease in buy orders. Previous Buy Orders: ' . $previousBuyOrders . ' | Current Buy Orders: ' . $currentBuyOrders . "\n";   
        $anyMessage = true;
    }
    // Check for increase in sell orders 
    if (($currentSellOrders > $previousSellOrders)) {
        $messageString = $messageString . 'There is an increase in sell orders. Previous Sell Orders: ' . $previousSellOrders . ' | Current Sell Orders: ' . $currentSellOrders . "\n";      
        $anyMessage = true;
    }
    // Check for decrease in sell orders 
    if (($currentSellOrders < $previousSellOrders)) {
        $messageString = $messageString . 'There is a decrease in sell orders. Previous Sell Orders: ' . $previousSellOrders . ' | Current Sell Orders: ' . $currentSellOrders . "\n";      
        $anyMessage = true;
    }
    **/

    if ($anyMessage == true) {
        $messageString = '*Market:'. $marketName . "*\n" . $messageString . "\n" ;
    }

    $allMarketChangeMessage[$allMarketChangeMessageIndex] = $allMarketChangeMessage[$allMarketChangeMessageIndex] . $messageString;
    
}

?>
