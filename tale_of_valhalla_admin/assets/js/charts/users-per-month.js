var url = window.location.href;

$(document).ready(function () {

    $.getJSON("http://localhost/tale_of_valhalla/tale_of_valhalla_admin/charts/users_per_month", function (data) {
        var months = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];

        Morris.Area({
            element: 'users-per-month',
            data: data,
            xkey: 'date',
            ykeys: ['users'],
            labels: ['Usuários'],
            lineColors: ["#7E9D3A"],
            behaveLikeLine: true,
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
});