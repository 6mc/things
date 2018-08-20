<?Php
session_start();
require('zcon.php');
echo '<pre>';
/*
if(z(7)){
	z('lgn','');
	_z('lgn',Array(z(7,'id'),z(7,'pw'),z(7,'rm')));
}
if(z(8,'x')){z('lgn','');header('Location: .');}

else if(z('lgn')){
_z('lgn','eposta');
}*/
_z(1,NULL,NULL,'uye');
?>
<meta charset="utf-8" />
<a href=".">|||</a>
<a href="?x=1">çıkış</a>
<form action="" method="post">
  <input name="id" value="<?Php _z(9,'id')?>">
  <input name="pw" value="<?Php _z(9,'pw')?>">
  <input name="rm" type="checkbox" value="1">
  <input type="submit">
</form>
