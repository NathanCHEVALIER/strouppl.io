<?php
include_once('header.php');
?>
    <section id="search">
        <h2>
        <?php
        if (isset($count) && $count == 0) {
            echo "Any results for: '" . $search . "'";    
        }
        elseif (isset($count)) {
            echo $count . " results for: '" . $search . "'";
        } 
        else {
            echo "An error occured";
        }?>
        </h2>
        <?php
        if (isset($count)) {
            for ($i = 0; $i < $count; $i++) {
                echo '<div id="article"><h3>' . $data[$i]["title"] . " - " . $data[$i]["author"] . "</h3><br>" . $data[$i]["content"] . "</div>";
            }
        } 
        ?>
    </section>

<?php
include_once('footer.php');
?>