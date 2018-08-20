<?php 

	$tblx=z(6);
	z(6,'ayar');
	
	if(empty($d)){
		$_X=z(1);
		if(!empty($_X)){
			foreach ($_X as $x){
				if(!empty($x['ad'])){
					if( !empty($x['altad']) ){
						$b[$x['ad']][$x['altad']]=$x['deger'];
					}
					else {
						$b[$x['ad']]=$x['deger'];
					}
				}
			}
		}
	}
	else z(4," ");

	if(!empty($c)){
		require(__DIR__.'/ayar_c.php');
	}
	
	z(6,$tblx);
	$snc=$b;
	
?>