<html>
	<head>
		<title>what</title>
		
	</head>
	
	<body>
	
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo site_url('pages'); ?>">Home</a>
    </div>
	
	 
    <ul class="nav navbar-nav">
      <li class="active"><a href="<?php echo site_url('dashboard/'); ?>">Home</a></li>
      <li><a href="<?php echo site_url('dashboard/create'); ?>">Create a Listing</a></li>
      <li><a href="<?php echo site_url('user/login'); ?>">Login</a></li>
	  <li><a href="<?php echo site_url('user/register'); ?>">register</a></li>
    </ul>
  </div>
</nav>

<link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet"/>
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet"/>



<p>
<?php if ($this->session->userdata('is_logged_in')==true)
			{
				echo '<b> Logged in as: </b>'. $this->session->userdata('email');
				echo '<b> Logged in as: </b>'. $this->session->userdata('usertype');
				echo '| ' . "<a href =" . site_url('user/logout') . ">logout</a>";
				?>
				<?php if($this->session->userdata('usertype')== true){?>
					<li><a href "<?php echo site_url('admin'); ?>">admin</a></li>
			<?php }} ?>



						
</p>
<div class="container-fluid">			
