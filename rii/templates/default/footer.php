<?php if (!defined('RII_CORE_INCLUDED')) die; ?>

<? self::getInstance()->includeComponent("rii:element.list", "footer", ['data_type' => 'json', 'data_file' => '/rii/db/menu.json']); ?>
</body>
 </html>