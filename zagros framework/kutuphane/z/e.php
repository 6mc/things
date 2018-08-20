<?Php
if(is_array($b)){
	$aln='';
	
	if($ini['ekle_etiket_temizle']){
		$dgr=array();
		$dgrx=$b;
		foreach($dgrx as $x[0]=>$x[1]){
			if(!empty($aln)){
				$aln.=', ';
			}
			$aln.="`".$x[0]."` = :".$x[0];
			$dgr[$x[0]]=strip_tags($x[1],$ini['ekle_izinli_etiket']);
		}
	}
	else{
		$dgr=$b;
		foreach($dgr as $x[0]=>$x[1]){
			if(!empty($aln)){
				$aln.=', ';
			}
			$aln.="`".$x[0]."` = :".$x[0];
		}
	}
	
	if(!empty($c)){
		z(6,$c);
	}
}
else {
	if(!empty($b)&&!empty($c)){
		$aln="`".$b."` = :".$b;
		$dgr=array($b=>$c);
	}
	if(!empty($d)){
		z(6,$d);
	}
}
if(!empty($aln)&&!empty($dgr)){
	$srg="INSERT INTO  `".$con['vt']."`.`".$con['oe'].$con['t']."` SET ".$aln;
	$GLOBALS['pdo']->prepare($srg)->execute($dgr);
	$snc=$GLOBALS['pdo']->LastInsertId();
}
else{
	$snc = false;
}
?>