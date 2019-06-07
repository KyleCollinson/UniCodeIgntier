<h2><?php echo $title; ?> </h2>
<?php echo validation_errors(); ?>
<?php echo form_open('admin/edit/'.$admin_item['id']); ?>
<table>
<tr>
<td><label for="usertype">usertype</brand></td>
<td><input type="input" name="brand" value ="<?php echo $admin_item['usertype'] ?>"/></td>
</tr>

<tr>
<td><label for="firstname">firstname</label></td>
<td><textarea name="model"><?php echo $admin_item['firstname']?></textarea></td>
</tr>
<td><label for="surname">surname</label></td>
<td><textarea name="colour"><?php echo $admin_item['surname']?></textarea></td>
</tr>
<td><label for="email">email</label></td>
<td><textarea name="date_added"><?php echo $admin_item['email']?></textarea></td>
</tr>
<td><label for="password">password</label></td>
<td><textarea name="password"><?php echo $admin_item['password']?></textarea></td>
</tr>

<td></td>
<td><input type ="submit" name="submit" value="edit"/></td>
</tr>
</table>
</form>
