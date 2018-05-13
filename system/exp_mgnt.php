<?php
    require 'autoload.php';
    $exp = new ExtraPromotion(ExtraPromotion::$POINT);
    $exp->setPoint(100);
    $exp->setLowerPrice(1000);
    ExtraPromotionMgnt::pointUpdate($account, $exPointPro);
?>