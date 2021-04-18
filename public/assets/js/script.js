$(document).on('click', '.openNavigation', function(event) { 
  event.preventDefault(); 
  $("#mySidenav").click(); 
});




jQuery(function($){
  $('.phone').mask('+7 (999) 999-9999');
});

jQuery(function($){
  $('#flight_date').mask('99-99-9999');
});

$(document).ready(function() {
  const minus = $('.quantity__minus');
  const plus = $('.quantity__plus');
  const input = $('.quantity__input');
  minus.click(function(e) {
    e.preventDefault();
    var value = input.val();
    if (value > 1) {
      value--;
    }
    input.val(value);
  });
  
  plus.click(function(e) {
    e.preventDefault();
    var value = input.val();
    value++;
    input.val(value);
  })
});





function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}



window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("header").style.background = "#131314";
  } else {
    document.getElementById("header").style.background = "transparent";
  }
}


/*
 $(document).ready(function () {
        jQuery("#form1").submit(function () {
          var formNm = jQuery('#form1');
          var formData = new FormData(this);
          jQuery.ajax({
            type: "POST"
                    , url: "/templates/Potboiler/PostFile.php"
                    , cache: false
                    , contentType: false
                    , processData: false
                    , data: formData
                    , success: function (data) {
                        jQuery(formNm).html(data);
                    }
                    , error: function (jqXHR, text, error) {
                        jQuery(formNm).html(error);
                    }
          }).done(function () {
            $(this).find("input").val("");
            jQuery("#form1").trigger("reset");
        });
          return false;
        });
      });
      */

/*
//фикс меню
      jQuery(document).ready(function(){
        jQuery(function(jQuery){
          var content_height = jQuery('#me').offset().top;
          jQuery(window).scroll(function() {
            var top = jQuery(document).scrollTop();
            if (top > content_height) jQuery('#me').addClass('fixed');
            else jQuery('#me').removeClass('fixed');

          });
        });
      })
      */
      // плавное меню :D
      //например stroyzem.kz
 /*     jQuery(document).ready(function( $ ){
        $("#me, #fmenu").on("click","a", function (event) {
          //отменяем стандартную обработку нажатия по ссылке
          event.preventDefault();

          //забираем идентификатор бока с атрибута href
          var id  = $(this).attr('href'),

              //узнаем высоту от начала страницы до блока на который ссылается якорь
              top = $(id).offset().top;

          //анимируем переход на расстояние - top за 1500 мс
          $('body,html').animate({scrollTop: top}, 1500);
        });
      });
      */
      // маска
   /*       $(function () {
                    $("#te").mask("+7 (999) 999-9999");
                  });

                  */

                  

