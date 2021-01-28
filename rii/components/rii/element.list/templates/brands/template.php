<?php if (!defined('RII_CORE_INCLUDED')) die; ?>

<section class="s-section section-grey section--auto" data-section="auto-section">
    <div class="container">
        <h2>автомобили</h2>
        <div class="auto--description">Наши мастера – автотехники, оборудованы нужным инструментом и дилерским
            оборудованием для всех марок автомобилей
        </div>
        <div class="auto--wrap">
            <div class="js-slider-auto auto--slider">
                <? foreach ($result["data"] as $data) : ?>
                    <div class="auto--item">
                        <div class="image"><img src="/img/brands/<?= $data["img"]; ?>" alt="<?= $data["name"]; ?>">
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    </div>
</section>