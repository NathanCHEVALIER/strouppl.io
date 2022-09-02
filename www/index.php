<?php

echo 'Hello World! <br />';

$username = "' OR true; --";
$password = 'admin';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
}

$bdd = new PDO('mysql:host=db;port=3306;dbname=strouppl;charset=utf8', 'root', 'root');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req = $bdd->prepare("SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . $password . "'");
$req->execute();

while($data = $req->fetch()){
    echo $data['username'] . ' - ' . $data['password'] . ' : ' . $data['email'] . '<br />';
}

//echo phpinfo();

?>