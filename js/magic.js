$(document).ready( resizeToWindow );

$(window).resize( resizeToWindow );

function resizeToWindow(){
  $('.resize').css('width', window.innerWidth+'px').css('height', window.innerHeight+'px');
  console.log( window.innerWidth + ' | ' + window.innerHeight );
  $('.background-me').css('height', window.innerHeight+'px');
}
