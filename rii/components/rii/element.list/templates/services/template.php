<?php if (!defined('RII_CORE_INCLUDED')) die; ?>

<section class="s-section section-white" data-section="services-section">
    <div class="container">
        <h2>Основные услуги</h2>
        <div class="servicesList">
            <? foreach ($result["data"] as $data) : ?>
                <a href="<?= $data["link"]; ?>" class="servicesList--item">
                    <div class="content--wrapp">
                        <div class="content">
                            <div class="b-icon"><img src="/img/<?= $data["img"]; ?>" alt=""></div>
                            <div class="caption"><?= $data["caption"]; ?></div>
                            <p><?= $data["text"]; ?></p>
                        </div>
                        <div class="content--hidden">
                            <div class="text">Записаться на услугу</div>
                            <div class="arrows"><img src="/img/services--arrows.png" alt=""></div>
                        </div>
                    </div>
                </a>
            <? endforeach; ?>
        </div>
        <a href="#" class="button-standart volume js-click-popup" data-click="call-back">Узнать обо всех услугах</a>
    </div>
</section>