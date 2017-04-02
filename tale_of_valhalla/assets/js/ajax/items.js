var url = window.location.href;

if (url.includes('items')) {
    $(document).ready(function () {

        $('.rarity').popover({
            html: true,
            trigger: 'hover',
            placement: 'right',
            content: function () {
                return '<strong>Raridade de Items: </strong> <br>\n\
                    <img src="./icons/commom.png" width="20px" height="20px"/> Comum <br>\n\
                    <img src="./icons/rare.png" width="20px" height="20px" /> Raro <br>\n\
                    <img src="./icons/epic.png" width="20px" height="20px" /> Épico <br>\n\
                    <img src="./icons/legendary.png" width="20px" height="20px" /> Lendário';
            }
        });

        $('.buy-button').click(function () {
            if ($('.buy-button').is('disabled')) {
                alert("Adwa");
            
                $('.buy-button').popover({
                    trigger: 'hover',
                    placement: 'top',
                    content: 'Você não tem Ouro ou Gemas suficientes para comprar este item'
                });
            }
        });
    });

}