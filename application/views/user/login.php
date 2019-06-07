<link href="<?php echo base_url();?>css/signin.css"rel="stylesheet"/>
<p>
    <?php echo $this->session->flashdata('verify_msg'); ?>
</p>
<div class="login">
<div class="container">

<h4>User Login Form</h4>

<?php $attributes = array("name" => "loginform");
echo form_open("user/login", $attributes);?>

<form action ="<? site_url('user/login');?>" name="loginform" method="post" accept-charset="utf-8">
																<input type="hidden" name="csrf_access_denied value="5eb8885e1a3c41a01275f405895fe5ad"/>
<div class ="form-signin">


    <tr>
        <td><label for="email">Email</label></td><td><input class="form-control" name="email" placeholder="User-Email" type="text" /> <span style="color:red"><?php echo form_error('email'); ?></span></td>
    </tr>
    <tr>
        <td><label for="subject">Password</label></td><td><input class="form-control" name="password" placeholder="Password" type="password" /> <span style="color:red"><?php echo form_error('password'); ?></span></td>
    </tr>
    <tr>
        <td></td>
        <td><button name="submit" type="submit">Login</button></td>
    </tr>
</table>
</div>

<p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
<p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>
