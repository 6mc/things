<?php 
require(__DIR__.'/kutuphane/z/z.php');

if(z('host')=='localhost'||strpos(z('host'),'192.168.')!==false){   // Eğer yerel sunucuda isem
	z('con',Array('localhost','root','secret','zwork','zw_'));   // Localhost veritabanına bağlan
}
else{   // Eğer yerel sunucuda değil isem
	z('con',Array('localhost','root','secret','zwork','zw_'));   // Host sunucuya bağlan
}

// GENEL AYARLAR
z('ini','default_time');   // Varsayılan saat dilimini EUROPE/ISTANBUL olarak ayarla
// z('ini','id_stl','ID');    // veritabanında id tanımlaması büyük harflerle ID olarak kullanılıyor ise bu ayae aktif edilmeli

z('lgna','tablo','kullanicilar');   // Üyelik girişi için kullanılan üyeler tablosunun adı
z('lgna','alan',Array('kullanici','password',true),Array('eposta','sifre',true));   // üye giriş anında kullanılan alanların tanımlanması
z('lgna','hatirla',false);   // Bu sistemde beni hatırla özelliği olacak mı?
z('lgna','kaydet',Array('ID','admin','oturumID','kullanici','eposta','ad','soyad'));   // Üyelik girişi başarılı ise oturuma (SESSION'a) neleri kaydetsin
z('lgna','guncelle',Array('tarihGiris'=>z('datetime')));   // Giriş başarılı ise veritabanında güncellenecek alanlar

z('ini','display_errors',true);   // Errorlogları açık tut
z('ini','oturum_oe','zw_');   // Oturum (SESSION) ön eki (Localhost'ta birden fazla site kurabilmek için)
z('ini','cerez_oe','zw_');   // Çerez (COOKIE) ön eki (  " "  )
?>