<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Stroupl.io" />
    <meta name="keywords" content="Stroupl.io" />
    <meta name="author" content="Nathan Chevalier & Alan Gueret - Stroople Lab" />
    <meta name="theme-color" content="#09025f" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Stroupl.io</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="icon" type="/image/png" href="/img/favicon.png" />
    <link rel="stylesheet" href="/src/css/style.css" />
</head>
<body class="">
    <header>
        <img src="/src/img/logo.png" alt="" />
    </header>

    <section id="connect">
        <h2>
        <?php
        if (isset($count) && $count == 1) {
            echo "Hello " . $data["username"];    
        }
        else {
            echo 'Connection';
        } ?>
        </h2>
        <form method="post" action="index.php">
            <label for="username" value="Votre adresse mail" >Votre adresse mail</label>
            <input type="text" name="username" />
            <label for="password" value="" >Votre mot de passe</label>
            <input type="password" name="password" />

            <input type="submit" value="Se connecter" class="button"/>
        </form>
    </section>

</body>
</html>