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
            <?php echo "Change password: " . $_SESSION["username"]; ?>
        </h2>
    </section>

<?php
include_once('footer.php');
?>