<?php
require_once('api.php');
$authURL = getAuthURL();
?>
<div style="text-align:center">
<img src="uelp1.png"><br/>
You need to login to uber before you can use this app
<br />
<a href="<?php echo $authURL;?>">Login</a>
</div>