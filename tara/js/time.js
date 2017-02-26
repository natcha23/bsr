var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
var offsets = [+7];
var timeClasses = ['.seattle .time']
var dayClasses = ['.seattle .day']
var cities = ['.seattle']

window.setInterval(date, 1000);

function date () {
  for ( var i = 0; i < offsets.length; i++ ) {
    var dateNow = dateObj(offsets[i]);
    var day = dateNow.getDay();
    var hours = dateNow.getHours();
    var minutes = dateNow.getMinutes();
    var seconds = dateNow.getSeconds();
    var buildHex = [hours, minutes, seconds];
    var hexFinal = handleHex( i, buildHex);
    var hex = "#" + makePretty(hexFinal[0].toString()) + makePretty( hexFinal[1].toString() ) + makePretty(hexFinal[2].toString() );
    var time = makePretty( standard( hours  ) ) + ' : ' + makePretty( minutes ) + ' : ' + makePretty( seconds );
    time += ' ' + ampm( hours );
   
    document.querySelector(dayClasses[i]).textContent = days[day];
    document.querySelector(timeClasses[i]).textContent = time;
  }
}

function dateObj ( timezoneOffset ) {
  var today = new Date();  
  var localoffset = -(today.getTimezoneOffset()/60);
  var destoffset = timezoneOffset; 

  var offset = destoffset-localoffset;
  var date = new Date( new Date().getTime() + offset * 3600 * 1000)
  
  return date;
}

function handleHex( iterator, hexArray ) {
  
  var newHex = [];
  
  switch( iterator ) {
    case 0:
      newHex = [ hexArray[0], hexArray[2], hexArray[1] ];
      return newHex;
    case 1:
      newHex = [ hexArray[2], hexArray[1], hexArray[0] ];
      return newHex;
    case 2:
      newHex = [ hexArray[0], hexArray[1], hexArray[1] ];
      return newHex;
    case 3:
      newHex = [ hexArray[1], hexArray[0], hexArray[2] ];
      return newHex;
    default:
      return hexArray;
  }
  
}

function makePretty( value ) {
  if (value < 10 ) {
    value = "0" + value;
  }
  
  return value;
}

function ampm ( hours ) {
  var am = 'AM'; 
  var pm = 'PM';
  
  if (hours >= 12 ) {
    return pm;
  } else {
    return am;
  }
  
}

function standard ( hours ) {
  
  if ( hours > 24 ) {
    return hours - 24;
  } else if ( hours == 0 ){
    return 24;
  } else {
    return hours;
  }
  
}