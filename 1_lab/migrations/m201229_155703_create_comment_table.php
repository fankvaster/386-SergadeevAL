<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m201229_155703_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id_c' => $this->primaryKey(),
            'username' => $this->string(),
            'comment' => $this->string(),
            'post' => $this->string()
        ]);

        $this->createIndex(
            'idx-comment-post',
            'comment',
            'post'
        );

        $this->addForeignKey(
            'fk-comment-post',
            'comment',
            'post',
            'post',
            'head',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-comment-post',
            'comment'
        );

        $this->dropIndex(
            'idx-comment-post',
            'comment'
        );

        $this->dropTable('{{%comment}}');
    }
}
