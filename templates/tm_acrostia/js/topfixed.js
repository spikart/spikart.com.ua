jQuery(function($){

$(window).on('scroll', function(){

if( $(window).scrollTop() > 10 ){

$('#sp-header-wrapper').addClass('top-fixed');
} 
else {

$('#sp-header-wrapper').removeClass('top-fixed');
}

});

});