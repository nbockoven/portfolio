$('input[name=method]').change(function(){
  $('input[type=text]').eq(0).focus();
});


$('input[type=text]').on("keyup paste", function(){
  var input = $(this);
  var inputVal = $.trim(input.val());
  var list = $('.predict-list');
  if( inputVal.length > 0 ){
    $('button').prop('disabled', false);
    if( $('input[name=method]:checked').val() === 'ajax' ){
      $.ajax({
        type: 'POST',
        url: './findRestaurants.php',
        data: {input: inputVal},
        dataType: 'json',
        beforeSend: function(){
          $('.input-group-addon').eq(1).removeClass('hide');
        },
        complete: function(){
          $('.input-group-addon').eq(1).addClass('hide');
        },
        success: function(output){
          if( !output ){
            list.addClass('hide');
            $('.input-group-addon').eq(1).addClass('hide');
          }
          else{
            list.css('width', input.css('width')).css('padding', input.css('padding'));
            list.children().remove();
            $.each(output, function(key, value){
              list.append("<li>"+value+"</li>");
            });
            list.removeClass('hide');
            //initialize();
          }
        }
      });
    }
    else{
      $('button').prop('disabled', true);
    }
  }
  else{
    list.addClass('hide');
    $('.input-group-addon').eq(1).addClass('hide');
  }
});

$('.predict-list').on('click', 'li', function(){
  var listItem = $(this);
  $('input[type=text]').val(listItem.text());
  listItem.parent().fadeOut();
  $('input[type=text]').trigger("paste");
});


$('button').click(function(){
  if( $.trim($('input[type=text]').val()).length > 0 ){
    initialize($.trim($('input[type=text]').val()));
  }
});


// GOOGLE MAP
var map;
var marker;
var center = new google.maps.LatLng(32.715737, -117.161628);
var service;

$(window).ready( initialize() );
$(window).resize(function(){
  google.maps.event.trigger(map, 'resize');
});
function initialize(restaurant_name) {
  var mapdiv = document.getElementById("map-canvas");

  var mapOptions = {
    center: center,
    zoom: 14
  }
  map = new google.maps.Map(mapdiv, mapOptions);
  service = new google.maps.places.PlacesService(map);

  google.maps.event.addListenerOnce(map, 'bounds_changed', performSearch);
}

function performSearch() {
  var request = {
    bounds: map.getBounds(),
    keyword: 'best view'
  };
  service.radarSearch(request, callback);
}

function callback(results, status) {
  if (status != google.maps.places.PlacesServiceStatus.OK) {
    alert(status);
    return;
  }
  for (var i = 0, result; result = results[i]; i++) {
    var marker = new google.maps.Marker({
      map: map,
      position: result.geometry.location
    });
  }
}
