<?php if (!defined('RII_CORE_INCLUDED')) die; ?>

<section class="s-section section-black">
    <div class="container">
        <h2>Что необходимо знать</h2>
        <div class="need--list">
            <? foreach ($result["data"] as $key => $data) : ?>
                <div class="need--item">
                    <div class="number">0<?= $key + 1; ?></div>
                    <div class="content"><?= $data["content"]; ?></div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</section>

