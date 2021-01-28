<?php if (!defined('RII_CORE_INCLUDED')) die; ?>

<div class="header--menuList">
    <? foreach ($result["data"] as $key => $menu): ?>
        <a href="<?= $menu["link"] ?>"
           class="item js-click-section"
           data-click="<?= $menu["params"]["data-click"] ?>"><?= $menu["title"] ?></a>
    <? endforeach; ?>
</div>


