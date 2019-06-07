<h2><?php echo $title; ?></h2>
 
<table border='1' cellpadding='4'>
    <tr>
        <td><strong>brand</strong></td>
        <td><strong>model</strong></td>
        <td><strong>colour</strong></td>
		<td><strong>date_added</strong></td>
		<td><strong>year_made</strong></td>
    </tr>
<?php foreach ($dashboard as $dashboard_item): ?>
<?php $message ?>
        <tr>
            <td><?php echo $dashboard_item['brand']; ?></td>
            <td><?php echo $dashboard_item['model']; ?></td>
			<td><?php echo $dashboard_item['colour']; ?></td>
            <td><?php echo $dashboard_item['date_added']; ?></td>
			<td><?php echo $dashboard_item['year_made']; ?></td>
			
            <td>
                <a href="<?php echo site_url('dashboard/'.$dashboard_item['slug']); ?>">View</a> 
                
                <?php if ($this->session->userdata('is_logged_in')) { ?>
                | 
                <a href="<?php echo site_url('dashboard/edit/'.$dashboard_item['id']); ?>">Edit</a> | 
                <a href="<?php echo site_url('dashboard/delete/'.$dashboard_item['id']); ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                <?php }else {// end if ?> 
				<td>please Log In to edit or delete listings</td>
				<?php }?>
                
            </td>
        </tr>
<?php endforeach; ?>
</table>