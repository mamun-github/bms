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
                element.closest('li').addClass('active');
            }
        });
    });
});

function initializeForm() {
    $("input[type='checkbox']:not(.simple), input[type='radio']:not(.simple)").iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal'
    });
}