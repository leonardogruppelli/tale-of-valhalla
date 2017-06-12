var url = window.location.href;

$(document).ready(function () {
    
    var year = new Date().getFullYear();
    
    $('.users-box').append("<h3 class='box-title'>Usuários Cadastrados por Mês em " + year + "</h3>");
    $('.charts').append("<div id='users-per-month-" + year + "' style='height: 250px'></div>");
      
    $.getJSON("http://localhost/tale_of_valhalla/tale_of_valhalla_admin/charts/users_per_month", {year: year}, function (data) {
        var months = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"];

        Morris.Area({
            element: 'users-per-month-' + year,
            data: data,
            xkey: 'month',
            ykeys: [year, year - 1],
            labels: [year, year - 1],
            lineColors: ['#72C1F9', '#EF5858'],
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
});