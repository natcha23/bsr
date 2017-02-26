 $(document).ready(function(){

  

  
  $(".enbook").popover({
        html : true,
        trigger: "hover",
        content: function() {
          return $('#popbestpriceshow').html();
        }
    });
 


  $('#menu').mmenu({
  extensions  : [ 'effect-slide-menu', 'pageshadow' ],
  searchfield : false,
  counters  : false,
  slidingSubmenus: false,
  offCanvas: {
    position: "right"
  }},
  {
   // configuration
   clone: true
  });
  $('#preloader').delay(500).fadeOut('slow'); // will fade out the white DIV that covers the website.
  $('body').delay(500).css({'overflow':'visible'});
  
  $.simpleWeather({
      woeid: '1225448', // krabi
      unit: 'c',
      success: function(weather) {
        html = '<span>Weather Today in '+weather.city+'</span>';
        html += '<h2><i class="icon-'+weather.code+'"></i> '+weather.temp+'&deg;'+weather.units.temp+'</h2>';
        $("#weather").html(html);
      },
    error: function(error) {
      $("#weather").html('<p>'+error+'</p>');
      }
    });

    /////////////////// submenu

    function mouseover(){
        $(this).find("ul").fadeIn(200);
    }   
    function mouseout(){
      $(this).find("ul").fadeOut(200);
    }
    var SubmenuConfig = 
        {
        interval: 100,
        sensitivity: 4,
        over: mouseover,
        timeout:50,
        out: mouseout 
        };
    $(".mainmenu>ul>li").hoverIntent(SubmenuConfig);



   $(".fancybox").fancybox({
      padding:0
    });
  $("#fixedtop").sticky({ topSpacing: 140, className : 'fixshadow' });
  $('#status').fadeOut(); // will first fade out the loading animation
  
 });

$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
      $(".header").removeClass("scrollto");
     //>=, not <=
    if (scroll >= 200) {
        //clearHeader, not clearheader - caps H
      $(".header").addClass("scrollto");

    }
  }); //missing );

