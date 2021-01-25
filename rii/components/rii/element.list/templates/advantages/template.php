<?php if (!defined('RII_CORE_INCLUDED')) die; 

foreach ($result["data"] as $key => $data) { ?>
    <div class="slider--item" style="background-image: url('/img/<?= $data["img"]; ?>')">
        <div class="number">0<?= $key + 1; ?></div>
        <div class="content">
            <div class="caption"><?= $data["caption"]; ?></div>
            <div class="text"><?= $data["text"]; ?></div>
        </div>
    </div>
<? } ?>


