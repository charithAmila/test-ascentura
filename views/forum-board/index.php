<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use app\models\Tag;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use dosamigos\ckeditor\CKEditor;

$this->registerJs("CKEDITOR.plugins.addExternal('pbckcode', '/pbckcode/plugin.js', '');");


/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
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



<div class="post-form">
    
    <div class="row">
        <div class="col-md-9">
        <fieldset class="scheduler-border">
            <legend class="scheduler-border"><?php if($model->isNewRecord){ echo 'ADD NEW';}else {    echo 'UPDATE';} ?> POST</legend>
        
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'live_demo')->textarea(['rows' => 2]) ?>
    <?= $form->field($model, 'github_link')->textarea(['rows' => 2]) ?> 
    <?= $form->field($model, 'note')->widget(CKEditor::className(), [
		'options' => ['rows' => 3],
        'preset' => 'custom',
	]) ?>

<?= $form->field($model, 'post')->widget(CKEditor::className(), [
		'options' => ['rows' => 6],
        'preset' => 'custom',
	]); ?>

<?= $form->field($model, 'status')->dropDownList(
            [-1 => 'Un Publish', 1 => 'Bublish', ]
    ); ?>
    <?php Pjax::begin(['id' => 'boxPajax']); ?>
    <?= $form->field($model, 'tags')->checkboxList(ArrayHelper::map(Tag::find()->orderBy(['id'=>SORT_DESC])->all(), 'id', 'name')); ?>
            <?php Pjax::end(); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'SAVE' : 'UPDATE', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
            </fieldset>
        </div>
        
        <div class="col-md-3">
            <fieldset class="scheduler-border">
                <legend class="scheduler-border">ADD NEW TAGS</legend>
                
               <?php $form = ActiveForm::begin(['id'=>$tag->formName(),'enableClientValidation' => FALSE]); ?>
               
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <?= $form->field($tag, 'name')->textInput(['class'=>'input-sm form-control'])->label(FALSE); ?>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-sm btn-primary">ADD</button>
                            </div>
                        </div>  
                    </div>
                </div>
                
                <?php ActiveForm::end(); ?>  
                
            </fieldset>
            <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-danger btn-lg" href="index.php?r=post/">
                            MANAGE YOUR POSTS
                        </a>
                    </div>
                </div>
        </div>
    </div>
    
</div>

