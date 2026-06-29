<?php

$arquivos = scandir(__DIR__ . "/../../public/static/imgs/"); ?>
<div id="midias">
    <?php foreach ($arquivos as $arquivo) {
        if (is_dir($arquivo)) {
            continue;
        } ?>

    <img src="<?php echo "/static/imgs/" . $arquivo; ?>" alt="" width="80">

    <?php
    } ?>
</div>
