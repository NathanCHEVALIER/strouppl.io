<?php

$username = "";
$password = "";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
}

$bdd = new PDO('mysql:host=db;port=3306;dbname=strouppl;charset=utf8', 'root', 'root');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req = $bdd->prepare("SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . $password . "'");
$req->execute();

$data = $req->fetch();
$count = $req->rowCount();

include_once('home.php');

?>