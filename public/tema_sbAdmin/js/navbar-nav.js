$(function(){
	var current = window.locaion.href;
	$('ul.navbar-nav li a').each(function(){
		var $this = $(this);
		if($this.attr('href') == current){
			$this.parents('li').addClass('active')
		}
	})
})