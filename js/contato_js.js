function Contato_refreshCaracters() {
    var tamanho = $('#mensagem').val().length;
    document.getElementById('contador').innerHTML = (200 - tamanho) + ' Restantes';
}

function Contato_addMensagem() {
    Contato_SetLoading(true);
    $.ajax({
        url: 'contato_ajax.php',
        type: 'post',
        dataType: 'html',
        data: {
            'metodo': 'AddMensagem',
            'nome': $('#form_contato #nome').val(),
            'email': $('#form_contato #email').val(),
            'mensagem': $('#form_contato #mensagem').val()
        }
    }).done(function (data) {
        Contato_SetLoading(false);
        $('#msg').html(data);
        $('#form_contato #nome').val('');
        $('#form_contato #email').val('');
        $('#form_contato #mensagem').val('');
        Contato_refreshCaracters();
    });
}

function Contato_SetLoading(loading) {
    if (loading === true) {
        $('#contato #loading').show();
        $('#contato #loaded').hide();
    } else {
        $('#contato #loading').hide();
        $('#contato #loaded').show();
    }
}