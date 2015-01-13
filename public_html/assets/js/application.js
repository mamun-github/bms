/**
 * to hide the application loading spinner
 */
function hide_spinner() {
    $('#dot-loader-div').hide();
}

/**
 * to show the application loading spinner
 */
function show_spinner() {
    $('.dot-loader').css("left: 0");
    $('#dot-loader-div').show();
}

/**
 * load content when left menu is clicked
 */
$(document).ready(function() {
    $("#sidebar-menu a").click(function(event) {
        if(event.preventDefault) event.preventDefault();
        else event.returnValue = false;
        var element = $(this);
        if(!element.hasClass('ajax-link')) {
            return false;
        }
        var url = element.attr('href');
        if(url == '#') return false;
        url = url.substr(1, url.length - 1);
        loadUrl(url, element);
    });
});

function loadUrl(url, leftMenuElement){
    show_spinner();
    $.ajax({
        type: 'post',
        url: url,
        success: function(data) {
            $('#content-holder').html(data);
            History.pushState({state: 1, rand: Math.random()}, "State 1", "?" + url);
        },
        error: function() {
        },
        complete: function() {
            hide_spinner();
            if(leftMenuElement) {
                $(".ajax-link").closest('li').removeClass('active');
                leftMenuElement.closest('li').addClass('active');
            }
        }
    });
}

function initializeForm() {
    $("input[type='checkbox']:not(.simple), input[type='radio']:not(.simple)").iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal'
    });
}

(function (window) {
    // Establish Variables
    var state = History.getState();
    //History.log('initial:', state.data, state.title, state.url);

    // Bind to State Change
    History.Adapter.bind(window, 'statechange', function () {
        var state = History.getState();
        History.pushState({state: 1, rand: Math.random()}, "State 1", "?state=1");
    });

})(window);