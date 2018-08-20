<?Php 
require('z/z.php');
if(z('host')=='localhost'||strpos(z('host'),'192.168.')!==false)z('con',Array('localhost','root','root','z_zertel',''));
else z('con',Array('localhost','...','...','z_zertel',''));
z('ini','default_time');

z('lgna','tablo','personel');
z('lgna','alan',Array('kullanici','sifre',true),Array('eposta','sifre',true));
z('lgna','hatirla',true);
z('lgna','kaydet',Array('ID','admin','oturumID','kullanici','eposta','ad','soyad'));
z('lgna','guncelle',Array('tarihG'=>z('datetime')));

z('ini','display_errors',true);
z('ini','oturum_oe','z322_');
z('ini','cerez_oe','z322_');
?>