<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manage Your  Posts';
// $this->params['breadcrumbs'][] = $this->title;
?>
<?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
<?php
echo \kartik\widgets\Growl::widget([
    'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
    'title' => (!empty($message['title'])) ? Html::encode($message['title']) : 'Title Not Set!',
    'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
    'body' => (!empty($message['message'])) ? Html::encode($message['message']) : 'Message Not Set!',
    'showSeparator' => true,
    'delay' => 1, //This delay is how long before the message shows
    'pluginOptions' => [
        'delay' => (!empty($message['duration'])) ? $message['duration'] : 3000, //This delay is how long the message shows for
        'placement' => [
            'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'top',
            'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'right',
        ]
    ]
]);
?>
<?php endforeach; ?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
    //    'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'note:ntext',
            'created_at',
            
            [
                'header'=>'Post By',
                'value'=>'created0.username',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
