<h2>Markets Value <?php echo $market_value; ?></h2>  
<table class="table">
    <thead>
        <tr>
            <th>Timestamp</th>
            <th>Volume</th>
            <th>High</th>
            <th>Low</th>            
            <th>Bid</th>
            <th>Ask</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($market_summary as $summary): ?>        
            <?php $value = $summary->attributes; ?>
            <tr>
                <td><?php echo $value['timestamp']; ?></td>
                <td><?php echo $value['volume']; ?></td>
                <td><?php echo $value['high']; ?></td>
                <td><?php echo $value['low']; ?></td>            
                <td><?php echo $value['bid']; ?></td>
                <td><?php echo $value['ask']; ?></td>            
            </tr>
        <?php endforeach; ?>      
    </tbody>
</table>
