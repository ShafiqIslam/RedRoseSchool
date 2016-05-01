
/*================Strat of Menu bar Hover for bootstrape=============*/

$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
  $(this).find('.dropdown-menu').addClass(".hover-color");
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});

/*-------------------Tab clicking jquery code ----------------*/
  $('.myTab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
});

/*================latest News Jquery code=====================*/

 $(function () {
    $(".latest_news_slide").bootstrapNews({
        newsPerPage: 5,
        autoplay: true,
		pauseOnHover:true,
        direction: 'up',
        animationSpeed: 'normal',
        newsTickerInterval: 3000,
        onToDo: function () {
            //console.log(this);
        }
    });

  });


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
  $(function() {
    $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '2000:c',
        dateFormat: "yy-mm-dd",
    });
  });
