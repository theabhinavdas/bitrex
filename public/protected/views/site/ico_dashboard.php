<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    	<?php foreach ($icoDataRows as $icoRow): ?>
    	<tr>
    		<td><img src="<?php echo $icoRow->logo_url; ?>" class="logourl"/><?php echo $icoRow->name; ?></td>
    		<td><?php echo $icoRow->description; ?></td>
    		<td><a href="ico?id=<?php echo $icoRow->id; ?>">View</a></td>
    	</tr>
    	<?php endforeach; ?>
    </tbody>
</table>