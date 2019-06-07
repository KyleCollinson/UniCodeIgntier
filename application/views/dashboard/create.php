<link href="<?php echo base_url();?>css/signin.css"rel="stylesheet"/>
<?php echo validation_errors();?>
<?php echo form_open('dashboard/create');?>

<form action ="<? site_url('dashboard/create');?>" name="ListCreate" method="post" accept-charset="utf-8">
																<input type="hidden" name="csrf_access_denied value="6d2b9760da22fc8accd20dc4f2c689a1"/>
<div class="container">
	<table>
	<div class="login">
	<div class ="form-signin">
		<tr>
			<td><label for="brand">brand</label></td>
		</tr>
		
		<td><textarea name="brand"></textarea></td>

		<tr>
			<td><label for="model">Model</label></td>
		</tr>
		<td><textarea name="model"></textarea></td>

		<tr>
			<td><label for="colour">colour</label></td>
		</tr>
				<td><textarea name="colour"></textarea></td>

		<tr>
			<td><label for="date_added">date_added</label></td>
		</tr>
				<td><textarea name="date_added"></textarea></td>

		<tr>
			<td><label for="year_made">year_made</label></td>
		</tr>
				<td><textarea name="year_made"></textarea></td>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="create" /></td>
		</tr>

	</table>
	</div>
	</div>
</form>
	</div>