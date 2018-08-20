<title><?php echo (!empty($SAYFA)?$SAYFA.' | ':'').$ayar['siteBaslik'] ?></title>	

	<?php if(!empty($ayar['meta']))foreach ($ayar['meta'] as $key => $value) {?>
	<meta name="<?php echo $key ?>" content="<?php echo $value ?>" />
	<?php } ?>