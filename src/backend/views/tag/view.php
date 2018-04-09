<?php

use yuncms\helpers\Html;
use yuncms\widgets\DetailView;
use yuncms\admin\widgets\Box;
use yuncms\admin\widgets\Toolbar;
use yuncms\admin\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model yuncms\tag\models\Tag */

$this->title = $model->name;
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
                            'url' => ['tag/index'],
                        ],
                        [
                            'label' => Yii::t('yuncms/tag', 'Create Tag'),
                            'url' => ['tag/create'],
                        ],
                        [
                            'label' => Yii::t('yuncms/tag', 'Update Tag'),
                            'url' => ['update', 'id' => $model->id],
                            'options' => ['class' => 'btn btn-primary btn-sm']
                        ],
                        [
                            'label' => Yii::t('yuncms/tag', 'Delete Tag'),
                            'url' => ['delete', 'id' => $model->id],
                            'options' => [
                                'class' => 'btn btn-danger btn-sm',
                                'data' => [
                                    'confirm' => Yii::t('yuncms', 'Are you sure you want to delete this item?'),
                                    'method' => 'post',
                                ],
                            ]
                        ],
                    ]]); ?>
                </div>
                <div class="col-sm-8 m-b-xs">

                </div>
            </div>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'title',
                    'keywords',
                    'description',
                    'slug',
                    'letter',
                    'frequency',
                ],
            ]) ?>
            <?php Box::end(); ?>
        </div>
    </div>
</div>
