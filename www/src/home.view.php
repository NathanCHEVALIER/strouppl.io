<?php
include_once('header.php');
?>

    <section id="connect">
        <h2>
            Connection
        </h2>
        <form method="post" action="/user/connect">
            <label for="username" value="Votre nom d'utilisateur" >Votre nom d'utilisateur</label>
            <input type="text" name="username" />
            <label for="password" value="" >Votre mot de passe</label>
            <input type="password" name="password" />

            <input type="submit" value="Se connecter" class="button"/>
        </form>
    </section>

<?php
include_once('footer.php');
?>