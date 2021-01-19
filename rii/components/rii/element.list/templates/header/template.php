<?php if (!defined('RII_CORE_INCLUDED')) die; ?>


<div class="header--menuList">
<?php for ($i = 0; $i <= count($result); $i++) {
   echo "<a href=\"" .  $result["data"][$i]["link"] . "\""
       . "class=\"item js-click-section\""
       . "data-click=\"" . $result["data"][$i]["params"]["data-click"] . "\"" . ">"
       . $result["data"][$i]["title"] . "</a>";
} ?>
</div>
