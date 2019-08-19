$(document).ready(function() {
    $('#delete-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var value = button.data('ident');
        
        var modal = $(this);
        modal.find('.modal-title').text('Excluir ' + value);
        modal.find('#confirm').attr('href', 'delete.php?id=' + id);
    })

    $('#add-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
    });

    $('.cadd').on('click', function() {
        let acc_id = 'acc_id=' + $("[name='acc_id']").val()
        let value = '&value=' + $("[name='value']").val()
        let type = '&type=' + $("[name='type']").val()
        let date = '&date=' + $("[name='date']").val()
        let description = '&description=' + $("[name='description']").val()
        let category = '&category=' + $("[name='category']").val()
        let params = acc_id+value+type+date+description+category
        console.log(params)
        $.post("add.php", params, function( data ) {
            window.location.assign('/transactions')
        });
    })
});