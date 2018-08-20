<?Php
if(!empty($b)){
	if(!empty($_FILES[$b])){
		if(is_string($_FILES[$b]['type'])){
			if(!empty($c)){
				$snc=$_FILES[$b][$c];
			}
			else{
				$snc=$_FILES[$b];
			}
		}
		else{

			$_F=array();
			$j=0;
			foreach ($_FILES[$b] as $t=>$f) {
				while(is_array($f)){
					$fx=$f;
					$f=array_shift($f);
					if(!is_array($f)){
						foreach ($fx as $fei=>$fed) {
							$_F[$fei][$t]=$fed;
						}
					}
					
				}
			}
			if(!empty($_F))$snc=$_F;
			
			/*$_F=!empty($c)&&!empty($_FILES[$b][$c])?$_FILES[$b][$c]:$_FILES[$b];
			$_X=Array();
			foreach($_F['type'] as $i=>$fe){
				if(!empty($c))
				$_X[$i]=Array(
					'name'=>$_F['name'][$i],
					'type'=>$fe,
					'tmp_name'=>$_F['tmp_name'][$i],
					'error'=>$_F['error'][$i],
					'size'=>$_F['size'][$i]
				);
			}
			$snc=$_X;*/
		}
	}
}
else{
	$snc=$_FILES;
}
?>