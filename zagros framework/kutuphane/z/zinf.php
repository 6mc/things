<?Php
$_Icindekiler = Array(
	Array($z[0],"MySQL'den veri okur [SELECT]","z('o',1,'ad');
z('o',2);
z('o',\"WHERE 1\",'ad');
z('o',\"WHERE 2\");",'[strig]
[array]
[array_x1]
[array_x2]'),
	Array($z[1],"MySQL'e yeni satır ekler [INSERT]","z('e','mesaj','Deneme');
z('e',Array('ad'=>'orhan','soyad'=>'tutum'));",'true/false'),
	Array($z[2],"MySQL'deki bir alanı veya satırı günceller [UPDATE]","z('g',1,'ad','Osman'); // 1
z('g',2,Array('ad'=>'Mehmet','soyad'=>'ÖĞMEN'));
z('g',\"WHERE 1\",Array('ad'=>'Orhan','soyad'=>'TUTUM'));",'true/false'),
	Array($z[3],"MySQL'den bir veya daha fazla satır siler [DELETE]","z('s',1); // id'si '1' olan satırı sil
z('s',\"WHERE 1\"); // Seçili tablodaki tüm satırları sil",'true/false'),
	Array($z[4],"MySQL tablodaki satırları sayar [count()]","z('c');
z('c',\"WHERE 1\");",'[int]'),
	Array($z[5],"MySQL sorgularında kullanılacak tabloyu seçer","z('t','users');
z('t');",'[NULL]
[users]'),
	Array($z[6],"","",''),
	Array($z[7],"","",''),
	Array($z[8],"","",''),
	Array($z[9],"","",''),
	Array($z[10],"","",''),
	Array($z[11],"","",''),
	Array($z[12],"","",''),
	Array($z[13],"","",''),
	Array($z[14],"","",''),
	Array($z[15],"","",''),
	Array($z[16],"","",''),
	Array($z[17],"","",''),
	Array($z[18],"","",''),
	Array($z[19],"","",''),
	Array($z[20],"","",''),
	Array($z[21],"","",''),
	Array($z[22],"","",''),
	Array($z[23],"","",''),
	Array($z[24],"","",''),
	Array($z[25],"","",''),
	Array($z[26],"","",''),
);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>z info</title>
</head>
<style type="text/css">
body{ margin:0px; padding:0px; background-color:#000;}
.kutu{ width:700px; margin:auto; background-color:#000; font-family:"Lucida Console", Monaco, monospace; color:#0F0; margin-top:10px; }
.kutu h2{ margin:0px; padding:3px; background-color:#010;  font-size:18px; font-family:Arial, Helvetica, sans-serif; border-top:1px solid #0F0;border-right:1px solid #0F0;border-left:1px solid #0F0;}
.kutu table{ border-left:1px solid #0F0; border-top:1px solid #0F0; font-size:12px;}
.kutu table th{ font-family:Arial, Helvetica, sans-serif;}
.kutu table td,.kutu table th{border-right:1px solid #0F0;border-bottom:1px solid #0F0; padding:2px 5px 2px 5px;}
.kutu ul{ margin:0px; padding:4px 20px 0px 20px; border:1px solid #0F0; }
.kutu ul li{ font-family:Arial, Helvetica, sans-serif; font-size:12px; margin-bottom:4px;}
</style>
<body>
<div class="kutu">
    <h2>KURULUM</h2>
    <ul>
    	<li>'z' klsörünü site ana dizinine taşıyın.</li> 
        <li>Aşağıdaki kodları sayfanızın en üstüne kopyalayın.<pre>&lt;?Php
    require('z/z.php'); 
    z('ini','default_time','UTC');
    z('con',Array('localhost','root','root','my_db','prefix_'));
?&gt;</pre></li>
        <li>Eğer bu bilgiler her sayfada aynı olacak ise aşağıdaki kodu kopyalayın.<pre>&lt;?Php
    require('z/zcon.php'); 
?&gt;</pre></li>
		<li>Ardından 'z' klasöründeki zcon.php içine girip bağlantı bilgilerini güncelleyin.</li>
    </ul>
</div>
<div class="kutu">
    <h2>ÖZELLİKLER</h2>
    <ul>
        <li>z Fonksiyonu kullanırken başına '_' eklenirse  '_z();', içerik return edilmez ekrana basılır. (print_r)</li>
        <li>"z( '<?Php echo $z[5] ?>', 'tablo_adi' );" şeklinde tablo belirtilirse ve sorguların üzerlerinde tablo belirtilmemiş ise devamında yapılan tüm sorgular 'tablo_adi' isimli tabloya uygulanır. (İlgili sayfada sadece bir tabloda işlem yapılacaksa kolaylık sağlayabilir.)</li>
    </ul>
</div>
<div class="kutu">
<h2>İÇİNDEKİLER</h2>
<table cellpadding="0" cellspacing="0" width="100%">
    <thead><tr><th>Adı</th><th>İşlevi</th><th>Kullanım Örneği</th><th>Return</th></tr></thead>
    <tbody>
    	<?Php foreach($_Icindekiler as $icindeki){ ?>
        <tr><td><?Php echo $icindeki[0]; ?></td><td><?Php echo $icindeki[1]; ?></td><td><pre><?Php echo $icindeki[2]; ?></pre></td><td><?Php echo $icindeki[3]; ?></td></tr>
        <?Php } ?>
    </tbody>
</table>
</div>
</body>
</html>