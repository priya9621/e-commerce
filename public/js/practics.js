$(document).ready(function(){
    // alert('hello');
    $('#btnSlideUp').click(function(){
        $('#div').slideUp();
    })

    $('#btnSlideDown').click(function(){
        $('#div').slideDown();
    })

    $('#btnSlideToggle').click(function(){
        $('#div').slideToggle();
    })

    $('#btnHide').click(function(){
        $('#div').hide();
    })

    $('#btnShow').click(function(){
        $('#div').show();
    })

    $('#btnShowHideToggle').click(function(){
        $('#div').toggle();
    })

    $('#btnFadeIn').click(function(){
        $('#div').fadeIn(1000);
    })

    $('#btnFadeOut').click(function(){
        $('#div').fadeOut(1000);
    })

    $('#btnFadeToggle').click(function(){
        $('#div').fadeToggle(1000);
    })
})