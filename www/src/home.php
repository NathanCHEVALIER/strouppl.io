<?php
include_once('header.php');
?>

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