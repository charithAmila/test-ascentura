<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Post;

/**
 * PostSearch represents the model behind the search form about `app\models\Post`.
 */
class PostSearch extends Post
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created', 'updted'], 'integer'],
            [['title', 'note', 'created_at', 'updated_at','gsearch'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params,$type = NULL)
    {
        if($type == 'backend' && \Yii::$app->user->identity->role=="admin"){
            $query = Post::find()->orderBy(['id'=>SORT_DESC]);
        }  else if($type == 'backend' && \Yii::$app->user->identity->role=="user"){
            $query = Post::find()->where(['post.created'=>  \Yii::$app->user->identity->id])->orderBy(['id'=>SORT_DESC]);
        }elseif (isset($params['sort'])) {
            if($params['sort']=='-crated_at'){
                $query = Post::find()->orderBy('post.created_at DESC');
            }  elseif($params['sort']=='crated_at'){
                $query = Post::find()->orderBy('post.created_at ASC');
            }elseif ($params['sort']=='-title') {
                $query = Post::find()->orderBy('post.title DESC');
            }elseif ($params['sort']=='title') {
                $query = Post::find()->orderBy('post.title ASC');
            }elseif ($params['sort']=='-tags') {
                $query = Post::find()->orderBy('tag.name DESC');
            }  elseif ($params['sort']=='tags') {
                $query = Post::find()->orderBy('tag.name ASC');
            }
            
        }  
        else {
            $query = Post::find()->where(['status'=>1])->orderBy(['id'=>SORT_DESC]);
        }
        

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith(['tags']);
        $query->orFilterWhere(['like', 'title', $this->gsearch])
              ->orFilterWhere(['like', 'note', $this->gsearch])
            ->orFilterWhere(['like', 'tag.name', $this->gsearch]);

        return $dataProvider;
    }
}
