// CAROUSEL
$('.carousel').carousel({
  interval: false,
  wrap: false
});

var currentSlide = 0;
var prevBtn = $('a[name=prev]');
var nextBtn = $('a[name=next]');
$('.carousel').on('slid.bs.carousel', function () {
  $('a[name=navBtn]').removeClass('btn-primary').addClass('btn-default');
  currentSlide = $('.carousel').data("bs.carousel").getActiveIndex();
  $('a[name=navBtn][data-slide-to="'+currentSlide+'"]').removeClass('btn-default').addClass('btn-primary');
  switch( parseInt(currentSlide) ){
    case 0:
      prevBtn.attr('disabled', true).attr('data-slide-to', 0);
      nextBtn.attr('disabled', false).attr('data-slide-to', currentSlide + 1);
      break;
    case 9:
      inquiryName.focus();
      prevBtn.attr('disabled', false).attr('data-slide-to', currentSlide - 1);
      nextBtn.attr('disabled', true).attr('data-slide-to', currentSlide);
      break;
    default:
      prevBtn.attr('disabled', false).attr('data-slide-to', currentSlide - 1);
      nextBtn.attr('disabled', false).attr('data-slide-to', currentSlide + 1);
  }
});

var inputs = $('.carousel-inner').find('input');
var wage = 70;
if( getQueryVariable('promo') == '50OFF' ){
  wage /= 2;
}
inputs.change(function(){
  var inputChanged = $(this);
  console.log( inputChanged.attr('name') );
  if( inputChanged.attr('name') != 'sendTo' ){
    var total = 0;
    inputs.each(function(){
      var input = $(this);
      if( input.attr('name') != 'sendTo' ){
        if( input.is(':checked') ){
          if( input.parent('label').children('input').length > 1 && input.parent('label').children('input').eq(1).val().length > 0 ){
            var subtotal = 1;
            input.parent('label').children('input').each(function(){
              subtotal *= parseInt( $(this).val() );
            });
            total += subtotal;
          }
          else if( input.parent('label').children('input').length === 1 ){
            total += parseInt( input.val() );
          }
        }
      }
    });
    total *= wage;
    if( getQueryVariable('promo') == '50OFF' ){
      var normalPrice = total * 2;
      var promo = " <a href='javascript:void(0)' class='fa fa-info-circle text-danger' data-toggle='popover' data-original-title='<span style=\"color:#333\">Reflects half off regular price.<br>Normally priced at <strong style=\"color:#5cb85c\">$"+normalPrice+"</strong>.</span>'></a>";
    }
    else{
      var promo = '';
    }
    $('[name=total]').html('$'+total+promo);

    // tooltips & popovers
    var options = {
      html: true,
      placement: 'top',
      trigger: 'click'
    };
    $('.fa-info-circle').popover(options);
  }
});


// scrollspy
$('.body').scrollspy({offset: 72});
$('[data-spy="scroll"]').each(function(){
  var $spy = $(this).scrollspy('refresh')
});
// collapse
$('#collapseOne').on('show.bs.collapse',function(){
  $('button[data-target=#collapseOne]').html('<li class="fa fa-angle-up"></li> hide <li class="fa fa-angle-up"></li>');
});
$('#collapseOne').on('hide.bs.collapse',function(){
  $('button[data-target=#collapseOne]').html('<li class="fa fa-angle-down"></li> show <li class="fa fa-angle-down"></li>');
});
// modals
$('[data-toggle="modal"]').click(function(){
  $($(this).attr('name')).modal('toggle');
});
$('#contact').on('shown.bs.modal', function(){
  $('input[name=inputName]').focus();
});


// contact & inquiry / estimate form
$('form').submit(function(event){
  event.preventDefault();
  var file = 'submit.php';
  var form = $(this);
  if( form.attr('id') == 'estimateInquiry' ){
    file = 'sendInquiry.php';
    $('#estimateInquiry').each(function(){
      form.find('input:checked').each(function(){
        var input = $(this);
        if( input.attr('name') != 'sendTo' ){
          var theLabel = input.parent('label').text().trim();
          form.append("<input type='hidden' name='answers[]' value='"+theLabel+"|"+$(this).val()+"'>");
        }
      });
    });
    form.append("<input type='hidden' name='total' value='"+$('[name=total]').eq(0).text()+"'>");
    form.append("<input type='hidden' name='wage' value='"+wage+"'>");
  }
  else{
    $('#contact').modal('hide');
  }

  $.post( file, form.serialize(), function(data, response){
    console.log(response);
    var emailStatusMsg = $('#emailStatusMessage');
    emailStatusMsg.removeClass('alert-success alert-danger');
    if(response == 'success'){
      emailStatusMsg.addClass('alert-success');
      var theHtml = '<b>Great!</b>&nbsp;&nbsp;Your message was sent.';
      if( $('input[name=sendTo]:checked').val() != 'user' ){
        theHtml += '&nbsp;&nbsp;I\'ll reply ASAP.&nbsp;&nbsp;Thanks.';
      }
      emailStatusMsg.html(theHtml);
      $('#emailStatus').modal('show');
    }
    else{
      emailStatusMsg.addClass('alert-danger');
      emailStatusMsg.html('<b>Oops!</b>&nbsp;&nbsp;Something went wrong.&nbsp;&nbsp;Sorry for the inconvenience.&nbsp;&nbsp;Please try again later.');
      $('#emailStatus').modal('show');
    }
  });
});


// FORM VALIDATION
var inquiryName   = $('input[name=inquiryName]');
var inquiryEmail  = $('input[name=inquiryEmail]');

var contactName    = $('input[name=inputName]');
var contactEmail   = $('input[name=inputEmail]');
var contactMessage = $('textarea[name=inputMessage]');
var contactAnswer  = $('input[name=inputAnswer]');

function validateName (obj) {
  obj.parent('.input-group').removeClass('has-error has-success');
  if( obj.val().length < 2 ){
    obj.parent('.input-group').addClass('has-error');
  }
  else{
    obj.parent('.input-group').addClass('has-success');
  }
}

function validateEmail (obj) {
  var userEmail = obj.val().replace(/\s/g, "").replace("..",".").replace("@@","@");
  obj.parent('.input-group').removeClass('has-error has-success');
  var atIndex = userEmail.indexOf("@");
  var lastDotIndex = userEmail.lastIndexOf(".");
  if( atIndex > 0 && lastDotIndex > atIndex + 1 && lastDotIndex < userEmail.length - 1 ){
    obj.parent('.input-group').addClass('has-success');
  }
  else{
    obj.parent('.input-group').addClass('has-error');
  }
}

function validateMessage (obj) {
  obj.parent('.input-group').removeClass('has-error has-success');
  if( obj.val().length < 8 ){
    obj.parent('.input-group').addClass('has-error');
  }
  else{
    obj.parent('.input-group').addClass('has-success');
  }
}

function check_inputAnswer (obj) {
  var numbers = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten'];
  obj.parent('.input-group').removeClass('has-error has-success');
  if( numbers.indexOf( $('input[name=inputRandNum1]').val() ) + numbers.indexOf( $('input[name=inputRandNum2]').val() ) == parseInt( obj.val() ) ){
    obj.parent('.input-group').addClass('has-success');
    isAnswer = 1;
  }
  else{
    obj.parent('.input-group').addClass('has-error');
    isAnswer = 0;
  }
}

function validateForm (formID) {
  var isGood  = true;
  var theForm = $(formID);
  theForm.find('input[required]').each(function(){
    if( !$(this).parent('.input-group').hasClass('has-success') )
      isGood = false;
  });
  theForm.find('textarea[required]').each(function(){
    if( !$(this).parent('.input-group').hasClass('has-success') )
      isGood = false;
  });

  if( isGood ){
    // enable submit button
    theForm.find('button[type=submit]').attr('disabled', false);
  }
  else{
    // disable submit button
    theForm.find('button[type=submit]').attr('disabled', true);
  }
}



contactName.on('keyup paste focusout', function(event){
  validateName( $(this) );
  validateForm('#contactForm');
});

contactEmail.on('keyup paste focusout', function(event){
  validateEmail( $(this) );
  validateForm('#contactForm');
});

contactMessage.on('keyup paste focusout', function(event){
  validateMessage( $(this) );
  validateForm('#contactForm');
});

contactAnswer.on('keyup paste focusout', function(event){
  check_inputAnswer( $(this) );
  validateForm('#contactForm');
});


inquiryName.on('keyup paste focusout', function(){
  $('#userName').text($('input[name=inquiryName]').val());
  $('#userName').trigger('change');
  validateName( $(this) );
  validateForm('#estimateInquiry');
});

inquiryEmail.on('keyup paste focusout', function(){
  validateEmail( $(this) );
  validateForm('#estimateInquiry');
});

$('#userName').change(function(){
  if( $(this).text().length < 1 ){
    $('input[value=user]').addClass('hide');
  }
  else{
    $('input[value=user]').removeClass('hide');
  }
});

// get URL GET variables
function getQueryVariable(variable){
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for( var i=0;i<vars.length;i++ ){
    var pair = vars[i].split("=");
    if(pair[0] == variable)
      return pair[1];
  }
  return(false);
}
