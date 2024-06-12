jQuery(document).ready(function($){
	$('html').removeClass('no-js').addClass('js');
	var $window = $(window);
	
	if($('.liste-cats').length) {
		$('.liste-cats').masonry({
		  itemSelector: '.col',
		  columnWidth: '.grid-sizer',
		  percentPosition: true
		});
	}
	
	if($('body').hasClass('home')) {
		$('.slider .owl-carousel').owlCarousel({
			thumbs: true,
			items: 1,
			thumbImage: false,
			thumbContainerClass: 'owl-thumbs',
			thumbItemClass: 'owl-thumb-item',
			thumbsPrerendered: true,
			dots: false,
			nav: true,
			loop: true,
			lazyLoad: true,
			autoplay:true,
			autoplayHoverPause: true,
			autoplayTimeout: 2000
		});
	}
	
	if($('body').hasClass('tax-gammes-cats')) {
		$(window).load(function(){
			$('.liste-cats').masonry({
				itemSelector: '.col',
				columnWidth: '.grid-sizer',
				percentPosition: true
			});
		});
	}
	
	if($('body').hasClass('single-gammes')) {
		$(".btn-gallery").click(function(e) {
			e.preventDefault();
			$(this).parents(".col-md-8").find(".fancybox").first().trigger("click");
		});
	}
	
	if ($window.width() < 768) {
		$('body').addClass('mobile');
		
		$('.nav-mobile').on('click', function(event) {
			var $this = $(this);
			event.preventDefault();
			
			$this.next('nav').toggleClass('open');
		});
		
		$('.logos .owl-carousel').owlCarousel({
			items: 1,
			autoplay:true,
			autoplayTimeout:6000,
			loop:true,
			responsive:{
				0:{
					items:2,
					nav:false
				}
			}
		});
	}
	
});