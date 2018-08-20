<?php 
	$bunu=Array('ğ','ü','ş','ç','ö','ı','Ğ','Ü','Ş','Ç','Ö','İ',' ','%','+','=',':','!','(',')');
	$buna=Array('g','u','s','c','o','i','G','U','S','C','O','I','_','_','_','_','_','_','_','_');
	$dui=str_replace($bunu,$buna,$c['name']);
	if(file_exists($b.'/'.$dui)){
		$exp=explode('.',$dui);
		$uznt=$exp[count($exp)-1];
		unset($exp[count($exp)-1]);
		$j=0;do{$j++;
			$dui='';
			foreach($exp as $xp){
				if(!empty($dui))$dui.='.';
				$dui.=$xp;
			}
			$dui.='('.$j.').'.$uznt;
		}while(file_exists($b.'/'.$dui));
	}

	if(!empty($d)){
		 // Seçili kaliteye sıkıştır
	    if(!function_exists('compress_image')){
		    function compress_image($source_url, $destination_url, $quality) {
	            $info = getimagesize($source_url);
	            if ($info['mime'] == 'image/jpeg'){$image = imagecreatefromjpeg($source_url);}
	            else if ($info['mime'] == 'image/gif'){$image = imagecreatefromgif($source_url);}
	            else if ($info['mime'] == 'image/png'){$image = imagecreatefrompng($source_url);}
	            if(!empty($image)){
	            	imagejpeg($image, $destination_url, $quality);
	            	return $destination_url;
	            }
	            return false;
	        }
		}
	    
	    
		if(compress_image($c['tmp_name'], $b.'/'.$dui, $d))
		$snc=$dui;

	}
	else{
		if(move_uploaded_file($c['tmp_name'],$b.'/'.$dui))
		$snc=$dui;
	}

?>