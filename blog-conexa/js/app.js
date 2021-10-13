$(document).ready(function() {
    $('.date').mask('00/00/0000');
    $('.phone').mask('(00) 00000-0000');

    $('#inputSearch').keyup(function() {
        if($(this).val().trim() == ''){
            $('#btnSearch').attr('disabled', true);
        } else {
            $('#btnSearch').attr('disabled', false);
        }
 
    })

    $('#Comentario_texto').keyup(function(){
        if($(this).val().trim() == ''){
            $('#btnComentar').attr('disabled', true);
        } else {
            $('#btnComentar').attr('disabled', false);
        }
    })
});

function excluirComentario(comentarioId) {
    let url = "index.php?r=comentario/excluir&id=" + comentarioId;
    $('#modalExcluirTitulo').html('Excluir comentário?');
    $('#modalExcluir').modal('show');
    $('#modalBtnExcluir').attr('href', url);
}

function excluirPostagem(postagemId) {
    let url = "index.php?r=post/excluir&id=" + postagemId;
    $('#modalExcluirTitulo').html('Tem certeza que deseja excluir esse post?');
    $('#modalExcluir').modal('show');
    $('#modalBtnExcluir').attr('href', url);
}