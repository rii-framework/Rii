<?php if (!defined('RII_CORE_INCLUDED')) die; 

foreach ($result["data"] as $data) { ?>
    <div class="reviews--item">
        <div class="content--wrap">
            <div class="content">
                <div class="caption"><?= $data["caption"]; ?></div>
                <div class="list--performance">
                <? foreach ($data["list"] as $item) { ?>
                    <div class="item">
                        <div class="image">
                            <img src="/img/<?= $item["img"]; ?>" alt="">
                        </div>
                        <div class="text">
                            <?= $item["title"]; ?>
                            <span><?= $item["subtitle"]; ?></span>
                        </div>
                    </div>
                <? } ?>
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
                    <? for ($i=0; $i < 5; $i++) { 
                        if ($i < $data["star"]) { ?>
                            <div class="item active"></div>
                        <? } else { ?>
                            <div class="item"></div>
                        <? }   
                    } ?>
                    </div>
                </div>
                <div class="name"><?= $data["author"]; ?></div>
            </div>
        </div>
    </div>
<? } ?>


