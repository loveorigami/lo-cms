$(function () {
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        //save the latest tab using a cookie:
        $.cookie('last_tab', $(e.target).attr('href'));
    });

    //activate latest tab, if it exists:
    var lastTab = $.cookie('last_tab');
    if (lastTab) {
        $('ul.nav-tabs').children().removeClass('active');
        $('a[href=' + lastTab + ']').parents('li:first').addClass('active');
        $('div.tab-content').children().removeClass('active in');
        $(lastTab).addClass('active in');
    }

    /*   $('#toupdate').click(sendform);
     $('#toindex').click(sendform);

     function sendform() {
     // $(this).ajaxSubmit();

     $('#w0').ajaxForm({
     // target identifies the element(s) to update with the server response
     target: '#msg',
     data: {form_action: this.id},
     beforeSend: function () {
     $('#w0').loading();
     },
     // success identifies the function to invoke when the server response
     // has been received; here we apply a fade-in effect to the new content
     success: function () {
     $('#w0').loading('stop');
     }
     });
     }*/

});

function show_noty() {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        cache: false,
        url: 'noty',
        "success": function (msg) {
            $('#response').append(msg);
        }
    });
}

$(document).on('pjax:send', function () {
    $('.grid-view').parent().loading();
    $('div[class$="-form"]').loading();
})

$(document).on('pjax:complete', function () {
    $('.grid-view').parent().loading('stop');
    $('div[class$="-form"]').loading('stop');
    show_noty();
})