<?php
session_start();

if ($_SESSION['isConnected'] && !isset($_GET["action"]) || (isset($_GET["action"]) && htmlspecialchars($_GET["action"]) !== "disconnect")) {
    header('Location: /dashboard/');
    exit();
}
else if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $bdd = new PDO('mysql:host=db;port=3306;dbname=strouppl;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare("SELECT * FROM users WHERE BINARY username = '" . $username . "' AND BINARY password = '" . $password . "'");
    $req->execute();

    $data = $req->fetch();
    $count = $req->rowCount();

    if (isset($count) && $count == 1) {
        $_SESSION['isConnected'] = true;
        $_SESSION['username'] = $data['username'];
        header('Location: /dashboard/');
        exit();
    }
    else {
        session_destroy();
        include_once('home.view.php');
    }
}
else if (isset($_GET["action"]) && htmlspecialchars($_GET["action"]) === "disconnect") {
    session_destroy();
    include_once('home.view.php');
}
else {
    if (isset($_SESSION['username'])) {
        session_destroy();
    }
    include_once('home.view.php');
}

?>