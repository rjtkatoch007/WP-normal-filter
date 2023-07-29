jQuery(document).foundation();

jQuery(function($) {

  $('.simplefilter li').click(function(){
    $('.simplefilter li').removeClass( 'active' );
    $(this).addClass( 'active' );
  });

  if($('.filtr-container').length){
    $('.filtr-container').filterizr();
  }

  

});