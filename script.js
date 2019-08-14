$(document).ready(function() {
    
    $('a[id="deleteBtn"]').on('click', function(e) {
        e.preventDefault()
        var itemId = $(this).attr('data')
        var itemName = $(this).attr('accname')
        var message = "Deseja deletar o item => " + itemName +"?"
        if (confirm(message)) {
            window.location.replace('delete.php?id='+itemId)
        }
    });
});
