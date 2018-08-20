<?php ob_start(); session_start(); ini_set('display_errors',1);

	// VT bağlantısı dahil tüm ayarları import et
	require(__DIR__.'/ayar.php');

	// Aksi durum yok ise head'i import et
	if(!isset($_Sayfa[$SA]['head'])||$_Sayfa[$SA]['head']){
		require(__DIR__.'/parca/head.php');
	}

	// Aksi durum yok ise header'i import et
	if(!isset($_Sayfa[$SA]['header'])||$_Sayfa[$SA]['header']){
		require(__DIR__.'/parca/header.php');
	}

	// GET'teki değerlere göre alt sayfayı import et
	if(!empty($S)&&!empty($A)){
		if(file_exists(__DIR__.'/sayfa/'.$S.'/'.$A.'.php'))
			require(__DIR__.'/sayfa/'.$S.'/'.$A.'.php');
		else
			require(__DIR__.'/sayfa/404.php');
	}
	// GET'teki değerlere göre sayfayı import et
	else if(!empty($S)){
		if(file_exists(__DIR__.'/sayfa/'.$S.'.php'))
			require(__DIR__.'/sayfa/'.$S.'.php');
		else
			require(__DIR__.'/sayfa/404.php');
		
	}
	// GET'te yok ise ana sayfayı import et
	else {
		require(__DIR__.'/sayfa/'.$ayar['anaSayfa'].'.php');
	}
	
	// Aksi durum yok ise footer'i import et
	if(!isset($_Sayfa[$SA]['footer'])||$_Sayfa[$SA]['footer']){
		require(__DIR__.'/parca/footer.php');
	}

	// Aksi durum yok ise foot'u import et
	if(!isset($_Sayfa[$SA]['foot'])||$_Sayfa[$SA]['foot']){
		require(__DIR__.'/parca/foot.php');
	}
ob_end_flush(); ?>