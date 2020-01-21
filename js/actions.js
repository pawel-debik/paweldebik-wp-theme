

/* * * * * * * * * * * * * * * * * * * * * */
/* Lazyload init */
/* * * * * * * * * * * * * * * * * * * * * */
var myLazyLoad = new LazyLoad({
    elements_selector: ".lazy",
    load_delay: 300 //adjust according to use case
});

/* * * * * * * * * * * * * * * * * * * * * */
/* Theme stuff */
/* * * * * * * * * * * * * * * * * * * * * */

// Dark theme toggle
const theme_toggle = document.querySelector('.theme-selector');
const theme_color = document.querySelector('.theme-color');

theme_toggle.addEventListener('click', function(){
	theme_toggle.checked ? set_theme('dark') : set_theme('light');
});

// Set theme toggle to correct state on page load
window.onload = function(){
	let shade = sessionStorage.getItem('theme');

	if ( shade == "dark" || theme_color.classList.contains("dark-theme") ) {
		theme_toggle.checked = true;
	} else {
		theme_toggle.checked = false;
	}
	console.log(shade);
	if ( shade ){
		set_theme(shade);
	}
}

function set_theme(shade){
	console.log(shade);
	sessionStorage.setItem('theme', shade);

	if ( shade === 'light' ) {
		theme_color.classList.remove('dark-theme');
		theme_color.classList.add('light-theme');
	} else {
		theme_color.classList.add('dark-theme');
		theme_color.classList.remove('light-theme');
	}
}


/* * * * * * * * * * * * * * * * * * * * * */
/* Menu stuff */
/* * * * * * * * * * * * * * * * * * * * * */
const menu = document.querySelector('.responsive-menu-toggle');
const menuButtons = document.querySelector('nav ul');

menu.addEventListener("click", function(){ 
	menu.classList.toggle('active') 
	menuButtons.classList.toggle('active') 
});


// window.addEventListener('scroll', function(ev) {

// 	const menu = document.getElementById('header');
// 	const distanceToTop = menu.getBoundingClientRect().top;

// 	if ( distanceToTop >= -10 ){
// 		menu.classList.contains('fixed') ? "" : menu.classList.add('fixed');
// 	} else {
// 		menu.classList.remove('fixed');	
// 	}
// });



// $(function() {

	// remove styling from paragraphs if there is an image inside
	// $(".entry img").parent().addClass('nostyle')

	// // inject random background image
	// var rn=Math.floor(Math.random()*4);
	// var img = '';
	
	// if (window.location != window.parent.location){
	// 	 // Check if site is in iframe, ie. in Facebook. If true, do not add any images
	// } else {
	// 	if(rn==0){
	// 		$('#header').before('<img style="position:fixed; z-index:0;" src="http://paweldebik.com/paweldebik/wp-content/themes/pawel/images/bg1.jpg" alt="" width="100%" height="1760"/>');
	// 	} else if(rn==1){
	// 		$('#header').before('<img style="position:fixed; z-index:0;" src="http://paweldebik.com/paweldebik/wp-content/themes/pawel/images/bg2.jpg" alt="" width="100%" height="1760"/>');
	// 	} else if(rn==2){
	// 		$('#header').before('<img style="position:fixed; z-index:0;" src="http://img403.imageshack.us/img403/4403/dsc08658w.jpg" alt="" width="100%" height="1760"/>');
	// 	} else if(rn==3){
	// 		$('#header').before('<img style="position:fixed; z-index:0;" src="http://img33.imageshack.us/img33/3078/dsc08776q.jpg" alt="" width="100%" height="1760"/>');
	// 	}
	// }

	// Toggle additional portfolio items
	/*
	$('.view-more-portfolio').click(function(e){
		e.preventDefault();
		$(this).hide();
		$('#more-portfolio').show();
	});
	*/

	// Add extra options to images
	/*		
	var btn_set_background = '<div class="menu-item btn-set-background"> <a href="#">Set as background</a> </div>';
	var btn_expand_image   = '<div class="menu-item btn-expand-image">   <a href="#">Expand Image</a> </div>';

	$('.extra-image-options').each(function(e) {
	var link = $(this).attr('href');

		$(this).hover(function(e){
			$(this).append('<div class="nav">' + btn_set_background + btn_expand_image + '</div>');
		}, function(e){
			$('.btn-set-background, .btn-expand-image').parent().remove();
		});

		$(this).click(function(e){
			e.preventDefault();
			$.anystretch(link, {speed: 150});
		});

		$(btn_set_background).click(function(e){
			e.preventDefault();
			$.anystretch(link, {speed: 150});
		});

		$(btn_expand_image).click(function(e){
			e.preventDefault();
			window.location = link;
		});
	});
	*/


	// DEPRECATED *** open images in lightbox and pass screen width and hight to image resize function
	/*
	var w = $(window).width() * 0.98;
	var h = $(window).height() * 0.98;

	$('a.img-medium').each(function () {
		var href = 'http://paweldebik.com/phpimageresize/generate.php/?src=' + $(this).attr('href');
		$(this).attr('href', href + '&h=' + h + '&w=' + w);
	});
	*/

	/* For specific blog post demo */
	/*
	$('#navi-example li a').hover(function(){
		var w = $(this).width()+40;
		var z = (($(this).width())/2)+20;

		$(this).after('<div class="hover-bottom" \
							style=\'border: #3c89c8; \
									border-left: '+z+'px solid transparent; \
									border-right: '+z+'px solid transparent; \
									border-top: 27px solid #3c89c8; content: ""; \
									height: 0; \
									margin: 0; \
									position: absolute; \
									width: 0;\'></div>');


		$(this).before('<div class="hover-bottom" \
							 style=\'height: 15px; \
									 width: '+w+'px; \
									 background-color: #3c89c8; \
									 margin-top: -15px; \
									 position: absolute; \'></div><div class="hover-bottom" \
							 style=\'border-bottom: 15px solid #1b5d93; \
									 border-right: 15px solid transparent; \
									 height: 0; \
									 width: 0; \
									 margin-top: -15px; \
									 margin-left: '+w+'px; \
									 position: absolute; \'></div>');
	}, function(){
		$('.hover-bottom').remove();
	});
*/


	// Lazyload init
	// $("img.lazy").lazyload({ threshold : 200, effect : "fadeIn" });


	// // Portfolio hovers
	// $('.portfolio-item').hover(function(){
	// 	$(this).addClass('hover');
	// }, function(){
	// 	$(this).removeClass('hover');
	// });		
// });