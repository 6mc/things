<?Php
$sd='';
if(!empty($b)){
	if(is_numeric($b)){
		$sd="WHERE ID='".$b."' LIMIT 1";
	}
	else {
		$sd=$b;
	}
}
if(empty($c)){
	$c='ID';
}
if(!empty($d)){
	z(6,$d);
}
$srg="SELECT COUNT(".$c.") FROM `".$con['vt']."`.`".$con['oe'].$con['t']."` ".$sd.";";
$x=$GLOBALS['pdo']->query($srg);
if(!empty($x))$snc=$x->fetchColumn();
?>