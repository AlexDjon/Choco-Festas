$(document).ready(function() {
    const mask = [
        ['#p-data_evento', '00/00/0000'],
        ['#p-telefone', '(00) 00000-0000'],
        ['#p-idade', '000']
    ]
    
    $('.popup-header select').on('change', function() {
        popup.habilitarEdicao()
    });

    $('#pesquisa, #filtro').on('change', function() { pedidos.listar() });
    $('#pesquisar-btn').on('click',function() { pedidos.listar() })

    popup.demarcar(mask)
    pedidos.listar()
    popup.habilitarEdicao()
});