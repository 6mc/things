<?Php session_start();ob_start();
/*

BU SAYFA sitenin ajax olarak açılabilmesine olanak sağlar

*/

// Gerekli kütüphaneleri ve varsayılan ayarları yükle
require(__DIR__.'/ayar.php');

// istenilen sayfayı sayfa klasöründen import eder
if(z(8,'s')){
	$syf=__DIR__.'/sayfa/'.z(8,'s').'.php';
	if(file_exists($syf))require($syf);
	else require(__DIR__.'/sayfa/404.php');
}

// çıktıyı JSON olarak istersek
//header("Content-Type: application/json; charset=utf-8");
//echo json_encode( !empty($_S[$_GET['s']]) ? $_S[$_GET['s']] : $_S['s1'] );*/
ob_end_flush();
?>

