<?php if (!defined('RII_CORE_INCLUDED')) die; ?>

<section class="s-section section-white section-reviews" data-section="reviews-section">
    <div class="container">
        <h2>Отзывы</h2>
        <div class="reviews--wrapp">
            <div class="js-slider-reviews reviews--slider">
            <? foreach ($result["data"] as $data) : ?>
                <div class="reviews--item">
                    <div class="content--wrap">
                        <div class="content">
                            <div class="caption"><?= $data["caption"]; ?></div>
                            <div class="list--performance">
                            <? foreach ($data["list"] as $item) : ?>
                                <div class="item">
                                    <div class="image">
                                        <img src="/img/<?= $item["img"]; ?>" alt="">
                                    </div>
                                    <div class="text">
                                        <?= $item["title"]; ?>
                                        <span><?= $item["subtitle"]; ?></span>
                                    </div>
                                </div>
                            <? endforeach; ?>
                            </div>
                            <div class="reviews--description">
                                <div class="title">Отзыв клиента:</div>
                                <?= $data["description"]; ?>
                            </div>
                        </div>
                        <div class="block--hidden">
                            <div class="assessment">
                                <div class="text">Оценка работы:</div>
                                <div class="star--list">
                                <? echo str_repeat("<div class=\"item active\"></div>", $data["star"]);
                                echo str_repeat("<div class=\"item\"></div>", 5 - $data["star"]); ?>
                                </div>
                            </div>
                            <div class="name"><?= $data["author"]; ?></div>
                        </div>
                    </div>
                </div>
            <? endforeach; ?>
            </div>
        </div>
    </div>
</section>