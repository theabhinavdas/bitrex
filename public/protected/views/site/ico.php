<div class="row">
	<div class="col">
		<div class="row">
			<!--<img src="../images/science-blockchain.png" class="logo" />-->
		</div>
		<div class="row">
			<div><img src="<?php echo $icoData->logo_url; ?>" class="icologourl" />
			<h2><?php echo $icoData->name; ?></h2>
			<br/>
			<p><?php echo $icoData->description; ?></p>
		</div>
	</div>
	<div class="col">

	</div>
	<div class="col">
		
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="row">
			<p>Management Social Score</p>
			<div class="progress">
			  <div class="progress-bar" role="progressbar" style="width:<?php echo $icoData->management_social_score; ?>%" aria-valuenow="<?php echo $icoData->management_social_score; ?>" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</div>
		<div class="row">
			<p>Advisors Social Score</p>
			<div class="progress">
			  <div class="progress-bar" role="progressbar" style="width: <?php echo $icoData->advisors_social_score; ?>%" aria-valuenow="<?php echo $icoData->advisors_social_score; ?>" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</div>
		<div class="row">
			<p>Social Chatter Score</p>
			<div class="progress">
			  <div class="progress-bar" role="progressbar" style="width: <?php echo $icoData->social_chatter_score; ?>%" aria-valuenow="<?php echo $icoData->social_chatter_score; ?>" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</div>
		<!--<div class="row">
			<p>Lieklyhood of high Post ICO Spike</p>
			<div class="progress">
			  <div class="progress-bar" role="progressbar" style="width: <?php echo $icoData->science_advisors_long_hold_scale; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</div>-->
		<div class="row">
			<p>Science Block Advisors - Long Hold Scale</p>
			<div class="progress">
			  <div class="progress-bar" role="progressbar" style="width: <?php echo $icoData->science_advisors_long_hold_scale; ?>%" aria-valuenow="<?php echo $icoData->science_advisors_long_hold_scale; ?>" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<!-- Empty space yay! -->
	</div>
	<div class="col-sm-3">
		<div class="text-center ttdTitle">
			<p>Total Token Distribution</p>
		</div>
		<canvas id="tokenDistribution" width="100" height="100" class="tokenDistChart"></canvas>
		<div class="text-left icoPrices">
			<p><u>Pre-ICO Price:</u> <?php echo $icoData->pre_ico_price; ?></p>
			<p><u>ICO Price:</u> <?php echo $icoData->ico_price; ?></p>
			<p><u>Current Market Price:</u> <?php echo $icoData->current_market_price; ?></p>
		</div>
	</div>
</div>


<script>
var ctx = document.getElementById("tokenDistribution");
// For a pie chart
let url = 'GetICOTokenData?id=<?php echo $_GET['id']; ?>';

var xmlHttp = new XMLHttpRequest();
xmlHttp.open( "GET", url, false ); // false for synchronous request
xmlHttp.send( null );
//console.log(xmlHttp.responseText);
var result = JSON.parse(xmlHttp.responseText);
//console.log(result[0]['ico_company_id']);
var mLabels = [];
var mData = [];
for (var key in result) {
	mLabels.push(result[key]['token_name']);
	mData.push(result[key]['value']);
}
//console.log(mLabels);
var myPieChart = new Chart(ctx,{
    type: 'pie',
    data: {
        labels: mLabels,
        datasets: [{
            data: mData,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    }
});
</script>