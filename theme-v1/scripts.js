$(document).ready(function(){
	$('.blockquote > :last-child').addClass('last-child')
	$('.minmax').click(function(){
		
		if (!$('.wrapper-content').hasClass('mini')) {
			$('.minmax i').removeClass('icon-collapse-top').addClass('icon-collapse');
			if (!$('.minmax').hasClass('clicked')) {h = $('.wrapper-content').height();$('.minmax').addClass('clicked');}
			$('.wrapper-content').addClass('mini').animate({height:'24px'});
		} else { 
			$('.wrapper-content.mini').removeClass('mini').animate({height:h});
			$('.minmax i').addClass('icon-collapse-top').removeClass('icon-collapse');
		}
		return false
	});
})	