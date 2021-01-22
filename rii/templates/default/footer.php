<?php if (!defined('RII_CORE_INCLUDED')) die; ?>

<!--<section class="s-section section-black section-footer">-->
<!--    <footer class="footer">-->
<!--        <div class="footer--wrapp">-->
<!--            <div class="footer--menuList">-->
<!--                --><?// self::getInstance()->includeComponent("rii:element.list", "menu-bot", ['data_type' => 'json', 'data_file' => '/rii/db/menu-bot.json']); ?>
<!--            </div>-->
<!--            <div class="phone--info">-->
<!--                <a href="--><?// echo \Rii\Core\Config::get("PHONE/NUMBER") ?><!--" class="phone">+375 (29) <span>603 92 91</span></a>-->
<!--                <div class="time">Ежедневно, с 8.00 до 21.00</div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </footer>-->
<!--</section>-->


<section class="s-section section-black section-footer">
    <footer class="footer">
        <div class="container">
            <div class="footer--wrapp">
                <div class="footer--logo">
                    <a href="#" class="logo--link"><img src="<?= self::getInstance()->getTemplatePath() . '/img/ELCAR24.png' ?>" alt=""></a>
                    <div class="text">Автоэлектрик с выездом к клиенту</div>
                </div>
                <div class="footer--menuList">
                    <? self::getInstance()->includeComponent("rii:element.list", "menu-bot", ['data_type' => 'json', 'data_file' => '/rii/db/menu-bot.json']); ?>
                </div>
                <div class="phone--info">
                    <a href="<? echo \Rii\Core\Config::get("PHONE/NUMBER") ?>" class="phone">+375 (29) <span>603 92 91</span></a>
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



</body>
 </html>