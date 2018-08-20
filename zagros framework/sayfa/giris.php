<?php
if(z('lgn',array(z(9,'kullanici'),z(9,'sifre'),z(9,'hatirla'))))
	//giriş başarılı
	z('git','.');
else 
	echo 'giriş başarısız';
 ?>
<div class="main">
<div class="container">
	<form method="post" action="./?s=giris">
		<input type="text" name="kullanici" >
		<input type="password" name="sifre">
		<button type="submit">Giriş Yap</button>
	</form>
</div>
</div>