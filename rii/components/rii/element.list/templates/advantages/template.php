<?php if (!defined('RII_CORE_INCLUDED')) die; ?>

<section class="s-section section-black" data-section="advantages-section">
    <div class="container">
        <h2>Преимущества</h2>
    </div>
    <div class="slider--wrapp">
        <div class="js-slider slider--block">
            <? foreach ($result["data"] as $key => $data) : ?>
                <div class="slider--item" style="background-image: url('/img/<?= $data["img"]; ?>')">
                    <div class="number">0<?= $key + 1; ?></div>
                    <div class="content">
                        <div class="caption"><?= $data["caption"]; ?></div>
                        <div class="text"><?= $data["text"]; ?></div>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</section>