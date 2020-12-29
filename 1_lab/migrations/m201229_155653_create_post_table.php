<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m201229_155653_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id_p' => $this->primaryKey(),
            'head' => $this->string(),
            'content' => $this->text()
        ]);

        $this->createIndex(
            'idx-post-head',
            'post',
            'head'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-post-head',
            'post'
        );

        $this->dropTable('{{%post}}');
    }
}
