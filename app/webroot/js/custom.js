
/*================Strat of Menu bar Hover for bootstrape=============*/


$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
  $(this).find('.dropdown-menu').addClass(".hover-color");
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});

/*-------------------end of menu bar hover jquery code ----------------*/



/*==============================Calendar Code=======================*/
/*

$( document ).ready( function() {
  $('.responsive-calendar').responsiveCalendar();
});

$( document ).ready( function() {
  $(".responsive-calendar").responsiveCalendar({
    time: '2016-02',
    events: {
      "2016-02-21": {"number": 2, "badgeClass": "badge-warning", "url": "www.redroseschool.com"},
      "2016-02-08": {"number": 8, "badgeClass": "badge-warning", "url": "http://xorcoder.org"}, 
      "2016-03-21": {"number": 1, "badgeClass": "badge-error"}, 
      "2016-04-21": {}}
  });
});

*/
/*----------------Ending of Calendar Jquery Code-------------------*/


/*================latest News Jquery code=====================*/

 $(function () {
        $(".demo1").bootstrapNews({
            newsPerPage: 5,
            autoplay: true,
			      pauseOnHover:true,
            direction: 'up',
            animationSpeed: 'normal',
            newsTickerInterval: 2000,
            onToDo: function () {
                //console.log(this);
            }
        });

    });


 /*----------------end of latest news section jquery code---------------*/


 /*---------------------Carousel Caption jquery Code------------------*/
 /*
  $(function (){
    $(".carousel-caption").
  });

 /*-------------Ennding of Carousel Caption jquery Code----------*/



 /*--------JS CODE FOR PHOTO GALLERY------------*/

 $(function() {
    
      // Call SuperBox
      $('.MyGallery').SuperBox();
    
  });

 /*-----------------JS for BBC News tacker-----------------*/

 /*------------------Routin BS tab Js-------------------*/
    $('#routine a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    })
 /*---------------end of BS tab Routine js--------------*/
