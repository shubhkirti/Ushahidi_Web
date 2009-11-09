<?php 
    require_once('install.php');
    global $install;
    
    //check if ushahidi is installed?.
    if( $install->is_ushahidi_installed())
    {
        header('Location:../');
    }
   
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Ushahidi Web Installer</title>
<link href="../media/css/admin/login.css" 
rel="stylesheet" type="text/css" />
<style type="text/css">
h3 { margin-top: 1em }
#install { display: block; margin-top: 1em }
</style>
</head>

<body>
<div id="ushahidi_login_container">
    <div id="ushahidi_login_logo"><img src="../media/img/admin/logo_login.gif" width="400" 
    height="80" /></div>
    <div id="ushahidi_login">
    
      <?php 
      	$ret = $install->_check_writable_dir();
		
		if ($form->num_errors > 0 ) {
			print ( $form->error('root_dir') =="") ?'':"&#8226;&nbsp;" 
				.$form->error('root_dir') . "<br /><br />";
			print ( $form->error('config_dir') =="") ?'':"&#8226;&nbsp;" 
				.$form->error('config_dir') . "<br /><br />";
			?>

			<p>
			After fixing the above problem, click <a href="">here</a> to install ushahidi.
			</p>
		<?php }?>
		
		<?php
	    if($ret == 0 ){ 
	    	if ($form->num_errors > 0 ) { ?>
	    		<table width="100%" border="0" cellspacing="3" c<table width="100%" border="0" cellspacing="3" cellpadding="4" 
      				background="" id="ushahidi_loginbox">ellpadding="4" 
      				background="" id="ushahidi_loginbox">
        		<form method="POST" name="frm_install" action="process.php" 
        			style="line-height: 100%; margin-top: 0; margin-bottom: 0">     
            		<tr>
              			<td align="left" class="login_error">
		    			<?php
		        			print ( $form->error('username') =="") ?'':"&#8226;&nbsp;" 
			    				.$form->error('username') . "<br />";
							print ( $form->error('host') =="") ?'':"&#8226;&nbsp;" 
			    				.$form->error('host') . "<br />";
							print ( $form->error('db_name') =="") ?'':"&#8226;&nbsp;" 
			    				.$form->error('db_name') . "<br />";
							print ( $form->error('permission') =="") ?'':"&#8226;&nbsp;" 
			    				.$form->error('permission') . "<br />";
							print ( $form->error('load_db_tpl') =="") ?'':"&#8226;&nbsp;" 
			    				.$form->error('load_db_tpl') . "<br />";
							print ( $form->error('connection') =="") ?'':"&#8226;&nbsp;" 
			    				.$form->error('connection') . "<br />";
		    			?>
						</td>
            		</tr>
				<?php } ?>
            		<tr>
              			<td><h3>Base Path:</h3>
              				<input type="text" name="base_path" class="login_text" 
                				value="<?php print $form->value('base_path'); ?>"/>
              					<br />Just interested in the name of the sub folder.<br /> 
              					If Ushahidi is in the root folder, leave this field empty. No slahes
              					Eg. ushahidi
              			</td>
            		</tr>
            		<tr>
              			<td><h3>Username:</h3>
              				<input type="text" name="username" class="login_text" 
                				value="<?php print $form->value('username'); ?>"/>
              				<br />Your database username.
              			</td>
            		</tr>
            		<tr>
              			<td><h3>Password:</h3>
              				<input type="password" name="password" class="login_text" />
              				<br />Your database password.
              			</td>
            		</tr>
            		<tr>
              			<td>
                			<h3>Database Host:</h3>
              				<input type="text" name="host" class="login_text" 
                			value="<?php print $form->value('host') == '' ? 'localhost':$form->value('host'); ?>" />
              				<br />Your database host. It could also be mysql.somedomain.com
              			</td>  
            		</tr>
            		<tr>
              			<td>
                			<h3>Database Name:</h3>
              				<input type="text" name="db_name" class="login_text" 
              				value="<?php print $form->value('db_name'); ?>" />
                			<br />The name of the database you want to run Ushahidi in.
              			</td>
            		</tr>
            		<tr>
              			<td>
                			<h3>Database Type:</strong></h3>
                			<select name="select_db_type">
                    			<option value="mysql">mysql</option>
                    			<option value="postgresql">postgresql</option>
                			</select>
                			<br />Select the type of database you want to use.
              			</td>
            		</tr>
            		<tr>
              			<td>
                			<h3>Table Prefix:</strong></h3>
                  			<input type="text" name="table_prefix" class="login_text" 
                  			value="<?php print $form->value('table_prefix'); ?>" />
                			<br />The prefix to be used by the tables. Eg. ush_<br />
                			Leave it blank for nothing. 
                			<input type="hidden" name="connection" />
                			<input type="hidden" name="permission" />
                			<input type="hidden" name="load_db_tpl" />
              			</td>
            		</tr>            
            		<tr>
              			<td><input type="submit" id="install" name="install" 
              				value="Install" class="login_btn" />
              			</td>
            		</tr>
            	</table>
        	</form>
        	<?php } ?>
  </div>
</div>
</body>
</html>
