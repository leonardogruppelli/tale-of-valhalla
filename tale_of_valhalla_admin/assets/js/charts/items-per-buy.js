var url = window.location.href;

$(document).ready(function () {

    function get_random_color() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    $.getJSON("http://localhost/tale_of_valhalla/tale_of_valhalla_admin/charts/items_per_buy", function (data) {
        var colors = new Array();

        for (var i = 0; i < data.length; i++) {
            colors.push(get_random_color());
        }

        Morris.Donut({
            element: 'items-per-buy',
            data: data,
            resize: true,
            redraw: true,
            colors: colors
        });
    });
});