$(document).ready(function() {
    $('#delete-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var value = button.data('ident')
        var account = $("[name='acc_id']").val()
        
        var modal = $(this)
        modal.find('.modal-title').text('Excluir ' + value)
        //modal.find('#confirm').attr('href', '../transactions/delete.php?id=' + id);
        $('#confirm').on('click', function() {
            $.get("../transactions/delete.php?id=" + id, function(data) {
                console.log(account)
                window.location.assign('/accounts/view.php?id='+account)
            })
        })
    })

    $('#add-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
    });

    $('.cadd').on('click', function() {
        let id = $("[name='acc_id']").val()
        let acc_id = 'acc_id=' + $("[name='acc_id']").val()
        let value = '&value=' + $("[name='value']").val()
        let type = '&type=' + $("[name='type']").val()
        let date = '&date=' + $("[name='date']").val()
        let description = '&description=' + $("[name='description']").val()
        let category = '&category=' + $("[name='category']").val()
        let params = acc_id+value+type+date+description+category
        console.log(params)
        $.post("../transactions/add.php", params, function(data) {
            window.location.assign('/accounts/view.php?id='+id)
        });
    })

    $('input[type=radio][name=filter]').change(function() {
        if (this.value == 'in') {
            $('tr[class=in]').show()
            $('tr[class=out]').hide()
        }
        else if (this.value == 'out') {
            $('tr[class=in]').hide()
            $('tr[class=out]').show()
        }
        else {
            $('tr[class=in]').show()
            $('tr[class=out]').show()
        }
    });

    const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;

    const comparer = (idx, asc) => (a, b) => ((v1, v2) => 
    v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
    )(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

    document.querySelectorAll('th').forEach(th => th.addEventListener('click', (() => {
        const table = th.closest('table');
        Array.from(table.querySelectorAll('tr:nth-child(n+2)'))
            .sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
            .forEach(tr => table.appendChild(tr) );
    })));

    var totalIn = 0;
    var totalOut = 0;
    $('td[class=inAux]').each(function (i, e) {
        value = parseFloat($(this).html())
        totalIn += value
        
    })
    $('td[class=outAux]').each(function (i, e) {
        value = parseFloat($(this).html())
        totalOut -= value
        
    })
    $('span[class=totalr]').text('R$ ' + totalIn);
    $('span[class=totald]').text('R$ ' + totalOut);
});