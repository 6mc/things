<?Php
$sd='';
if(!empty($b)){
	if(is_numeric($b)){
		$sd="WHERE ID='".$b."' LIMIT 1";
	}
	else if($b=='son'){
		$sd="ORDER BY ID DESC LIMIT 1";
	}
	else{
		$sd=$b;
	}
}
$set='';
if(is_array($c)){
	$dgr=$c;
	foreach($c as $x[0]=>$x[1]){
		if(is_array($x[1]))$dgr[$x[0]]=json_encode($x[1]);
		if(!empty($set)){
			$set.=',';
		}
		$set.="`".$x[0]."` = :".$x[0];
	}
	if(!empty($d)){
		z(6,$d);
	}
}
else {
	$set="`".$c."` = :".$c;
	$dgr=array($c=>$d);
}
$srg="UPDATE `".$con['vt']."`.`".$con['oe'].$con['t']."` SET ";
if(!empty($set)){
	$srg.=$set." ".$sd;
	$snc=$GLOBALS['pdo']->prepare($srg)->execute($dgr);
}
else{
	$snc = false;
}
?>