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

    });

}