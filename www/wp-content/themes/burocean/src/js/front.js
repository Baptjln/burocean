jQuery(document).ready(function(s){s("html").removeClass("no-js").addClass("js");var o=s(window);s("body").hasClass("home")&&s(".slider .owl-carousel").owlCarousel({thumbs:!0,items:1,thumbImage:!1,thumbContainerClass:"owl-thumbs",thumbItemClass:"owl-thumb-item",thumbsPrerendered:!0,dots:!1,nav:!0,loop:!1,lazyLoad:!0}),s("body").hasClass("tax-gammes-cats")&&s(window).load(function(){s(".liste-cats").masonry({itemSelector:".col",columnWidth:".grid-sizer",percentPosition:!0,horizontalOrder:!0})}),s("body").hasClass("single-gammes")&&s(".btn-gallery").click(function(o){o.preventDefault(),s(this).parents(".col-md-8").find(".fancybox").first().trigger("click")}),o.width()<768&&(s("body").addClass("mobile"),s(".nav-mobile").on("click",function(o){var e=s(this);o.preventDefault(),e.next("nav").toggleClass("open")}),s(".logos .owl-carousel").owlCarousel({items:1,autoplay:!0,autoplayTimeout:6e3,loop:!0,responsive:{0:{items:2,nav:!1}}}))});