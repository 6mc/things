<?Php
function z($a=NULL,$b=NULL,$c=NULL,$d=NULL){
	
	if(is_array($a)){
		if(is_array($c)){
			if((!empty($b)||$b=='0')&&(!empty($d)||$d=='0')){
				return !empty($c[$a[$b]][$d])?$c[$a[$b]][$d]:'';
			}
		}
		else if(!empty($b)||$b=='0'){
			if(empty($c)){
				return !empty($a[$b])?$a[$b]:'';
			}
			else if(is_string($c)){
				$x=NULL;
				if($c=='sayi'){
					if(empty($d))$d=2;
					else if($d>1000){$x=1;$d-=1000;}
				}
				return !empty($a[$b])?z($c,$a[$b],$d,$x):'';
			}
		}
	}

	static 
	$con=array(),
	$ini=array('oturum_oe'=>'z_','cerez_oe'=>'z_','cerez_sure'=>2600000,'default_time'=>'Europe/Istanbul','date'=>'Y-m-d','datetime'=>'Y-m-d H:i:s','tarih'=>'d.m.Y','tarihsaat'=>'d.m.Y H:i','tarihsaniye'=>'d.m.Y H:i:s','t_low'=>false,'ayr_t'=>'ayar','id_stl'=>'id',
		'ekle_etiket_temizle'=>true, 'ekle_izinli_etiket'=>'<br>,<b>,<strong>,<u>,<i>,<span>,<h1>,<h2>,<h3>,<h4>,<h5>,<h6>,<p>,<div>,<main>,<section>,<article>,<ul>,<ol>,<li>'
	),
	$z=array('oku','ekle','guncelle','sil','say','tablo','post','get','value','file','session','cookie','lgn','lgna','ini','date','datetime','host','sw','do','de','ds','dl','ke','ks','rb','ra','ze','za','tarih','tarihsaat','url','durum','sifrele','tarihsaniye','sayi','gurupla','sorgucikar','getyonet','birlestir','git','maskele','stunlar','form','yukle','ayar','icerik','dizigurupla','metin');
	
	$snc=NULL;
			

	switch($a){
		// VERİTABANI SORGULARI
		case 1: case $z[0]:
			$sd='';$tek=0;if(!empty($b)){
				if(is_numeric($b)){
					$sd="WHERE ".$ini['id_stl']."='".$b."' LIMIT 1";$tek++;
				}
				else if(is_array($b) && is_string(key($b))){
					$sdx='';
					if(!empty($b['GROUP'])){
						$sdx.=' GROUP '.str_replace(array("'",'"','`'),'',$b['GROUP']);
						unset($b['GROUP']);
					}
					if(!empty($b['ORDER'])){
						$sdx.=' ORDER '.str_replace(array("'",'"','`'),'',$b['ORDER']);
						unset($b['ORDER']);
					}
					if(!empty($b['LIMIT'])){
						$sdx.=' LIMIT '.str_replace(array("'",'"','`'),'',$b['LIMIT']);
						unset($b['LIMIT']);
					}

					$_SDQ=array();
					if(count($b)){
						foreach ($b as $k=>$v) {
							if(!empty($sd)){
								$sd.=' AND';
							}
							if(is_array($v)){	
								$sd.=" ".$k.$v[0].":".$k;
								$_SDV[$k]=$v[1];	
							}
							else {				
								$sd.=" ".$k."=:".$k;
								$_SDV[$k]=$v;
							}
						}
					}
					$sd=!empty($sd)?'WHERE'.$sd:'';
					$sd.=$sdx;
				}
				else if($b=='son'){
					$sd="ORDER BY ".$c." DESC LIMIT 1";$tek++;
				}
				else{
					$sd=$b;
				}
			}
			if(empty($c)){
				$c='*';
			}
			else if(strpos($c,',')===false){
				$tek+=2;
			}
			if(!empty($d)){
				z(6,$d);
			}
			$srg="SELECT ".$c." FROM ".$con['vt'].".".$con['oe'].$con['t']." ".$sd.";";
			if($tek==3){
				$pre=$GLOBALS['pdo']->prepare($srg);
				$pre->execute();
				$snc=$pre->fetchColumn();
			}
			else if($tek==2){
				$pre=$GLOBALS['pdo']->prepare($srg);
				$pre->execute();
				foreach( $pre->fetchAll(PDO::FETCH_NUM) as $x){
					if(empty($snc)){
						$snc=Array();
					}
					$snc[]=$x[0];
				}
			}
			else if($tek==1){
				$pre=$GLOBALS['pdo']->prepare($srg);
				$pre->execute();
				$snc=$pre->fetch(PDO::FETCH_ASSOC);
			}
			else{
				$pre=$GLOBALS['pdo']->prepare($srg);
				if(!empty($_SDV)){
					$pre->execute($_SDV);
				}
				else{
					$pre->execute();
				}
				foreach($pre->fetchAll(PDO::FETCH_ASSOC) as $x){
					if(empty($snc)){
						$snc=Array();
					}
					$snc[]=$x;
				}
			}
			return $snc;
		break;
		case 2: case $z[1]:
			if(!empty($b))require(__DIR__.'/e.php');
		break;
		case 3: case $z[2]:
			if(!empty($c))require(__DIR__.'/g.php');
		break;
		case 4: case $z[3]:
			if(!empty($b))require(__DIR__.'/s.php');
		break;
		case 5: case $z[4]:
			require(__DIR__.'/c.php');
		break;
		case 6: case $z[5]:
			if(!empty($b)){if(!empty($ini['t_low']))$b=strtolower($b);$con['t']=$b;}else $snc=!empty($con['t'])?$con['t']:'';
		break;
		case'con':
			require(__DIR__.'/cn.php');
		break;
		case'ayr':
			if(!empty($ini['ayr_t'])){$xat=z(6);if(empty($b)||is_array($b)){$_X=z(1,NULL,NULL,$ini['ayr_t']);if(!empty($_X)){foreach($_X as $x)$b[$x['ad']]=$x['a']+$x['s']+$x['m'];}$snc=$b;}else if(is_string($b)){z(6,$ini['ayr_t']);$x=array('a'=>0,'s'=>0,'m'=>'');$x[empty($d)?'m':$d]=$c;$snc=z(3,"WHERE ad='".$b."'",$x);}z(6,$xat);}
		break;
		
		
		// FORM, ÇEREZ ve OTURUM VERİLERİ
		case 7: case $z[6]:
			if(!empty($b)){if(!empty($_POST[$b]))$snc=$_POST[$b];}else{$snc=$_POST;}
		break;
		case 8: case $z[7]:
			if(!empty($b)){if(!empty($_GET[$b])){if(empty($c))$snc=$_GET[$b];else if($c=='sayi') $snc=z(36,$_GET[$b]);}}else{$snc=$_GET;}
		break;
		case 9: case $z[8]:
			if(!empty($b)){if(!empty($_POST[$b]))$snc=$_POST[$b];else if(!empty($_GET[$b]))$snc=$_GET[$b];else $snc=$c;}else $snc=array_merge($_POST,$_GET);
		break;
		case 10: case $z[9]:
			require(__DIR__.'/ff.php');
		break;
		case 11: case $z[10]:
			if(!empty($b)){if($c!==NULL){if($c!==''){$_SESSION[$ini['oturum_oe'].$b]=$c;}else{unset($_SESSION[$ini['oturum_oe'].$b]);}}else{if(!empty($_SESSION[$ini['oturum_oe'].$b])){$snc=$_SESSION[$ini['oturum_oe'].$b];}}}else $snc=$_SESSION;
		break;
		case 12: case $z[11]:
			if(!empty($b)){if($c!==NULL){setcookie($ini['cerez_oe'].$b,json_encode($c),time()+$ini['cerez_sure']);}else{if(!empty($_COOKIE[$ini['cerez_oe'].$b])){$snc=json_decode($_COOKIE[$ini['cerez_oe'].$b],1);}}}else $snc=$_COOKIE;
		break;
		case 13: case $z[12]:
			$lgnx=z(11,'lgn');if(!empty($b)&&is_string($b)&&!empty($lgnx[$b]))return $lgnx[$b];
			else if($b===NULL&&!empty($lgnx))return true;
			require(__DIR__.'/lgn.php');
		break;
		case 14: case $z[13]:
			if(!empty($b))require(__DIR__.'/lgna.php');else $snc=$ini['lgna'];
		break;
		
		
		// AYARLAR ve SABİTLER
		case 15: case $z[14]:
			require(__DIR__.'/ini.php');
		break;
		case 16: case $z[15]:
			if(empty($b))$snc=date($ini['date']);else $snc=date($ini['date'],strtotime(date($ini['date']).' '.$b));
		break;
		case 17: case $z[16]:
			if(empty($b))$snc=date($ini['datetime']);else $snc=date($ini['datetime'],strtotime(date($ini['datetime']).' '.$b));
		break;
		case 18: case $z[17]:
			$snc=$_SERVER['HTTP_HOST'];
		break;
		case 19: case $z[18]:
			if(!empty($b))$snc=!empty($_SERVER[$b])?$_SERVER[$b]:NULL;else $snc=$_SERVER;
		break;
		
		
		// DOSYA ve KLASÖRLER
		case 20: case $z[19]:
			if(!empty($b))require(__DIR__.'/do.php');
		break;
		case 21: case $z[20]:
			if(!empty($b))require(__DIR__.'/de.php');
		break;
		case 22: case $z[21]:
			if(!empty($b))require(__DIR__.'/ds.php');
		break;
		case 23: case $z[22]:
			require(__DIR__.'/dl.php');
		break;
		case 24: case $z[23]:
			if(!empty($b))require(__DIR__.'/ke.php');
		break;
		case 25: case $z[24]:
			if(!empty($b))require(__DIR__.'/ks.php');
		break;
		
		
		// ARAÇLAR ve AYARLARI
		case 26: case $z[25]:
		break;
		case 27: case $z[26]:
		break;
		case 28: case $z[27]:
		break;
		case 29: case $z[28]:
		break;
		
		
		// MİNİ FONKSİYONLAR
		case 30: case $z[29]:
			$b=!empty($b)?strtotime($b):time();$snc=date(!empty($c)?$c:$ini['tarih'],$b);
		break;
		case 31: case $z[30]:
			$b=!empty($b)?strtotime($b):time();$snc=date($ini['tarihsaat'],$b);
		break;
		case 32: case $z[31]:
			$b=empty($b)?'.':$b=urlencode($b);if($b=='geri')$b=z(19,'HTTP_REFERER');if(empty($c))$snc=$b;else{if(is_array($c))require(__DIR__.'/url.php');else $snc=$b.$c;}
		break;
		case 33: case $z[32]:
			if(!empty($b))if(!empty($c))z(11,$b,$c);else{$snc=z(11,$b);z(11,$b,'');}
		break;
		case 34: case $z[33]:
			if(!empty($b)){$x1=Array(0,1,2,3,4,5,6,7,8,9);$x2=Array('d','e','x','r','g','c','o','v','y','w');if(!empty($c)){$snc=str_replace($x2,$x1,substr($b,20));if(substr($b,0,20)!=substr(md5($snc),0,20))$snc=NULL;}else $snc=substr(md5($b),0,20).str_replace($x1,$x2,$b);}
		break;
		case 35: case $z[34]:
			$b=!empty($b)?strtotime($b):time();$snc=date($ini['tarihsaniye'],$b);
		break;
		case 36: case $z[35]:  //sayi
			if(empty($d))return !empty($c)?str_replace('.',',',round($b,$c)):(!empty($b)?(float)str_replace(array(',','%','₺','$','€','£'),array('.','','','','',''),$b):0);else{$b=str_replace(',','.',number_format((float)$b,$c));$x=strlen($b);if($b[$x-$c-1]=='.')$b[$x-$c-1]=',';if($c>2)if($b[$x-1]=='0')$b[$x-1]='';return $b;}
		break;
		case 37: case $z[36]:  //gurupla
			if(!empty($b)){if(empty($c))$c=$ini['id_stl'];$x=array();if(empty($d)){foreach($b as $y)$x[$y[$c]]=$y;}else if(is_string($d)) foreach($b as $y)$x[$y[$c]]=$y[$d]; else foreach($b as $y)$x[]=$y[$c];return $x;}
		break;
		case 38: case $z[37]:  //sorgucikar
			if(!empty($b)){if(empty($c))$c=$ini['id_stl'];if(empty($d))$d=$ini['id_stl'];$x='';$v=array();foreach($b as $y){if(!in_array($y[$c], $v)){$v[]=$y[$c];if(!empty($x))$x.=' OR ';$x.=$d."='".(!empty($y[$c])?$y[$c]:'')."'";}}return '('.$x.')';}
		break;
		case 39: case $z[38]:  //getyonet
			if(!empty($b)){if(empty($c))$_QS=explode('&',$_SERVER['QUERY_STRING']);if(!empty($_QS))foreach($_QS as $fe){$exp=explode('=',$fe);if(!empty($exp[0])&&$exp[1]){if(!isset($b[$exp[0]])){$b[$exp[0]]=$exp[1];}}}return http_build_query($b);}
		break;
		case 40: case $z[39]:  //birlestir
			$x=array();if(!empty($b)&&is_array($b)&&count($b))foreach($b as $k=>$v)$x[$k]=$v;if(!empty($c)&&is_array($c)&&count($c))foreach($c as $k=>$v)$x[$k]=$v;if(!empty($d)&&is_array($d)&&count($d))foreach($d as $k=>$v)$x[$k]=$v;return $x;
		break;
		case 41: case $z[40]:  //git
			if(!empty($b)){if(is_array($b))header('location: ?'.z(39,$b)); else if($b=='geri'){ header('location: '.z(19,'HTTP_REFERER')); } else if($b=='yenile'){ header('location: '.z(19,'REQUEST_URI')); } else header('location: '.$b);die;}
		break;
		case 42: case $z[41]:  //maskele
			if(!empty($c))preg_match_all("'{{(.*?)}}'si",$c,$m);if(!empty($m)){$aln=implode(',',$m[1]);$x=z(1,$b,$aln,$d);if(!empty($x)){if(!is_numeric($b)&&$b!='son')foreach($x as $fe)$snc.=str_replace($m[0],$fe,$c);else $snc=str_replace($m[0],$x,$c);}}
		break;
		case 43: case $z[42]:  //stunlar
			if(!empty($b)){z(6,$b);}$srg="SHOW COLUMNS FROM ".$con['vt'].".".$con['oe'].$con['t'].";";$q=$GLOBALS['pdo']->prepare($srg);$q->execute();$snc=$q->fetchAll(PDO::FETCH_ASSOC);
		break;
		case 44: case $z[43]: //form
			if(!empty($b))require(__DIR__.'/form.php');
		break;
		case 45: case $z[44]: //yukle
			if(!empty($c))require(__DIR__.'/yukle.php');
		break;
		case 46: case $z[45]: //ayar
			if(!empty($b))require(__DIR__.'/ayar.php');
		break;
		case 47: case $z[46]: //icerik
			static $_Icerik,$iceriki=0;
			if(empty($b))$b=++$iceriki;
			if(empty($c))$c=$GLOBALS['SA'];
			if(!empty($c)){
				if(empty($_Icerik[$c])){
					$xtbl=z(6);
					$_Icerik[$c]=z(37,z(1,"WHERE sayfa='".$c."'",'ad,icerik','icerik'),'ad');
					z(6,$xtbl);
				}
				if(empty($_Icerik[$c][$b]['icerik'])){
					$xtbl=z(6);
					if(z(2,array(
						'sayfa'=>$c,
						'ad'=>$b,
						'icerik'=>$c.' sayfasının '.$b.'. içeriği'
					),'icerik')){
						$_Icerik[$c][$b]['icerik']=$c.' sayfasının '.$b.'. içeriği';
					}
					z(6,$xtbl);
				}
				if(!empty($_Icerik[$c][$b]['icerik'])){
					$snc=$_Icerik[$c][$b]['icerik'];
				}
			}
		break;
		case 48: case $z[47]:  //dizigurupla
			if(!empty($b)){if(empty($c))$c=$ini['id_stl'];$x=array();if(empty($d)){
				foreach($b as $y){
					if(empty($x[$y[$c]])) $x[$y[$c]]=array();
					$x[$y[$c]][]=$y;
				}
			}else if(is_string($d)) foreach($b as $y){
				if(empty($x[$y[$c]])) $x[$y[$c]]=array();
				$x[$y[$c]][]=$y[$d];
			} else foreach($b as $y)$x[]=$y[$c];
			return $x;}
		break;
		case 49: case $z[48]:  //metin
			$snc=str_replace("
", '<br>', $b);
		break;

		
		// KURULUM ve BİLGİ
		case'info':
			require(__DIR__.'/zinf.php');
		break;
		case'z':
			if(!empty($b))if(count($b)==count($z))$z=$b;else $snc=$z;
		break;
		default:
			if(empty($a))
				$snc='z 1.19.0';
			else {
				$pre=$GLOBALS['pdo']->prepare($a);
				$pre->execute();
				foreach($pre->fetchAll(PDO::FETCH_ASSOC) as $x){
					if(empty($snc)){
						$snc=Array();
					}
					$snc[]=$x;
				}
			}
	}
	return $snc;
}
function _z($a=NULL,$b=NULL,$c=NULL,$d=NULL){print_r(z($a,$b,$c,$d));}
function jz($a=NULL,$b=NULL,$c=NULL,$d=NULL){$snc=z($a,$b,$c,$d);return is_array($snc)?json_encode($snc):json_decode($snc,true);}
function _jz($a=NULL,$b=NULL,$c=NULL,$d=NULL){print_r(jz($a,$b,$c,$d));}
?>