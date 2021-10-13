$(document).ready(function() {
    $('.date').mask('00/00/0000');
    $('.phone').mask('(00) 00000-0000');
});

function excluirComentario(comentarioId) {
    let url = "index.php?r=comentario/delete&id=" + comentarioId;
    $('#modalExcluirTitulo').html('Excluir comentário?');
    $('#modalExcluir').modal('show');
    $('#modalBtnExcluir').attr('href', url);
}

function excluirPostagem(postagemId) {
    let url = "index.php?r=post/delete&id=" + postagemId;
    $('#modalExcluirTitulo').html('Tem certeza que deseja excluir esse post?');
    $('#modalExcluir').modal('show');
    $('#modalBtnExcluir').attr('href', url);
}