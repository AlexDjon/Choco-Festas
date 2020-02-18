<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title><?= SITE_NAME ?> - Login</title>

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
</head>
<body>
    <article class='login'>
        <form method='POST' action='?a=login'>
            <img src='<?= SITE_IMAGES ?>logo.png' alt='Logo.png'>
            <input type='password' name='senha' placeholder='Senha'>
            <input type='submit' value='Acessar'>
        </form>
    </article>
</body>
</html>