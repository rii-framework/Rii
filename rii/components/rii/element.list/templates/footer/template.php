<?php if (!defined('RII_CORE_INCLUDED')) die; ?>

<section class="s-section section-black section-footer">
    <footer class="footer">
        <div class="footer--wrapp">
            <div class="footer--menuList">
                <? for ($i = 0; $i <= count($result); $i++) {
                    echo "<div class='item'>" . "<a href=\"" .  $result["data"][$i]["link"] . "\""
                        . "class=\"item js-click-section\""
                        . "data-click=\"" . $result["data"][$i]["params"]["data-click"] . "\"" . ">"
                        . $result["data"][$i]["title"] . "</a>" . "</div>";
                } ?>
            </div>
            <div class="phone--info">
                <a href="<? echo \Rii\Core\Config::get("PHONE/NUMBER") ?>" class="phone">+375 (29) <span>603 92 91</span></a>
                <div class="time">Ежедневно, с 8.00 до 21.00</div>
            </div>
        </div>
    </footer>
</section>

