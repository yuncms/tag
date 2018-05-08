<?php

use yuncms\helpers\Html;
use yuncms\grid\GridView;
use yuncms\admin\widgets\Box;
use yuncms\admin\widgets\Toolbar;
use yuncms\admin\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel yuncms\tag\models\TagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yuncms/tag', 'Manage Tag');
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
                    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                </div>
            </div>
            <?= GridView::widget([
                'layout' => "{items}\n{summary}\n{pager}",
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'name',
                    'slug',
                    'title',
                    'description',
                    'frequency',
                    ['class' => 'yuncms\grid\ActionColumn'],
                ],
            ]); ?>
            <?php Box::end(); ?>
        </div>
    </div>
</div>