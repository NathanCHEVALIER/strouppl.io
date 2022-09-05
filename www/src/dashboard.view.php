<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: /');
    exit();
}

include_once('header.php');
?>

    <section id="dashboard">
        <h2>
            <?php echo "Hello " . $_SESSION["username"]; ?>
        </h2>
        <img src="/src/img/dashboard.png" alt="" />
    </section>

<?php
include_once('footer.php');
?>