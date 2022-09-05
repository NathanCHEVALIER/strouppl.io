<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: /');
    exit();
}

if (isset($_POST['oldpassword']) && isset($_POST['newpassword']) && isset($_POST['reppassword'])) {
    $oldpassword = htmlspecialchars($_POST['oldpassword']);
    $newpassword = htmlspecialchars($_POST['newpassword']);
    $reppassword = htmlspecialchars($_POST['reppassword']);
    $count = 0;

    if ($newpassword === $reppassword) {
        $bdd = new PDO('mysql:host=db;port=3306;dbname=strouppl;charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $req = $bdd->prepare("UPDATE users SET password = :newpassword WHERE BINARY username = :username AND BINARY password = :oldpassword");
        $req->execute(array('newpassword' => $newpassword, 'username' => $_SESSION['username'], 'oldpassword' => $oldpassword));
        $count = $req->rowCount();
    }
}

include_once('header.php');
?>

    <section id="connect">
        <h2>
            <?php
            if ($count == 1) {
                echo 'Updated sucesfully';
            }
            else if (isset($_POST['newpassword']) && $count == 0) {
                echo 'Update failed';
            }
            else {
                echo 'Change password:';
            }
            ?>
        </h2>
        <form method="post" action="/user/password">
            <label for="oldpassword" value="" >Mot de passe actuel</label>
            <input type="password" name="oldpassword" />
            <label for="newpassword" value="" >Nouveau mot de passe</label>
            <input type="password" name="newpassword" />
            <label for="reppassword" value="" >Répétition du mot de passe</label>
            <input type="password" name="reppassword" />

            <input type="submit" value="Enregistrer" class="button"/>
        </form>
    </section>

<?php
include_once('footer.php');
?>