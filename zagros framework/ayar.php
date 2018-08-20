<?Php 
	$surum='zt001';
	require(__DIR__.'/zcon.php');

	
	$ayar=array(
		
		// Genel Ayarlar
		'siteAd'=>'ZWork Benim Sitem',
		'siteBaslik'=>'Benim Sitem',

		'meta'=>array(
			'keywords'=>'Benim sitem, Türk sitesi',
			'description'=>'Biz bunu öylesine yaptık işte :)',
			'author'=>'NetADIM Bilişim'
		),

		'sitemap_baslik'=>'Biz Kimiz?',
		'sitemap_aciklama'=>'..',

		// İletişim Bilgileri
		'iletisimTel' => '',
		'iletisimGsm' => '',
		'iletisimAdres' => '',
		'iletisimEposta' => '',
		
		// Site Ayarları
		'anaSayfa'=>'anasayfa',
		'pb'=>'TRY',
		'pbT'=>array('TRY'=>'₺','USD'=>'$','EUR'=>'€')

	);


	// Menü Tiplerini Tanımla (Sitede Otomatik Listelenir)
	$_Sayfa=array(
		'anasayfa'=>array( 
			'S' => 'anasayfa', 
			'A' => '',
			'ad' => 'ANASAYFA'
		),
	
		'giris'=>array( 
			'S' => 'giris', 
			'A' => '',
			'ad' => 'GİRİŞ YAP',
			'menudeGoster' => true,
			'head' => true,
			'header' => true,
			'footer' => true,
			'foot' => true,
			'giris' => false
		),
		'cikis'=>array( 
			'S' => 'cikis', 
			'A' => '',
			'ad' => 'ÇIKIŞ',
			'menudeGoster' => true,
			'head' => true,
			'header' => true,
			'footer' => true,
			'foot' => true,
			'giris' => true
		),
		'sitemap'=>array( 
			'S' => 'sitemap', 
			'A' => '',
			'ad' => 'SITEMAP',
			'menudeGoster' => false
		)
	);

	$LOGIN=z('lgn');
	$ADMIN=z('lgn','admin');

	// GET'te Seçili SAYFA ve ALTSAYFAYI oku
	$S=z('get','s');
	$A=z('get','a');
	// Seçili SAYFA ve ALTSAYFAYI MenuTip key'i olarak kullan
	$SA=(!empty($S)?$S:$ayar['anaSayfa']).(!empty($A)?$A:'');
	$SAYFA=!empty($_Sayfa[$SA]['ad'])?$_Sayfa[$SA]['ad']:'';

								
?>