<?php

use yii\db\Query;
use yuncms\db\Migration;

/**
 * Class m180409_035115_add_backend_menu
 */
class m180409_035115_add_backend_menu extends Migration
{

    public function safeUp()
    {
        $this->batchInsert('{{%admin_menu}}', [ 'name', 'parent', 'route', 'icon', 'sort', 'data'], [
            ['TAG管理', 8, '/tag/tag/index', 'fa-book', NULL, NULL],
        ]);

        $id = (new Query())->select(['id'])->from('{{%admin_menu}}')->where(['name' => 'TAG管理', 'parent' => 8,])->scalar($this->getDb());

        $this->batchInsert('{{%admin_menu}}', ['name', 'parent', 'route', 'visible', 'sort'], [
            ['创建TAG', $id, '/tag/tag/create', 0, NULL],
            ['更新TAG', $id, '/tag/tag/update', 0, NULL],
        ]);
    }

    public function safeDown()
    {
        $id = (new Query())->select(['id'])->from('{{%admin_menu}}')->where(['name' => 'TAG管理', 'parent' => 8,])->scalar($this->getDb());
        $this->delete('{{%admin_menu}}', ['parent' => $id]);
        $this->delete('{{%admin_menu}}', ['id' => $id]);
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180409_035115_add_backend_menu cannot be reverted.\n";

        return false;
    }
    */
}
