<?php

/* @var $this yii\web\View */
/* @var $category common\models\Category */

use yii\helpers\Html;

$content = Html::img('@web/img/folder.png', [
    'alt' => $category->title,
    'height' => 30,
    'width' => 30,
]);
$content .= ' ' . Html::encode($category->title);
?>
<div>

    <?= Html::a($content, ['site/index', 'category_id' => $category->id]) ?>

</div>
