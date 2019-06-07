<h2><?php echo $title; ?></h2>
 
<table border='1' cellpadding='4'>
    <tr>
        <td><strong>Title</strong></td>
        <td><strong>Content</strong></td>
        <td><strong>Action</strong></td>
    </tr>
<?php foreach ($news as $dashboard_item): ?>
        <tr>
			<td><?echo $dashboard_item['model']; ?></td>
			<td><?echo $dashboard_item['colour']; ?></td>
			<td><?echo $dashboard_item['date_added']; ?> </td>
			<td><?echo $dashboard_item['year_made']; ?></td>
            <td>
                <a href="<?php echo site_url('listing/'.$dashboard_item['slug']); ?>">View</a> 
                
                <?php if ($this->session->userdata('is_logged_in')) { ?>
                | 
                <a href="<?php echo site_url('listing/edit/'.$dashboard_item['id']); ?>">Edit</a> | 
                <a href="<?php echo site_url('listing/delete/'.$dashboard_item['id']); ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                <?php } // end if ?>

            </td>
        </tr>
<?php endforeach; ?>
</table>