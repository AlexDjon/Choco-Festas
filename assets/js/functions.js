const pedidos = {
    listar: function() {
        const dados = {pesquisa: $('#pesquisa').val(), filtro: $('#filtro').val(), rows: 30}        
        const indiceRows = dados.pesquisa.indexOf('tt:')

        if(indiceRows > -1) {
            let num = dados.pesquisa.substring(indiceRows+3,indiceRows+5)      
            num = isNaN(num) ? 30 : num > 0 ? num : 30;
            dados.rows = num
            console.log(`Listando ${num} pedido(s)`)

            // Apagar da pesquisa
            const del = dados.pesquisa.substring(indiceRows,indiceRows+5)
            dados.pesquisa = dados.pesquisa.replace(del, '')
        }

        const local = encodeURI(`includes/server.php?a=listar&pesquisa=${dados.pesquisa}&filtro=${dados.filtro}&rows=${dados.rows}`)
        const action = jQuery.get(local, function(data) {
            pedidos.limparPedidos()
            try {
                const retorno = JSON.parse(data)
                console.log(`Encontrado ${retorno.length} pedido(s)`)
                for(i in retorno) {
                    pedidos.renderizar(retorno[i])
                }
                pedidos.conferir()
            } catch {
                console.log('Ocorreu um erro na listagem')
            }
        })
    },
    renderizar: function(dados) {
        const html = `
        <article class='pedidos-lista'>
            <div id='p-15'> ${dados['data_pedido']} </div>
            <div id='p-25'> ${dados['cliente']} </div>
            <div id='p-20'> ${dados['telefone']} </div>
            <div id='p-25'> ${dados['tema']} </div>
            <div id='p-15'> <button onclick='pedidos.retornarUm("${dados['id']}")'> Abrir </button> </div>
        </article>`

        $('.pedidos div#lista').append(html)
    },
    limparPedidos: function() {
        $('.pedidos div#lista').html('')
    },
    conferir: function() {
        const conf = $('.pedidos div#lista').html()
        if(conf == '') {
            const nulo = {data_pedido: 'Nenhum', cliente: 'pedido', telefone: 'encontrado', tema: 'sinto muito :(', id: 0}
            this.renderizar(nulo)
        }
    },
    retornarUm: function(id) {
        id = isNaN(id) ? 0 : id
        if(id) {
            console.log(`Retornando pedido id ${id}`)
            const local = encodeURI(`includes/server.php?a=abrir&id=${id}`)
            const action = jQuery.get(local, function(data) {
                if(data != 0) {
                    popup.abrirPedido(JSON.parse(data))
                } 
                else {
                    alert('Pedido não encontrado!')
                }
            })
        }
    },
    criarEditar: function() {
        const dados = popup.pegarValores()
        if(popup.verificarValores()) {
            let local = 'includes/server.php?a='+dados.action
            for (const [key, value] of Object.entries(dados)) {
                if(key != 'action')
                    local += `&${key}=${encodeURI(value)}`  
            }
            const action = jQuery.get(local, function(data) {
                switch(data) {
                    case '0':
                        alert('Pedido não editado!')
                        break
                    case '1':
                        alert('Pedido editado com sucesso!')
                        popup.visivel(0)
                        break
                    case '2':
                        alert('Pedido não adicionado!')
                        break
                    case '3':
                        alert('Pedido adicionado com sucesso!')
                        popup.visivel(0)
                        break
                }
                pedidos.listar()
            })
        }
        else {
            alert('Preencha os campos corretamente!')
        }
    },
    deletar: function() {
        let c = confirm('Tem certeza que deseja apagar esse pedido?')
        if(c == true) {
            let id = $('#p-id').val()
            id = isNaN(id) ? 0 : id
            const local = encodeURI(`includes/server.php?a=delete&id=${id}`)
            const action = jQuery.get(local, function(data) {
                if(data == '1') {
                    alert('Pedido deletado com sucesso!')
                    popup.visivel(0)
                    pedidos.listar()
                }
                else {
                    alert('Pedido não deletado!')
                }
            })
        }
    }
}

//> POPUP
const popup = {
    abrirPedido: function(dados) {        
        $('button#delete').show()
        this.visivel()
        for (const [key, value] of Object.entries(dados)) {
            $(`#p-${key}`).val(value);
        }
        $('.popup-header-i-date').html(dados['data_pedido']);
        $('#p-action').val('edit')
    },
    habilitarEdicao: function() {
        const value = $('.popup-header select').val();
        const status = v => v === 'on' ? true : false;
    
        $('.popup-main input, .popup-main textarea').attr('disabled', status(value))
    
        const log = v => v == false ? 'Edição ligada!' : 'Edição desligada!'
        console.log(log(status(value)))
    },
    visivel: function(v = 1) {
        if(v == 1) {
            $('.popup').fadeIn(500)
        }
        else {
            $('.popup').fadeOut(500)
        }
    },
    limpar: function() {
        $('.popup-main input, .popup-main textarea').val('')
    },
    preparar: function() {
        if($('#p-action').val() != 'save') {
            this.limpar()
        }
        $('.popup-header-i-edit').val('off')
        $('button#delete').hide()
        $('#p-id').val('0')
        $('#p-action').val('save')
        const data = new Date()
        const hoje = data.getDate()+'/'+data.getMonth()+'/'+data.getFullYear()
        $('.popup-header-i-date').html(hoje)

        this.habilitarEdicao()
        this.visivel()
    },
    pegarValores: function() {
        const inputs = ['cliente', 'telefone', 'nome', 'idade', 'data_evento', 'tema', 'endereco', 'dados', 'id', 'action']
        const values = {}
        for(i in inputs) {
            values[inputs[i]] = $(`#p-${inputs[i]}`).val()
        }
        return values;
    },
    verificarValores: function() {
        const dados = this.pegarValores();
        const tamPermitido = {cliente: 30, telefone: 15, nome: 30, idade: 3, data_evento: 10, tema: 50, endereco: 60, dados: 350, id: 3, action: 4}
        let verificar = true;
        for (const [key, value] of Object.entries(dados)) {
            if(key == 'idade' && isNaN(value)) {
                verificar = false
                break
            }
            if(value.length < 1 || value.length > tamPermitido[key]) {
                verificar = false
                alert(`O campo ${key} está errado!`)
                break
            }
        }
        return verificar
    },
    demarcar: function(campos) {
        for (i in campos) {
            $(campos[i][0]).mask(campos[i][1])
        }
    }
}

