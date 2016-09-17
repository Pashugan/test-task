<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Category;
use common\models\Item;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex($category_id = 1)
    {
        $category_id = (int)$category_id;
        $category = Category::find()
            ->where(['id' => $category_id])
            ->with(['parent', 'subcategories', 'items'])
            ->one();

        if (!$category) {
            throw new BadRequestHttpException('Неверная категория товара');
        }

        return $this->render('index', [
            'parent_category_id' => $category->parent->id,
            'subcategories' => $category->subcategories,
            'items' => $category->items,
        ]);
    }
}
