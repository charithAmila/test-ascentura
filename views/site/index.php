<?php
use yii\widgets\ListView;
use app\models\Tag;
?>    

<div class="row">
    <div class="col-sm-9">
        <?php // echo $this->render('/post/_search', ['model' => $searchModel]); ?>
     <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return "<a href='index.php?r=post/view&id=$model->id'><h3>$model->title</h3></a>".'</br>'.$model->note.'</br><a><small> 
            <span class="glyphicon glyphicon-time"> </span> '.$model->created_at.'</small></a>';
        },
    ]) ?>       
    </div>
    <div class="col-sm-3">
        <!-- <fieldset class="scheduler-border">
                <legend class="scheduler-border">SORT BY</legend>
                <ul>
                    <?php
                    $url1 = $url2 = $url3 = NULL;
                    if(!isset($_GET['sort']))
                        {
                            $url1 = 'index.php?r=site/index&sort=-crated_at';
                            $url2 = 'index.php?r=site/index&sort=-title'; 
                            $url3 = 'index.php?r=site/index&sort=-tags'; 
                        }  
                    else {
                        if($_GET['sort']=='crated_at')
                            {
                                $url1 = 'index.php?r=site/index&sort=-crated_at';
                                $url2 = 'index.php?r=site/index&sort=-title';  
                                $url3 = 'index.php?r=site/index&sort=-tags'; 
                            }
                        elseif($_GET['sort']=='-crated_at')
                            {
                                $url1 = 'index.php?r=site/index&sort=crated_at';
                                $url2 = 'index.php?r=site/index&sort=-title';
                                $url3 = 'index.php?r=site/index&sort=-tags'; 
                            
                            }
                        elseif ($_GET['sort']=='-title') 
                            {
                                $url1 = 'index.php?r=site/index&sort=-crated_at';
                                $url2 = 'index.php?r=site/index&sort=title';
                                $url3 = 'index.php?r=site/index&sort=-tags'; 
                            
                            }
                        elseif ($_GET['sort']=='title') 
                            {
                                $url1 = 'index.php?r=site/index&sort=-crated_at';
                                $url2 = 'index.php?r=site/index&sort=-title';
                                $url3 = 'index.php?r=site/index&sort=-tags'; 
                            
                        }
                        elseif ($_GET['sort']=='-tags') 
                            {
                                $url1 = 'index.php?r=site/index&sort=-crated_at';
                                $url2 = 'index.php?r=site/index&sort=-title'; 
                                $url3 = 'index.php?r=site/index&sort=tags';
                            }
                        elseif ($_GET['sort']=='tags') 
                            {
                                $url1 = 'index.php?r=site/index&sort=-crated_at';
                                $url2 = 'index.php?r=site/index&sort=-title'; 
                                $url3 = 'index.php?r=site/index&sort=-tags';
                            }
                        }
                    ?>
                    <li>
                    <a href="<?= $url1?>" >
                        Date Time  
                    </a>
                    </li>
                    <li>
                    <a href="<?= $url2?>" >
                        Title   
                    </a>
                    </li>
                    <li>
                    <a href="<?= $url3?>" >
                        Tags   
                    </a>
                    </li>
                </ul>
                    
        </fieldset> -->
        <!-- <fieldset class="scheduler-border">
                <legend class="scheduler-border">TAGS</legend>
                <ul>
                    <?php 
                    $tags = Tag::find()->all();
                    foreach ($tags as $k): ?>
                    <a href="index.php?r=site%2Findex&PostSearch%5Bgsearch%5D=<?= $k->name?>">
                        <li><?= $k->name; ?></li>
                    </a>
                    <?php endforeach;  ?>
                </ul>
        </fieldset> -->
    </div>
</div>

