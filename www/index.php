<?php

echo 'Hello World! <br />';

$username = 'user';
$password = 'username';

if (isset($_GET['username']))
    $username = $_GET['username'];

$bdd = new PDO('mysql:host=db;port=3306;dbname=strouppl;charset=utf8', 'root', 'root');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req = $bdd->prepare("SELECT * FROM users");//WHERE username = 'samuel' AND password = 'password123'");
$req->execute();

while($data = $req->fetch()){
    echo $data['username'] . ' - ' . $data['password'] . '<br />';
}

//echo phpinfo();

?>