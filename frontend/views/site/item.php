<?php

/* @var $this yii\web\View */
/* @var $item common\models\Item */

use yii\helpers\Html;

?>
<div>

    <?= Html::img('@web/img/goods.jpg', [
        'alt' => $item->title,
        'height' => 30,
        'width' => 30,
    ]) ?>
    <?= Html::encode($item->title) ?>

</div>
