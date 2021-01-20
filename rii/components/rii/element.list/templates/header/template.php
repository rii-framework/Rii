<?php if (!defined('RII_CORE_INCLUDED')) die; ?>


<section class="s-section section-black section--index" data-section="index-section">
    <div class="header--menuList">
<?php for ($i = 0; $i <= count($result); $i++) {
   echo "<a href=\"" .  $result["data"][$i]["link"] . "\""
       . "class=\"item js-click-section\""
       . "data-click=\"" . $result["data"][$i]["params"]["data-click"] . "\"" . ">"
       . $result["data"][$i]["title"] . "</a>";
} ?>
    </div>
</section>