<?php if (!defined('RII_CORE_INCLUDED')) die; 

foreach ($result["data"] as $data) { ?>           
    <div class="auto--item"><div class="image"><img src="/img/brands/<?= $data["img"]; ?>" alt="<?= $data["name"]; ?>"></div></div>
<? } ?>


