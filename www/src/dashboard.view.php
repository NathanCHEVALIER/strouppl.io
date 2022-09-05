<?php
include_once('header.php');
?>

    <section id="dashboard">
        <h2>
            <?php echo "Hello " . $data["username"]; ?>
        </h2>
        <img src="/src/img/dashboard.png" alt="" />
    </section>

<?php
include_once('footer.php');
?>