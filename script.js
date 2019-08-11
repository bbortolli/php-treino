$(document).ready(function() {
    
    $('a[id="deleteBtn"]').on('click', function(e) {
        e.preventDefault()
        var itemId = $(this).attr('data')
        var message = "Deseja deletar item de id = " + itemId +"?"
        if (confirm(message)) {
            window.location.replace('delete.php?id='+itemId)
        }
    });
});
