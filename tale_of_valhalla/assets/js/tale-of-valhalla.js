$(document).ready(function () {
    var height = $('.content-wrapper').css('min-height');

    $('.content-wrapper').css('height', height);

    $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]'
    });

    $('[data-toggle="popover"]').popover();

    $('ul.tabs').tabs();
});