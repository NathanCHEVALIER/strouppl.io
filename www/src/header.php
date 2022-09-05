<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Stroupl.io" />
    <meta name="keywords" content="Stroupl.io" />
    <meta name="author" content="Nathan Chevalier & Alan Gueret - Stroople Lab" />
    <meta name="theme-color" content="#09025f" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Strouppl.io</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="icon" type="/image/png" href="/img/favicon.png" />
    <link rel="stylesheet" href="/src/css/style.css" />
</head>
<body class="">
    <header>
        <img src="/src/img/logo.png" alt="" />
        <div>
            <form method="get" action="/search" id="search">
                <input type="text" placeholder="Search..." name="search" />
                <input type="submit" value="" />
            </form>
            <?php 
            if (isset($_SESSION['isConnected'])) {
                echo '<div id="profileBtn"></div>';
            }
            ?>
        </div>
    </header>
    <?php
    if (isset($_SESSION['isConnected'])) {
        echo '<div id="menu" class="hidden"><a href="/user">Mon Profil</a><a href="/user/password">Changer mon mot de passe</a><a href="/user/disconnect">Se déconnecter</a></div>';
    }
    ?>