<?php
include 'rii/init.php';

use Rii\Core\Application;

$app = Application::getInstance();
$path = $app::getInstance()->getTemplatePath();

?>
    <script type="text/javascript" src="<?= $path; ?>/libs/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?= $path; ?>/libs/slick/slick.min.js"></script>
    <script type="text/javascript" src="<?= $path; ?>/libs/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="<?= $path; ?>/js/main.js"></script>
</body>
 </html>