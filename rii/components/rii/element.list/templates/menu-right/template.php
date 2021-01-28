<?php if (!defined('RII_CORE_INCLUDED')) die; ?>

<div class="fixed-menu">
    <div class="sectionMenu">
        <ul class="sectionMenu--list">
            <? foreach ($result["data"] as $key => $menu): ?>
                <li class="">
                    <a href="<?= $menu["link"] ?>"
                       title="<?= $menu["title"] ?>"
                       class="sectionMenu--item js-click-section"
                       data-click="<?= $menu["params"]["data-click"] ?>"></a></li>
            <? endforeach; ?>
        </ul>
    </div>
</div>
