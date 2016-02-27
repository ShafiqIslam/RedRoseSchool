
/* Attention !!!! here all "a[href]" are activited with this jquery.... so all "href" should br defined currectly before business use.......*/

$("a[href*=#]:not([href=#])").click(function(){
	if(location.pathname.replace(/^\//,"")===this.pathname.replace(/^\//,"")&&location.hostname===this.hostname){
		var e=$(this.hash);e=e.length?e:$("[name="+this.hash.slice(1)+"]");
		if(e.length){
	$("html,body").animate({scrollTop:e.offset().top},2e3);
	return false
}
}
})
