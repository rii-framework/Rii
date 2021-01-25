<?php if (!defined('RII_CORE_INCLUDED')) die;

    foreach ($result["data"] as $key => $menu )
    { ?>
    <div class='item'>
    <a href="<?= $menu["link"]?>"
       class="link js-click-section"
       data-click="<?= $menu["params"]["data-click"]?>"><?= $menu["title"]?></a>
    </div>
<?
}
?>
