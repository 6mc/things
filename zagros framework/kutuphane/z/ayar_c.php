<?php
	foreach ($b as $ad => $deger) {
		if(is_array($deger)){
			foreach ($deger as $altad => $dgr) {
				$sd="WHERE ad='".$ad."' AND altad='".$altad."' LIMIT 1";
				$ID=z(1,$sd,'id');
				if(empty($ID)){
					if(z(2,array(
						'ad'=>$ad,
						'altad'=>$altad,
						'deger'=>$dgr
					))) echo 'Ayar '.$ad.'/'.$altad.' eklendi.<br>';
					else echo 'Ayar '.$ad.'/'.$altad.' ekleme işlemi başarısız!<br>';
				}
				else{
					if(z(3,$ID[0],'deger',$dgr)) echo 'Ayar '.$ad.'/'.$altad.' yenilendi.<br>';
					else echo 'Ayar '.$ad.'/'.$altad.' yenileme işlemi başarısız!<br>';
				}
			}
		}
		else{
			$sd="WHERE ad='".$ad."' LIMIT 1";
			$ID=z(1,$sd,'id');
			if(empty($ID)){
				if(z(2,array(
					'ad'=>$ad,
					'altad'=>'',
					'deger'=>$deger
				))) echo 'Ayar '.$ad.' eklendi.<br>';
				else echo 'Ayar '.$ad.' ekleme işlemi başarısız!<br>';
			}
			else{
				if(z(3,$ID[0],'deger',$deger)) echo 'Ayar '.$ad.' yenilendi.<br>';
				else echo 'Ayar '.$ad.' yenileme işlemi başarısız!<br>';
			}
		}
	}
?>