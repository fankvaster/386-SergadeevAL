<?php

use yii\helpers\Html;
use app\models\Comment;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = $model->head;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= $model->content ?>
</p>

    <ul>

    <?php Pjax::begin(); ?>

    <?php
    if (isset($_GET['p'])) {
        $p = $_GET['p'] + 10;
    } else {
        $p = 10;
    } ?>

    <?= Html::a("Написать комментарий", ['comment/create', 'id' => $_GET['id']], ['class' => 'btn btn-lg btn-primary']) ?>

     <?php foreach (Comment::findbysql("SELECT comment, username from comment where post = '$model->head' limit $p")->all() as $comment): ?>
        <li>
            <?php echo "Комментарий пользователя $comment->username:"; ?>
            <?= $comment->comment ?>
        </li>
    <?php endforeach; ?>
</ul>

    <?= Html::a("Ещё", ['post/view', 'id' => $_GET['id'], 'p' => $p], ['class' => 'btn btn-lg btn-primary']) ?>

    <?php Pjax::end(); ?>
</div>