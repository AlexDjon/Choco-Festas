<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title><?= SITE_NAME ?> - Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
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