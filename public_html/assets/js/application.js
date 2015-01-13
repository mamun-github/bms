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
        if(url == '#' || url == '') return false;
        loadHistory(url);
    });
});

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

function initializeForm() {
    $("input[type='checkbox']:not(.simple), input[type='radio']:not(.simple)").iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal'
    });
}

function selectLeftMenuItem(href){
    var element = $("a[href='" + href + "']");
    if(!element) return;
    element.closest('li').addClass('active');
}


function loadHistory(url) {
    History.pushState({state: 1, rand: Math.random()}, document.title, "?" + url);
}

function loadUrl(url){
    show_spinner();
    $.ajax({
        type: 'post',
        url: url,
        success: function(data) {
            $('#content-holder').html(data);
        },
        error: function() {
        },
        complete: function() {
            hide_spinner();
        }
    });
}


(function (window) {
    // Establish Variables
    var state = History.getState();

    // Bind to State Change
    History.Adapter.bind(window, 'statechange', function () {
        var state = History.getState();
        var fullUrl = state.url;
        var url = fullUrl.substr((fullUrl.indexOf("?") + 1), fullUrl.length);
        loadUrl(url);
    });

})(window);