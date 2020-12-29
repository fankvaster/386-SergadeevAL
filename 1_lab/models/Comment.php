<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id_c
 * @property string|null $username
 * @property string|null $comment
 * @property string|null $post
 *
 * @property Post $post0
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'comment', 'post'], 'string', 'max' => 255],
            [['post'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post' => 'head']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_c' => 'Id C',
            'username' => 'Username',
            'comment' => 'Comment',
            'post' => 'Post',
        ];
    }

    /**
     * Gets query for [[Post0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPost0()
    {
        return $this->hasOne(Post::className(), ['head' => 'post']);
    }
}
