//language listener
$('input[name=language]').change(function(){
  switch( $(this).val() ){
    case 'en':
      $('.vi').hide();
      $('.en').show();
      initialize();
      break;
    case 'vi':
      $('.en').hide();
      $('.vi').show();
      initialize();
  }
});

//mobile nav toggle listener
$('a[data-toggle=tab]').click(function(){
  $("#bs-example-navbar-collapse-1").collapse('toggle');
});

// when contact tab content is shown, focus on first input field
$('a[href="#contact"]').on('shown.bs.tab', function (e) {
  $('input[name=first_name]').focus();
})

//when "enter" is pressed while on "fromHere", then click Go
$('input[name=fromHere]').keypress(function(e){
  if(e.which == 13){
    $('button[name=directionsGo]').click();
  }
});

// GOOGLE MAP
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
var marker;
var wvfpm = new google.maps.LatLng(40.699906, -111.990621);

$(window).ready(initialize());

$(window).resize(function(){
  google.maps.event.trigger(map, 'resize');
});
function initialize() {
  var useragent = navigator.userAgent;
  var mapdiv = document.getElementById("map-canvas");
  var dirdiv = document.getElementById('directions-panel');

  if (useragent.indexOf('iPhone') != -1 || useragent.indexOf('Android') != -1 ) {
    mapdiv.style.width = '100%';
    mapdiv.style.height = '300px';
    dirdiv.style.width = '100%';
    dirdiv.style.height = '100%';
  } else {
    mapdiv.style.width = '100%';
    mapdiv.style.height = '500px';
    dirdiv.style.width = '100%';
    dirdiv.style.height = '500px';
  }

  directionsDisplay = new google.maps.DirectionsRenderer();
  var mapOptions = {
    center: wvfpm,
    zoom: 14
  }
  map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
  directionsDisplay.setMap(map);
  directionsDisplay.setPanel(document.getElementById('directions-panel'));

  // To add the marker to the map, use the 'map' property
  marker = new google.maps.Marker({
    position: wvfpm,
    map: map,
    title: "West Valley Family and Preventative Medicine"
  });
}
function calcRoute() {
  var start = $('input[name=fromHere]').val();
  var end = wvfpm;
  var request = {
    origin: start,
    destination: end,
    travelMode: google.maps.TravelMode.DRIVING
  };
  directionsService.route(request, function(result, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(result);
      $('#directions-panel').show();
      marker.setMap(null);
    }
    else{
      $('#directions-panel').hide();
    }
  });
}
