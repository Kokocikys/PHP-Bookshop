//Кнопка вверх
$(window).scroll(function() {
    if ($(this).scrollTop() > 150) {        // If page is scrolled more than 50px
        $('#topButton').fadeIn(200);    // Fade in the arrow
    } else {
        $('#topButton').fadeOut(200);   // Else fade out the arrow
    }
});


function topFunction() {
    $('body,html').animate({scrollTop: 0}, 300);
}