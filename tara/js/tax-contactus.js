
	jQuery(function() {
			  // defaultRealHash : secret code by generate.
			  // defaultReal : text input from user.
			  jQuery('#defaultRealHash').realperson({hashName: 'defaultRealHash'});
			  
			  jQuery('#submit').click(function(){                   
					   if ( jQuery('input[name=defaultRealHash]').val() == rpHash(jQuery('#defaultReal').val()) ) { 
								 alert('Thank you for your submit.');
								jQuery('#contactform').submit();
					   }
					   else {
								 alert('Please enter the letters displayed');
								 return (false);
					   }
			  });
	});

	function rpHash(getVal) {
			  hash = 5381; 
			  getVal = getVal.toString();
			  value = getVal.toUpperCase(); 
			  for(i=0; i < value.length; i++) { 
					   hash = ((hash << 5) + hash) + value.charCodeAt(i); 
			  } 
			  return hash;
	}        
