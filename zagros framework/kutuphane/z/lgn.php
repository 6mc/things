<?Php
$_X=z(11,'lgn');
if(empty($b)){
	if($b===NULL){
		$snc=empty($_X)?false:true;
		if(!$snc&&z(14,'hatirla')&&z(12,'lgnbh')){$snc=z(13,'lgnbh');}
	}
	else{
		z(11,'lgn','');
		z(12,'lgnbh','');
		z(14,'hatirla',false);
	}
}
else if(is_array($b)){
	if(!empty($b[0])&&!empty($b[1])){
		$b[0]=str_replace(Array('\'','"'),'',strip_tags($b[0]));
		$b[1]=str_replace(Array('\'','"'),'',strip_tags($b[1]));
		$lgna=$ini['lgna'];
		z(6,$lgna['tablo']);
		for($i=0;$i<count($lgna['alan']);$i++){
			if(!empty($lgna['alan'][$i])){
				$pw=!empty($lgna['alan'][$i][2])?md5($b[1]):$b[1];
				$sd="WHERE ".$lgna['alan'][$i][0]."='".$b[0]."' AND ".$lgna['alan'][$i][1]."='".$pw."' LIMIT 1";
				$_X=z(1,$sd);
				if(!empty($_X)){$_X=$_X[0];
					$snc=1;
					for($j=3;$j<count($lgna['alan'][$i]);$j++){
						if(!empty($lgna['alan'][$i][$j])&&isset($b[$j])&&isset($_X[$lgna['alan'][$i][$j]]))
							if($_X[$lgna['alan'][$i][$j]]!=$b[$j]){$snc=$j+8;break;}
					}
					if($snc===1)break;
				}
				else if(!empty($lgna['hataliGiris'])){
					$hg=$lgna['hataliGiris'];
					$psd="WHERE ".$lgna['alan'][$i][0]."='".$b[0]."'";
					$_P=z(1,$psd,$hg[0].','.$hg[2]);
					if(empty($_P[0][$hg[2]])){
						if(!empty($_P)){
							$_P[0][$hg[0]]++;
							z(3,$psd,$hg[0],$_P[0][$hg[0]]);
							$snc=110+$_P[0][$hg[0]];
						}
						if($_P[0][$hg[0]]>=$hg[1]){
							z(3,$psd,$hg[2],$hg[3]);
							$snc=100;
						}
					}else $snc=101;
				}
			}
		}
		
		if($snc===1){
			$aln='';
			foreach($lgna['kaydet'] as $i=>$fe){
				if($i)$aln.=',';
				$aln.=$fe;
			}
			$_X=z(1,$sd,$aln);
			z(11,'lgn',$_X[0]);
			
			$oturumID=md5(microtime(true));
			z(3,$sd,'oturumID',$oturumID);
			// Beni hatırla
			if(!empty($lgna['hatirla'])){
				if(!empty($b[2])){
					z(12,'lgnbh',$oturumID.'|'.$_X[0]['kullanici'].'|'.md5(z(19,'REMOTE_ADDR')));
				}
				else{
					z(12,'lgnbh','');
				}
			}
			else{
				z(12,'lgnbh','');
			}
			// Giriş Sonrası Güncelleme
			if(!empty($lgna['guncelle'])){
				z(3,$sd,$lgna['guncelle']);
			}
		}
		else{
			z(11,'lgn','');
		}
	}
}
else if($b=='lgnbh'){
	z(14,'alan',Array('oturumID','kullanici'));
	$_X=z(12,'lgnbh');
	$_X=explode('|',$_X);
	$snc=z(13,Array($_X[0],$_X[1],true));
}
else{
	$snc=$_X[$b];
}
?>