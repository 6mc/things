<?Php
if(is_array($b)){
	if(!empty($b[0])&&!empty($b[1])&&!empty($b[3])){
		$GLOBALS['pdo'] = new PDO('mysql:host='.$b[0].';dbname='.$b[3].';charset=utf8;', $b[1], $b[2]);
		//$GLOBALS['pdo']=@new mysqli($b[0],$b[1],$b[2]);
		//if($GLOBALS['pdo']->connect_errno==2002){
		if(empty($GLOBALS['pdo'])){
			die('<html><head><meta charset="utf-8"></head><body><strong>Veritabanı sunucusuna bağlanılamadı!</strong></body></html>');
		}
		/*else if($GLOBALS['pdo']->connect_errno==1045){
			die('<html><head><meta charset="utf-8"></head><body><strong>MySQL kullanıcı adı veya parola hatalı!</strong></body></html>');
		}
		else{
			$GLOBALS['pdo']->set_charset("utf8");
		}*/
	}
	else die('<html><head><meta charset="utf-8"></head><body><strong>Veritabanı bağlantı bilgileri eksik.</strong><br />Örnek: z(\'con\',Array(\'localhost\',\'root\',\'root\',\'veritabanim\',\'onek_\'))</body></html>');
	if(!empty($b[3])){
		$con['vt']=$b[3];
		//$GLOBALS['pdo']->select_db($con['vt']);
	}
	$con['oe']=!empty($b[4])?$b[4]:'';
	if(!empty($b[5])){
		z(6,$b[5]);
	}
}
else if(!empty($b)&&isset($c)){
	$con[$b]=$c;
}
else if(!empty($b)){
	$snc=$con[$b];
}
if(empty($snc)){
	$snc=$con;
}
?>