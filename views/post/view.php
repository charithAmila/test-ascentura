<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = $model->title;
//$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h3><?= Html::encode($this->title) ?></h3>
    <a><small>
            <span class="glyphicon glyphicon-user"> </span> Post By : <?= $model->created0->username ?> |
            <span class="glyphicon glyphicon-time"> </span> Post Date : <?= $model->created_at ?> |
            <span class="glyphicon glyphicon-user"> </span> Updated By : <?php if(isset($model->updted0->username)) echo $model->updted0->username  ?> |
            <span class="glyphicon glyphicon-time"></span> Last Updated Date <?php if(isset($model->updted0->updated_at))  echo $model->updated_at ?> 
    </small>
        </a>
    <br/><br/>
    <p>
        <?= $model->note ?>
    </p>

    <b>TAGS</b>
    <hr/>
    
    <?php 
    $tags = $model->postTags;
    foreach ($tags as $i){ ?>
    <button class="btn btn-sm btn-info"><?= $i->tag->name ;?></button>
  <?php  }
    ?>
</div>
