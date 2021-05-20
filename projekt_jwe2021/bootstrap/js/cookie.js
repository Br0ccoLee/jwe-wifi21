let hinweisbox = $('#hinweisbox');
let loeschen = $('#loeschen');

$('#zustimmen').click(function () {
    // Cookies.set('name', 'value', attribute): creates a cookie
    // example attribute: {expires: days} define when the cookie will be removed. 
    //                    default: cookie is removed when the user closes the browser.
    Cookies.set('jwe', 'Roland');
    Cookies.set('cookie_info', '1');
    Cookies.set('marketing', '1');

    hinweisbox.animate({
        // animates the box 
        bottom: '-130px'
    }, 1000, 'linear', function () {
        // animation complete
    });

    // location.reload(): reloads the current document
    location.reload(); // testing

});

$('#ablehnen').click(function () {
    Cookies.set('cookie_info', '1');
    Cookies.set('marketing', '0');

    hinweisbox.animate({
        bottom: '-130px'
    }, 1000, 'linear', function () {
        // animation complete
    });

    // reloads the current document
    location.reload(); // testing

});

$('#loeschen').click(function () {
    // Cookies.remove(): deletes cookie
    // Note: Removing a nonexistent cookie neither raises any exception nor returns any value.
    Cookies.remove('jwe');
    Cookies.remove('cookie_info');
    Cookies.remove('marketing');

    // reloads the current document:
    location.reload(); // testing
});


// if cookie_info is set to 1 the cookie loeschen button will be displayed
// if cookie_info is anything except 1 (even null) the hinweisbox will be animated and loeschen will be hidden
if (Cookies.get('cookie_info') == '1') {
    // cookie loeschen button is displayed
    $('#loeschen').removeClass('hidden');

    // if marketing cookie value equals 0 then shows warning
    if (Cookies.get('marketing') == '0') {
        // displays the warning on top of the page
        $('#hinweis').removeClass('hidden');

        // beautify css...
        $('body').css({
            'margin-top': '24px'
        });
        $('#main-teaser img').css({
            'top': '124px'
        });
    } else {
        // hides warning
        $('#hinweis').addClass('hidden');
    }

} else {
    // animates hinweisbox inside
    hinweisbox.animate({
        bottom: '0'
    }, 1000, 'linear', function () {
        // hides the cookie loeschen button
        $('#loeschen').addClass('hidden');
    });
}