<?php if (!defined('RII_CORE_INCLUDED')) die; 

foreach ($result["data"] as $data) { ?>
    <a href="<?= $data["link"]; ?>" class="servicesList--item">
        <div class="content--wrapp">
            <div class="content">
                <div class="b-icon"><img src="<?= $result["path"] . "/img/" . $data["img"]; ?>" alt=""></div>
                <div class="caption"><?= $data["caption"]; ?></div>
                <p><?= $data["text"]; ?></p>
            </div>
            <div class="content--hidden">
                <div class="text">записаться на услугу</div>
                <div class="arrows"><img src="<?= $result["path"] ?>/img/services--arrows.png" alt=""></div>
            </div>
        </div>
    </a>
<? } ?>


