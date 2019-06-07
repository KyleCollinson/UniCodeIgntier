<h2><?php echo $title; ?> </h2>
<?php echo validation_errors(); ?>
<?php echo form_open('dashboard/edit/'.$dashboard_item['id']); ?>
<table>
<tr>
<td><label for="brand">brand</brand></td>
<td><input type="input" name="brand" value ="<?php echo $dashboard_item['brand'] ?>"/></td>
</tr>

<tr>
<td><label for="model">model</label></td>
<td class ="areatext"> <textarea name="model"><?php echo $dashboard_item['model']?></textarea></td>
</tr>
<td><label for="colour">colour</label></td>
<td class ="areatext"><textarea class ="areatext" name="colour"><?php echo $dashboard_item['colour']?></textarea></td>
</tr>
<td><label for="date_added">Text</label></td>
<td class ="areatext"><textarea name="date_added"><?php echo $dashboard_item['date_added']?></textarea></td>
</tr>
<td><label for="year_made">year_made</label></td>
<td class ="areatext" ><textarea  name="year_made"><?php echo $dashboard_item['year_made']?></textarea></td>
</tr>

<td></td>
<td><input type ="submit" name="submit" value="edit"/></td>
</tr>
</table>
</form>
