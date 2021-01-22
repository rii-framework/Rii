<?php if (!defined('RII_CORE_INCLUDED')) die; 

foreach ($result["data"] as $data) { ?>
    <div class="price--item">
        <div class="content--wrap">
            <div class="description"><?= $data["description"]; ?></div>
            <div class="price">ОТ <span class="number"><?= $data["price"]; ?></span> БЕЛ.РУБ.</div>
        </div>
    </div>
<? } ?>


