<?php if (!defined('RII_CORE_INCLUDED')) die; ?>

<section class="s-section section-black section-footer">
    <footer class="footer">
        <div class="container">
            <div class="footer--wrapp">
                <div class="footer--logo">
                    <a href="#" class="logo--link"><img src="<?= '/img/ELCAR24.png' ?>" alt=""></a>
                    <div class="text">Автоэлектрик с выездом к клиенту</div>
                </div>
                    <? self::getInstance()->includeComponent("rii:element.list", "menu-bot", ['data_type' => 'json', 'data_file' => '/rii/db/menu-bot.json']); ?>
                <div class="phone--info">
                    <a href="tel:+<?= \Rii\Core\Config::get("PHONE/NUMBER"); ?>" class="phone"><?= vsprintf("+%s%s%s (%s%s) <span>%s%s%s %s%s %s%s</span>", str_split(\Rii\Core\Config::get("PHONE/NUMBER"))); ?></a>
                    <div class="time">Ежедневно, с 8.00 до 21.00</div>
                </div>
            </div>
        </div>
        <div class="footer--subscription">
            <div class="container">
                <div class="wrapp">
                    <div class="item left">
                        Мы в социальных сетях
                        <div class="list--social">
                            <a href="#" class="social--link vk"></a>
                        </div>
                    </div>
                    <div class="item center">ИП Фамилия И.О., УНП 3432678 свидетельство №456 выдано 21.09.2014г.</div>
                    <div class="item right">© 2019 Автоэлектрик Минск выезд</div>
                </div>
            </div>
        </div>
    </footer>
</section>

<?
Rii\Core\Page::getInstance()->addJs(self::getInstance()->getTemplatePath() . '/libs/slick/slick.min.js');
Rii\Core\Page::getInstance()->addJs(self::getInstance()->getTemplatePath() . '/libs/jquery.maskedinput.js');
Rii\Core\Page::getInstance()->addJs(self::getInstance()->getTemplatePath() . '/js/main.js');
Rii\Core\Page::getInstance()->showJs(); ?>

</body>
</html>