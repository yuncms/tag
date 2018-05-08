<?php

use yuncms\helpers\Html;
use yuncms\admin\widgets\Box;
use yuncms\admin\widgets\Toolbar;
use yuncms\admin\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model yuncms\tag\models\Tag */

$this->title = Yii::t('yuncms/tag', 'Create Tag');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yuncms/tag', 'Manage Tag'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12 tag-update">
            <?= Alert::widget() ?>
            <?php Box::begin([
                'header' => Html::encode($this->title),
            ]); ?>
            <div class="row">
                <div class="col-sm-4 m-b-xs">
                    <?= Toolbar::widget(['items' => [
                        [
                            'label' => Yii::t('yuncms/tag', 'Manage Tag'),
                            'url' => ['index'],
                        ],
                        [
                            'label' => Yii::t('yuncms/tag', 'Create Tag'),
                            'url' => ['create'],
                        ],
                    ]]); ?>
                </div>
                <div class="col-sm-8 m-b-xs">

                </div>
            </div>
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
            <?php Box::end(); ?>
        </div>
    </div>
</div>