<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace yuncms\tag\rest\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yuncms\rest\ActiveController;
use yuncms\tag\rest\models\Tag;

/**
 * Class TagController
 *
 * @author Tongle Xu <xutongle@gmail.com>
 * @since 3.0
 */
class TagController extends ActiveController
{
    public $modelClass = 'yuncms\tag\rest\models\Tag';

    /**
     * 定义操作
     * @return array
     */
    public function actions()
    {
        $actions = parent::actions();
        // disable the "delete" and "create" actions
        unset($actions['delete'], $actions['create'], $actions['update']);
        return $actions;
    }

    /**
     * Declares the allowed HTTP verbs.
     * Please refer to [[VerbFilter::actions]] on how to declare the allowed verbs.
     * @return array the allowed HTTP verbs.
     */
    protected function verbs()
    {
        return array_merge(parent::verbs(), [
            'search' => ['GET'],
        ]);
    }

    /**
     * 主题搜索
     * @param string $tag
     * @return ActiveDataProvider
     * @throws \yii\base\InvalidConfigException
     */
    public function actionSearch($tag)
    {
        $query = Tag::find()->andWhere(['like', 'name', $tag]);
        return Yii::createObject([
            'class' => ActiveDataProvider::class,
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);
    }
}