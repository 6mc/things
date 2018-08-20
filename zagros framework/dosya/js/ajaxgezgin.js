/*
	Bu JavaScript dosyası sisteme dahil edildiğinde sayfa geçişleri ajax ile gerçekleşir
*/

var ajaxGezgin = {
	baslat: function(){
		var a=document.getElementsByTagName('a');
		if(a.length){
			for (var i = 0; i < a.length; i++) {
				a[i].addEventListener('click',function(e){
					e.preventDefault();
					var sayfa = this.getAttribute('href');
					if(sayfa){
						ajaxGezgin.git(sayfa);
						this.parentNode.className='active';
					}
				});
			}
		}
	},
	git: function(sayfa){
		var actv=document.getElementsByClassName('active');
		if(actv.length){
			for (var i = 0; i < actv.length; i++) {
				actv[i].className="";
			}
		}
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("main").innerHTML = this.responseText;
			}
		};
		xhttp.open("GET", "./ajax.php?s="+sayfa, true);
		xhttp.send();
	}
}

window.onload=function(){
	ajaxGezgin.baslat();
};