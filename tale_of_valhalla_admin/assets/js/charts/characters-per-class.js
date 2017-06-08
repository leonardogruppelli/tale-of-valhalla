var url = window.location.href;

$(document).ready(function () {

    $.getJSON("http://localhost/tale_of_valhalla/tale_of_valhalla_admin/charts/characters_per_class", function (data) {

        Morris.Donut({
            element: 'characters-per-class',
            data: data,
            resize: true,
            redraw: true,
            colors: [
                '#DB0000',
                '#00DB07',
                '#0095DB',
                '#DBAF00'
            ]
        });
    });
});