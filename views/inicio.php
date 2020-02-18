<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title><?= SITE_NAME ?> - Início</title>

    <!-- Meta tags -->
    <meta name="author" content="Alex Djonata - htps://github.com/AlexDjonata">
    <meta name="description" content="Sistema de Anotações de Pedidos, utilizando JavaScript e ajax para fazer requisições no Php - Feito para um amigo.">
    <meta name="keywords" content="alex djonata, chocofestas, choco, festas">
    <meta name="copyright" content="© 2020 Alex Djonata">
    <meta name="theme-color" content="#4DD3AF">
    <meta name="robots" content="index, follow">
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!-- Links -->
    <link rel='shortcut icon' href='<?= SITE_IMAGES ?>favicon.png'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='<?= SITE_CSS ?>main.css?version=<?= rand(1,500) ?>'>
    <link rel='stylesheet' href='<?= SITE_CSS ?>responsive.css?version=<?= rand(1,500) ?>'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js'></script>
    <script src='<?= SITE_JS ?>main.js?version=<?= rand(51,100) ?>'></script>
    <script src='<?= SITE_JS ?>functions.js?version=<?= rand(51,100) ?>'></script>
    
</head>
<body>
    <!-- CABEÇALHO -->
    <header class='cabecalho'>
        <div class='cabecalho-logo'>
            <a href='?a=logout' title='Sair'><i class='material-icons'> arrow_back </i></a>
            <a href='<?= SITE_DOMAIN ?>'><img src='<?= SITE_IMAGES ?>logo.png' alt='<?= SITE_NAME ?>'></a>
        </div>
        <div class='cabecalho-pesquisa'>
            <div>
                <input type='text' name='pesquisa' placeholder='Pesquisar' id='pesquisa'>
                <button id='pesquisar-btn'> <i class='material-icons'>search</i> </button>
            </div>
            <select id='filtro'>
                <option value='aD'>Todos</option>
                <option value='dD'>Data +</option>
                <option value='dC'>Data -</option>
                <option value='cD'>Cliente +</option>
                <option value='cC'>Cliente -</option>
                <option value='nD'>Telefone +</option>
                <option value='nC'>Telefone -</option>
                <option value='tD'>Tema +</option>
                <option value='tC'>Tema -</option>
            </select>
        </div>
    </header>

    <!-- LISTA -->
    <main class='pedidos'>
        <article class='pedidos-lista pedidos-titulo'>
            <div id='p-15'> DATA </div>
            <div id='p-25'> CLIENTE </div>
            <div id='p-20'> TELEFONE </div>
            <div id='p-25'> TEMA </div>
            <div id='p-15'> PEDIDO </div>
        </article>
        <!------------------------------------------>
        <div id='lista'>
        </div>        
    </main>

    <!-- Adicionar pedido -->
    <aside class='add'>
        <button id='add' onclick='popup.preparar()'><i class='material-icons'> add </i></button>
    </aside>

    <!-- Pop-Up -->
    <aside class='popup'>
        <header class='popup-header'>
            <div class='popup-header-i'> 
                <h3 class='popup-header-i-date'> <?= date('d/m/Y'); ?> </h3>
                <div class='popup-header-i-btns'>
                    <button id='edit' onclick='pedidos.criarEditar()'> Salvar </button>
                    <button id='delete' onclick='pedidos.deletar()'> Deletar </button>
                </div>
                <select class='popup-header-i-edit'>
                    <option value='on'> Não Editar </option>
                    <option value='off'> Editar </option>
                </select>
            </div>
            <button id='close' onclick='popup.visivel(0)'>
                <i class='material-icons'> close </i>
            </button>
        </header>
        <form class='popup-main'>
            <div class='popup-50'>
                <h3> cliente </h3>
                <input type='text' id='p-cliente' maxlength='30'>
            </div>
            <div class='popup-50'>
                <h3> telefone </h3>
                <input type='text' id='p-telefone' maxlength='15'>
            </div>
            <div class='popup-50'>
                <h3> nome </h3>
                <input type='text' id='p-nome' maxlength='30'>
            </div>
            <div class='popup-25'>
                <h3> idade </h3>
                <input type='text' id='p-idade' maxlength='3'>
            </div>
            <div class='popup-25'>
                <h3> data </h3>
                <input type='text' id='p-data_evento' maxlength='10'>
            </div>
            <div class='popup-100'>
                <h3> tema </h3>
                <input type='text' id='p-tema' maxlength='50'>
            </div>
            <div class='popup-100'>
                <h3> endereço </h3>
                <input type='text' id='p-endereco' maxlength='60'>
            </div>
            <div class='popup-100'>
                <h3> dados </h3>
                <textarea name='dados' rows='4' id='p-dados' maxlength='350'></textarea>
            </div>
            <input type='hidden' id='p-id' value='0'>
            <input type='hidden' id='p-action'>
        </form>
    </aside>
</body>
</html>