var url = window.location.href;

$(document).ready(function () {

    $.getJSON("http://localhost/tale_of_valhalla/tale_of_valhalla_admin/charts/find_years", function (year) {

        var chart_year;
        var count = Object.keys(year).length;

        for (var i = 0; i < count; i++) {
            $('.ui-sortable-handle').prepend("<li><a cl href='#users-per-month-" + year[i].year + "' data-toggle='tab' aria-expanded='false'>" + year[i].year + "</a></li>");
            $('.tab-content').append("<div class='chart tab-pane' id='users-per-month-" + year[i].year + "' style='height: 250px;'></div>");

            (function (i) {
                $.getJSON("http://localhost/tale_of_valhalla/tale_of_valhalla_admin/charts/users_per_month", {year: year[i].year}, function (data) {
                    var months = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];

                    chart_year = year[i].year;

                    Morris.Area({
                        element: 'users-per-month-' + chart_year,
                        data: data,
                        xkey: 'date',
                        ykeys: ['users'],
                        labels: ['Usuários'],
                        lineColors: ["#7E9D3A"],
                        behaveLikeLine: true,
                        resize: true,
                        xLabels: 'month',
                        xLabelFormat: function (date) {
                            var month = months[date.getMonth()];
                            return month;
                        },
                        dateFormat: function (date) {
                            var month = months[new Date(date).getMonth()];
                            return month;
                        }
                    });
                });
            })(i);
        }
    });
});