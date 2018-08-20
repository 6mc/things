<?php 
	if(is_array($b)){
		echo 'form burada oluşacak';
	}
	else if(is_string($b)){
		switch ($b) {
			case 'ekle':
				//zorunlu alan
				echo 'verileri kaydet';
				break;
			
			default:
			case 'guncelle':
				//zorunlu alan
				echo 'verileri güncelle';
				break;
		}
	}
?>