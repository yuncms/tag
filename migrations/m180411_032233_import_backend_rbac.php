<?php

use yuncms\db\Migration;

/**
 * Class m180411_032233_import_backend_rbac
 */
class m180411_032233_import_backend_rbac extends Migration
{
    public function safeUp()
    {
        $time = time();
        //添加路由
        $this->batchInsert('{{%admin_auth_item}}', ['name', 'type', 'created_at', 'updated_at'], [
            ['/tag/tag/*', 2, $time, $time],
            ['/tag/tag/create', 2, $time, $time],
            ['/tag/tag/delete', 2, $time, $time],
            ['/tag/tag/index', 2, $time, $time],
            ['/tag/tag/update', 2, $time, $time],
            ['/tag/tag/view', 2, $time, $time],
        ]);
        $this->insert('{{%admin_auth_item}}', ['name' => 'TAG管理', 'type' => 2, 'rule_name' => 'RouteRule', 'created_at' => $time, 'updated_at' => $time]);
        $this->batchInsert('{{%admin_auth_item_child}}', ['parent', 'child'], [
            ['TAG管理', '/tag/tag/*'],
            ['TAG管理', '/tag/tag/create'],
            ['TAG管理', '/tag/tag/delete'],
            ['TAG管理', '/tag/tag/index'],
            ['TAG管理', '/tag/tag/update'],
            ['TAG管理', '/tag/tag/view'],
        ]);

        $this->insert('{{%admin_auth_item_child}}', ['parent' => 'Administrator', 'child' => 'TAG管理']);
    }

    public function safeDown()
    {

    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180411_032233_import_backend_rbac cannot be reverted.\n";

        return false;
    }
    */
}
