<?Php
$url=explode('?',$b);
if(!empty($url[1])){
	$_Exp=explode('&',$url[1]);
	if(!empty($_Exp))
	foreach($_Exp as $fe){
		$ex=explode('=',$fe);
		$_Get[$ex[0]]=$ex[1];
	}
}
foreach($c as $i=>$fe){
	$i=urlencode($i);
	if($fe!==NULL){
		$_Get[$i]=$fe;
	}
	else{
		unset($_Get[$i]);
	}
}
$get='';
foreach($_Get as $i=>$fe){
	$get.=!empty($get)?'&':'?';
	$get.=$i.'='.$fe;
}
$snc=$url[0].$get;
?>