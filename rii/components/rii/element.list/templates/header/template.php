<?php if (!defined('RII_CORE_INCLUDED')) die; ?>

<section class="s-section section-black section--index" data-section="index-section">
    <div class="header--wrap-info js-mobile-block">
        <button class="close js-close-menu"></button>
        <div class="header--menuList">
            <?php for ($i = 0; $i <= count($result); $i++) {
               echo "<a href=\"" .  $result["data"][$i]["link"] . "\""
                   . "class=\"item js-click-section\""
                   . "data-click=\"" . $result["data"][$i]["params"]["data-click"] . "\"" . ">"
                   . $result["data"][$i]["title"] . "</a>";
            } ?>
        </div>
    <div class="header--infoWrap">
        <div class="phone--info">
            <a href="<? echo \Rii\Core\Config::get("PHONE/NUMBER") ?>" class="phone">+375 (29) <span>603 92 91</span></a>
            <div class="time">Ежедневно, с 8.00 до 21.00</div>
        </div>
        <button class="button-standart js-click-popup" data-click="call-back">Заказать звонок</button>
    </div>
    </div>
        <ul class="sectionMenu--list">
            <?php for ($i= 0; $i < count($result["data"]); $i++) {
                $arr = array_keys($result['data'][$i]);
            if ($arr[0] == "title-menu-list" )
            {
                echo  " <li class=\"active-link-menu\"> <a href=\"" .  $result["data"][$i]["link"] . "\"" .
                    "title=\"" .  $result["data"][$i]["title-menu-list"] . "\"" .
                    "class=\"sectionMenu--item js-click-section\""
                    . "data-click=\"" . $result["data"][$i]["params"]["data-click"] . "\"" . ">"
                    . "</a></li>";
            }}?>
        </ul>
    </div>
</section>

<h1>Какой-то текст</h1>





