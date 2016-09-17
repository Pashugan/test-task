<?php

/* @var $this yii\web\View */
/* @var $category integer */
/* @var $subcategories common\models\Category[] */
/* @var $items common\models\Item[] */

use yii\helpers\Html;

$this->title = 'Каталог продукции';
?>

<div class="site-index">
    <div class="body-content">

    <?= Html::a('Наверх', ['site/index', 'category_id' => $parent_category_id]) ?>

<?php
    if ($subcategories || $items) {
?>

    <?= Html::ul($subcategories, ['item' => function($item, $index) {
        return Html::tag(
            'li',
            $this->render('subcategory', ['category' => $item]),
            ['class' => 'catalogue']
        );
    }]) ?>

    <?= Html::ul($items, ['item' => function($item, $index) {
        return Html::tag(
            'li',
            $this->render('item', ['item' => $item]),
            ['class' => 'catalogue']
        );
    }]) ?>

<?php
    } else {
?>

        <div>Ничего нет :(</div>

<?php
    }
?>
    </div>
</div>
