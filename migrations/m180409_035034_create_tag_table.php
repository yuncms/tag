<?php

use yuncms\db\Migration;
use yuncms\tag\models\Tag;

/**
 * Handles the creation of table `tag`.
 */
class m180409_035034_create_tag_table extends Migration
{
    /**
     * @var string The table name.
     */
    public $tableName = '{{%tag}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey()->comment('ID'),
            'name' => $this->string(50)->notNull()->unique()->comment('Name'),
            'title' => $this->string(150)->comment('Title'),
            'keywords' => $this->string(255)->comment('Keywords'),
            'description' => $this->text()->comment('Description'),
            'slug' => $this->string(80)->comment('Slug'),
            'letter' => $this->string(1)->comment('Letter'),
            'frequency' => $this->unsignedInteger()->notNull()->defaultValue(0)->comment('Frequency'),
        ], $tableOptions);
        $this->importTest();
    }

    public function importTest()
    {
        $tags = ['php', 'java', 'c++', 'go', 'js', 'asp','c#'];
        foreach ($tags as $tag) {
            $model = new Tag(['name' => $tag]);
            $model->scenario = Tag::SCENARIO_CREATE;
            $model->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
