<?php

use yuncms\helpers\Html;
use yuncms\admin\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model yuncms\tag\models\TagSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tag-search pull-right">

    <?php $form = ActiveForm::begin([
        'layout' => 'inline',
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('name'),
        ],
    ]) ?>


    <!--    --><? //= $form->field($model, 'description', [
    //        'inputOptions' => [
    //            'placeholder' => $model->getAttributeLabel('route'),
    //        ],
    //    ]) ?>

    <!--    --><? //= $form->field($model, 'slug', [
    //        'inputOptions' => [
    //            'placeholder' => $model->getAttributeLabel('slug'),
    //        ],
    //    ]) ?>



    <?php // echo $form->field($model, 'frequency') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yuncms', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('yuncms', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
