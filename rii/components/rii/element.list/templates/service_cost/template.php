<?php if (!defined('RII_CORE_INCLUDED')) die; ?>

<section class="s-section section-white" data-section="price-section">
    <div class="container">
        <h2>СТОИМОСТЬ УСЛУГ</h2>
        <div class="price--wrapp js-price-block">
            <? foreach ($result["data"] as $data) : ?>
                <div class="price--item">
                    <div class="content--wrap">
                        <div class="description"><?= $data["description"]; ?></div>
                        <div class="price">ОТ <span class="number"><?= $data["price"]; ?></span> БЕЛ.РУБ.</div>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
        <a href="#" class="button-standart volume js-click-more button-more">Посмотреть еще</a>
        <a href="#" class="button-standart volume js-click-popup button-hidden" data-click="call-back">Заказать
            звонок</a>
    </div>
</section>