
<div class="signin">
<div class="container">
<p>
    <?php echo $this->session->flashdata('verify_msg'); ?>
</p>

<h4>User Registration Form</h4>

<?php $attributes = array("name" => "registrationform");
echo form_open("user/register", $attributes);?>
<form action ="<? site_url('user/login');?>" name="loginform" method="post" accept-charset="utf-8">
																<input type="hidden" name="csrf_access_denied value="5eb8885e1a3c41a01275f405895fe5ad"/>
<table>
    <tr>
        <td><label for="firstname">First Name</label></td>
        <td><input class="form-control" name="firstname" placeholder="First name" type="text" value="<?php echo set_value('fname'); ?>" /> <span style="color:red"><?php echo form_error('firstname'); ?></span></td>
    </tr>
    <tr>
        <td><label for="surname">Last Name</label></td>
		<td><input class="form-control" name="surname" placeholder="Surname" type="text" value="<?php echo set_value('lname'); ?>" /> <span style="color:red"><?php echo form_error('lastname'); ?></span></td>
    </tr>
    <tr>
        <td><label for="email">Email ID</label></td>
		<td><input class="form-control" name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" /> <span style="color:red"><?php echo form_error('email'); ?></span></td>
    </tr>
    <tr>
        <td><label for="subject">Password</label></td>
		<td><input class="form-control" name="password" placeholder="Password" type="password" /> <span style="color:red"><?php echo form_error('password'); ?></span></td>
    </tr>

	<tr>
       <td></td>
        <td><button name="submit" type="submit">Signup</button></td>
    </tr>
</table>
<?php echo form_close(); ?>

<p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
<p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>
</div>
</div>