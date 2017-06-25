  <h2>Markets</h2>  
  <table class="table">
    <thead>
      <tr>
        <th>Market</th>
        <th>Volume (last 24 hrs)</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($market_values as $key=>$value): ?>        
            <tr>
                <td><a href='/summary?market=<?php echo $key;?>'><?php echo $key;?></a></td>
                <td><?php echo $value;?></td>
            </tr>
        <?php endforeach; ?>      
    </tbody>
  </table>
