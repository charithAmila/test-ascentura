<?php

namespace app\controllers;

use Yii;
use app\models\Post;
use app\models\Tag;
use app\models\PostTag;

class ForumBoardController extends \yii\web\Controller
{
    public function actionIndex($id=NULL)
    {
//      if id is null the post editing
        if(empty($id))
            {
                $model = new Post();
            }
            elseif (!empty ($id)) 
                {
                    $model = Post::findOne($id);
                    $model->updted = \Yii::$app->user->identity->id;
                    $model->updated_at = date('Y-m-d H:i:s');
//                  privent other user post edit
                    if($model->created != \Yii::$app->user->identity->id && \Yii::$app->user->identity->role =='user')
                        {
                            return $this->redirect(['/post/']);
                        }
//                  set tag list
                    $array;
                    foreach ($model->postTags as $val)
                        {
                            $array[]=$val->tag_id;
                        }
            $model->tags = $array;
                }
        $tag = new Tag();
// if user is not loged rederect to the login        
        if (Yii::$app->user->isGuest) 
            {
                return $this->redirect("index.php?r=user%2Fsecurity%2Flogin");
            }  
        else 
            {
// Asign loged user identity and current date and time
                $model->created = \Yii::$app->user->identity->id;
                $model->created_at = date('Y-m-d H:i:s');
                
                if ($model->load(Yii::$app->request->post())) 
                    {
                        $tag_list = $model->tags;
// Post Save                        
                        if($model->save())
                            {
// Post tag save
                                $a = [];
                                foreach ($tag_list as $k=>$val){
                                    $a[]= [$model->id,$val];
                                }
                                if(!$model->isNewRecord){
                                    PostTag::deleteAll(['post_id'=>$model->id]);
                                }
                                Yii::$app->db->createCommand()->batchInsert('post_tag', ['post_id', 'tag_id'],$a)->execute();
                            }
                            Yii::$app->getSession()->setFlash('success', [
                            'type' => 'success',
                            'duration' => 5000,
                            'icon' => 'fa fa-check',
                            'message' => 'Successfully Saved',
                            'title' => 'Saved',
                            'positonY' => 'top',
                            'positonX' => 'right'
                            ]);

                         return $this->redirect(Yii::$app->request->referrer);
                    }
                else 
                    {
                        return $this->render('index',
                                        [
                                            'model'=>$model,
                                            'tag'=>$tag,
                                        ]);
                    }
        
            }
    }

}
