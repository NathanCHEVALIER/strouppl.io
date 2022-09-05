<?php

$search = "";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

$bdd = new PDO('mysql:host=db;port=3306;dbname=strouppl;charset=utf8', 'root', 'root');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req = $bdd->prepare("SELECT * FROM articles WHERE title LIKE '%" . $search . "%' OR content LIKE '%" . $search . "%'");
$req->execute();

$data = $req->fetchAll();
$count = $req->rowCount();

include_once('search_view.php');

?>