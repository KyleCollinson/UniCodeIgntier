<h2><?php echo $title; ?></h2>
 <script>
 function showResult(str){
	 if (str.length==0)
		 document.getElementById("livesearch").innerHTML="";
	 document.getElementById("livesearch").style.border="0px";
	 return;
 }
 if (window.XMLHttpRequest){
	 //Sends XML request to be read in: Safari, Firefox, Chrome
	 xmlhttp=new XMLHttpRequest();
 }else{
	 //Legacy XML requests
	 cmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 }
 
 //makes the livesearch "live" IE responsive
 xmlhttp.onreadystatechange=fucntion(){
	 if (this.readyState==4 && this.statue==200){
		 document.getElementById("livesearch")innerHTML=this.responseText;
		 document.getElementById("livesearch").style.border="1px solid #A5ACB2";
		 }
 }
 //sends the GET request, using the livesearch as the parameter
 xmlhttp.open("GET","livesearch.php?q="+str,true);
 xmlhttp.send();
 </script>
 
 <form>
 <input type ="text" size="30" onkeyup="showResult(this.value)">
 <div id="livesearch"></div>
 </form>
<table border='1' cellpadding='4'>
    <tr>
        <td><strong>firstname</strong></td>
        <td><strong>surname</strong></td>
        <td><strong>email</strong></td>
		<td><strong>password</strong></td>
		<td><strong>usertype</strong></td>
    </tr>
<?php foreach ($admin as $admin_item): ?>
<?php $message ?>
        <tr style ="width: 100%">
            <td><?php echo $admin_item['firstname']; ?></td>
            <td><?php echo $admin_item['surname']; ?></td>
			<td><?php echo $admin_item['email']; ?></td>
            <td><?php echo ellipsize($admin_item['password'], 32, 1); ?></td>
			<td><?php if ($admin_item['usertype'] =="0"){
				echo("General User");
			}else if($admin_item['usertype']=="1"){
				echo("Admin User");
			}else{
				echo("Usertype Unknown");
			
				echo("Please Demote User");
			}
			?></td>

            <td>
                <a href="<?php echo site_url('admin/edit/'.$admin_item['id']); ?>">Edit</a> | 
                <a href="<?php echo site_url('admin/delete/'.$admin_item['id']); ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
            </td>
		
			<td>
			<a href="<?php echo site_url('admin/promote/'.$admin_item['id']);?>">Promote to Admin</a>
			
			
			<a href="<?php echo site_url('admin/demote/'.$admin_item['id']);?>">Demote to General</a>
			
			</td>
        </tr>
<?php endforeach; ?>
</table>