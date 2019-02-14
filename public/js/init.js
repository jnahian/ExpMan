(function ($) {
    $(function () {

        $('.sidenav').sidenav();

        $('input, select, textarea').on('focus', function () {
            $(this).parent().find('.helper-text.red-text').remove();
        });

    }); // end of document ready
})(jQuery); // end of jQuery name space
